<?php

namespace App\Http\Controllers\Admin\Pengeluaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengeluaran;
class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data_pengeluaran'] = Pengeluaran::all();
        return view ('admin.pages.pengeluaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pengeluaran.create');
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
        $pengeluaran = Pengeluaran::create($data);
        if($pengeluaran){
            return redirect()->route('admin.pengeluaran.create')->with(['status' => 'berhasil', 'message' => 'Data Berhasil Ditambah']);
        }
        return redirect()->route('admin.pengeluaran.create')->with(['status' => 'gagal', 'message' => 'Data Gagal Ditambah']);
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
        $delete = Pengeluaran::destroy($id);
        if ($delete) {
            return redirect()->route('admin.pengeluaran.index')->with(['status' => 'berhasil', 'message' => 'Data Berhasil Dihapus']);
        }
        return redirect()->route('admin.pengeluaran.index')->with(['status' => 'gagal', 'message' => 'Data Gagal Dihapus']);
    }
}
