<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Menampilkan daftar resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['doctors'] = Doctor::orderBy('id', 'desc')->paginate(5);
        return view('doctors.index', $data);
    }
    /**
     * Perlihatkan formulir untuk membuat resource baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
            'nama_dokter' => 'required',
            'kode_dokter' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'handphone' => 'required',
            'jenis_kelamin' => 'required'
        ]);
        $doctors = new Doctor();
        $doctors->nama_dokter = $request->nama_dokter;
        $doctors->kode_dokter = $request->kode_dokter;
        $doctors->alamat = $request->alamat;
        $doctors->telepon = $request->telepon;
        $doctors->handphone = $request->handphone;
        $doctors->jenis_kelamin = $request->jenis_kelamin;
        $doctors->save();
        return redirect()->route('doctors.index')
            ->with('sukses', 'Doctor has been created successfully.');
    }
    /**
     * Menampilkan resource yang ditentukan.
     *
     * @param  \App\buyer  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }
    /**
     * Tampilkan formulir untuk mengedit resource yang ditentukan.
     *
     * @param  \App\Buyer  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
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
            'nama_dokter' => 'required',
            'kode_dokter' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'handphone' => 'required',
            'jenis_kelamin' => 'required'
        ]);
        $doctors = Doctor::find($id);
        $doctors->nama_dokter = $request->nama_dokter;
        $doctors->kode_dokter = $request->kode_dokter;
        $doctors->alamat = $request->alamat;
        $doctors->telepon = $request->telepon;
        $doctors->handphone = $request->handphone;
        $doctors->jenis_kelamin = $request->jenis_kelamin;
        $doctors->save();
        return redirect()->route('doctors.index')
            ->with('sukses', 'Doctors Has Been updated successfully');
    }
    /**
     * Hapus resource yang ditentukan dari penyimpanan.
     *
     * @param  \App\Buyer  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')
            ->with('sukses', 'Company has been deleted successfully');
    }
}