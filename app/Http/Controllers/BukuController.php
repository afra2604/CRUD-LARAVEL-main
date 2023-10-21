<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_buku = Buku::all()->sortByDesc('id');
        $no = 0;
        return view('buku.index', compact('data_buku', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->judul = $request->input('judul');
        $buku->penulis = $request->input('penulis');
        $buku->harga = $request->input('harga');

        $tgl_terbit = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('tgl_terbit'));
        $buku->tgl_terbit = $tgl_terbit->format('Y-m-d');
        
        $buku->save();
        
        return redirect('/buku')->with ('pesan', 'Data Buku Berhasil di Simpan');
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
            $buku = Buku::find($id);
            return view('buku.update',compact('buku'));
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
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
    
        $tgl_terbit = \Carbon\Carbon::createFromFormat('Y-m-d', $request->tgl_terbit);
        $buku->tgl_terbit = $tgl_terbit->format('Y-m-d');
    
        $buku->save();
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku) {
            $buku->delete();
        }
        return redirect('/buku');
    }
}
