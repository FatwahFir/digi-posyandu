<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Gizi;
use App\Models\Pasien;
use App\Models\Keluarga;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use App\DataTables\PasienDataTable;
use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;
use App\Http\Requests\StoreKeluargaRequest;
use App\Http\Requests\UpdateKeluargaRequest;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PasienDataTable $dataTable)
    {
        // $this->authorize('read');
        return $dataTable->render('pasien.data_pasien.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posyandu = Posyandu::get();
        $pasien = new Pasien();
        $keluarga = new Keluarga();
        $desa = Desa::get();
        return view('pasien.data_pasien.pasien-action', compact('posyandu', 'pasien', 'keluarga', 'desa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePasienRequest $request, StoreKeluargaRequest $requestK)
    {
        
        if(Keluarga::where('no_kk', $requestK->no_kk)->first() != null ){
            Pasien::create($request->all());
        }else{
            $keluarga = Keluarga::create($requestK->all());
            $data = $request->all();
            $data['no_kk'] = $keluarga->no_kk;     
            Pasien::create($data);
        }

        return response()->json([
            'status' => 'Sukses',
            'message' => 'Berhasil Menambahkan Data Pasien'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posyandu = Posyandu::get();
        $desa = Desa::get();
        $pasien = Pasien::with('keluarga')->findOrFail($id);
        // $keluarga = Keluarga::get();
        return view('pasien.data_pasien.pasien-action', compact('pasien', 'posyandu', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePasienRequest $request,UpdateKeluargaRequest $requestK,  $id)
    {
        $keluarga = Keluarga::where('no_kk', $requestK->no_kk)->first();
        $keluarga->no_kk = $requestK->no_kk;
        $keluarga->nik_ayah = $requestK->nik_ayah;
        $keluarga->nik_ibu = $requestK->nik_ibu;
        $keluarga->nama_ayah = $requestK->nama_ayah;
        $keluarga->nama_ibu = $requestK->nama_ibu;
        $keluarga->alamat = $requestK->alamat;
        $keluarga->no_telp = $requestK->no_telp;
        $keluarga_status_ekonomi = $requestK->status_ekonomi;
        $keluarga->id_desa = $requestK->id_desa;
        $keluarga->update();

        $pasien = Pasien::findOrFail($id);
        $pasien->nik = $request->nik;
        $pasien->nama_anak = $request->nama_anak;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->jk = $request->jk;
        $pasien->anak_ke = $request->anak_ke;
        $pasien->bb_lahir = $request->bb_lahir;
        $pasien->pb_lahir = $request->pb_lahir;
        $pasien->kia = $request->kia;
        $pasien->imd = $request->imd;
        $pasien->no_kk = $keluarga->no_kk;
        $pasien->id_posyandu = $request->id_posyandu;
        $pasien->update();

        return response()->json([
            'status' => 'Sukses',
            'message' => 'Berhasil Mengubah Data Pasien'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::where('id', $id)->delete();
        return response()->json([
            'status' => 'Sukses',
            'message' => 'Berhasil Menghapus Data Pasien'
        ]);
    }


    public function riwayat($id){
        $gizi = Gizi::where('id_pasien', $id)->get();
        return view('pasien.data_pasien.modal-riwayat', compact('gizi'));
    }
}
