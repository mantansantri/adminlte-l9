<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Menampilkan daftar resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['buyers'] = Buyer::orderBy('id', 'desc')->paginate(5);
        return view('buyers.index', $data);
    }
    /**
     * Perlihatkan formulir untuk membuat resource baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyers.create');
    }
    /**
     * Simpan resource yang baru dibuat di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'handphone' => 'required',
            'email' => 'required',
            'kode_dokter' => 'required'
        ]);
        $buyers = new Buyer;
        $buyers->nama_pembeli = $request->nama_pembeli;
        $buyers->jenis_kelamin = $request->jenis_kelamin;
        $buyers->alamat = $request->alamat;
        $buyers->telepon = $request->telepon;
        $buyers->handphone = $request->handphone;
        $buyers->email = $request->email;
        $buyers->kode_dokter = $request->kode_dokter;
        $buyers->save();
        return redirect()->route('buyers.index')
            ->with('sukses', 'Buyers has been created successfully.');
    }
    /**
     * Menampilkan resource yang ditentukan.
     *
     * @param  \App\buyer  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        return view('buyers.show', compact('buyer'));
    }
    /**
     * Tampilkan formulir untuk mengedit resource yang ditentukan.
     *
     * @param  \App\Buyer  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
        return view('buyers.edit', compact('buyer'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\buyer  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembeli' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'handphone' => 'required',
            'email' => 'required',
            'kode_dokter' => 'required'
        ]);
        $buyers = Buyer::find($id);
        $buyers->nama_pembeli = $request->nama_pembeli;
        $buyers->jenis_kelamin = $request->jenis_kelamin;
        $buyers->alamat = $request->alamat;
        $buyers->telepon = $request->telepon;
        $buyers->handphone = $request->handphone;
        $buyers->email = $request->email;
        $buyers->kode_dokter = $request->kode_dokter;
        $buyers->save();
        return redirect()->route('buyers.index')
            ->with('sukses', 'Buyers Has Been updated successfully');
    }
    /**
     * Hapus resource yang ditentukan dari penyimpanan.
     *
     * @param  \App\Buyer  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
        return redirect()->route('buyers.index')
            ->with('sukses', 'Company has been deleted successfully');
    }
}
