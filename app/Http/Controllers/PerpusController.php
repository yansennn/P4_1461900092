<?php

namespace App\Http\Controllers;

use App\Models\Perpus;
use Illuminate\Http\Request;
use App\Exports\PerpusExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controllers;

class PerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpus = perpus::Join('Jenis_Buku', 'buku.id', '=', 'Jenis_Buku.id')->get();
        return view('perpus_0092', ['buku'=> $perpus]);
    }

    public function export()
    {
        return Excel::download(new PerpusExport, 'Data_1461900092.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perpus_tambah_0092');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        perpus::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect('perpus_0092');
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
        $perpus = perpus::find($id);
        return view('perpus_edit_0092', ['perpus_0092' => $perpus]);
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
        $perpus = perpus::find($id);
        $perpus->id = $request->id;
        $perpus->judul = $request->judul;
        $perpus->tahun_terbit = $request->tahun_terbit;
        $perpus->save();

        return redirect('perpus_0092');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perpus = perpus::find($id);
        $perpus->delete();

        return redirect ('perpus_0092');
    }

    
}