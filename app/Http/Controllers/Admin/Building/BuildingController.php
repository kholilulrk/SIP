<?php

namespace App\Http\Controllers\Admin\Building;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Gedung;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_gedung['gedung'] = Gedung::latest()->paginate(5);
        return view('admin.pages.building.index', $data_gedung);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.building.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_gedung' => 'required|max:200',
            'description' => 'required',
            'harga_sewa'  => 'required',
            'icon'        => 'required|image'
        ]);

        $path = $request->file('icon')->store('gedung');
        // dd($request->all());
        $data_gedung = Gedung::create([
            'nama_gedung'  => $request->nama_gedung,
            'description'  => $request->description,
            'harga_sewa'   => $request->harga_sewa,
            'icon'         => $path
        ]);

        if($data_gedung) {
            return redirect()->route('admin.building.create')->with(['status' => 'success', 'message' => 'Create Gedung Successfully']);
        }
        return redirect()->route('admin.building.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_gedung['gedung'] = Gedung::find($id);
        return view('admin.pages.building.index', $data_gedung);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_gedung['gedung'] = Gedung::findOrFail($id);
        return view('admin.pages.building.edit', $data_gedung);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_gedung  = Gedung::find($id);

        $request->validate([
            'nama_gedung' => 'required|max:200',
            'description' => 'required',
            'harga_sewa'  => 'required',
            'icon'        => 'image'
        ]);

        if ($request->file('icon')) {
            $file = $request->file('icon');
            $path = $file->store("gedung");

            if (@$data_gedung->icon && Storage::exists($data_gedung->icon)) {
                Storage::delete($data_gedung->icon);
            }
        }

        $data_gedung->fill([
            'nama_gedung'  => $request->nama_gedung,
            'description'  => $request->description,
            'harga_sewa'   => $request->harga_sewa,
            'icon'         => ($request->file('icon') ? $path : ($data_gedung->icon != null ? $data_gedung->icon : null))
        ])->save();

        return redirect()->route('admin.building.index')->with(['status' => 'success', 'message' => 'Gedung Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_gedung = Gedung::findOrFail($id);

        if (@$data_gedung->icon && Storage::exists($data_gedung->icon)) {
            Storage::delete($data_gedung->icon);
        }

        $data_gedung->delete();

        return redirect()->route('admin.building.index')->with(['status' => 'success', 'message' => 'Gedung Deleted Successfully']);
    }
}
