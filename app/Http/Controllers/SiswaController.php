<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = Siswa::latest()->paginate(10);
        $data['judul'] = 'Data Siswa Terbaru';
        return view('siswa_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['siswa'] = new Siswa();
        $data['route'] = 'siswa.store';
        $data['method'] = 'POST';
        $data['title'] = 'Tambah Data Siswa';
        $data['disable'] = [];
        return view('siswa_form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $data['siswa'] = $siswa;
        $data['route'] = ['siswa.update', $id];
        $data['method'] = 'PUT';
        $data['title'] = 'Edit Data Siswa';
        $data['disable'] = ['disabled' => 'disabled'];
        return view('siswa_form', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|min:3|unique:siswas,nisn',
            'alamat' => 'nullable',
        ]);
        $siswa = Siswa::create($requestData);
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            // 'nisn' => 'required|min:3|unique:siswas,nisn' . $id,
            'alamat' => 'nullable',
        ]);
        $siswa = Siswa::findOrFail($id);
        $siswa->fill($requestData);
        $siswa->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return back();
    }
}
