<?php

namespace App\Http\Controllers;

use App\Dana_Sosial_Pemasukan;
use App\Dana_Sosial_Pengeluaran;
use Illuminate\Http\Request;

class LaporDanaSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.cetak_laporan.dana');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestweb
     * @return \Illuminate\Http\Response
     */
    public function laporanDanaSosial($tanggal_awal, $tanggal_akhir)
    {
        $danamasuk = Dana_Sosial_Pemasukan::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        $danakeluar = Dana_Sosial_Pengeluaran::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        return view('backend.cetak_laporan.data-dana', compact('danamasuk', 'danakeluar'));
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
        //
    }
}
