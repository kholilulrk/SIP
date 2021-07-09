<?php

namespace App\Http\Controllers\Admin\Pemasukan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemasukan;
class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data_pemasukan'] = Pemasukan::all();
        return view('admin.pages.pemasukan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pemasukan = Pemasukan::create($data);
        if($pemasukan){
            return redirect()->route('admin.pemasukan.create')->with(['status' => 'berhasil', 'message' => 'Data Berhasil Ditambah']);
        }
        return redirect()->route('admin.pemasukan.create')->with(['status' => 'gagal', 'message' => 'Data Gagal Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pemasukan::destroy($id);
        if ($delete) {
            return redirect()->route('admin.pemasukan.index')->with(['status' => 'berhasil', 'message' => 'Data Berhasil Dihapus']);
        }
        return redirect()->route('admin.pemasukan.index')->with(['status' => 'gagal', 'message' => 'Data Gagal Dihapus']);
    }
}
