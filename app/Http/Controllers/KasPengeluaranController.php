<?php

namespace App\Http\Controllers;

use App\Kas_Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class KasPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('backend.kas_keluar.index');
    }


    public function getData()
    {

        return DataTables::of(Kas_Pengeluaran::all())->make(true);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'id_user'       => Auth::id(),
            'keperluan'     => $request->post('keperluan'),
            'jumlah'        => $request->post('jumlah'),
            'tanggal'       => $request->post('tanggal'),
            'keterangan'    => $request->post('keterangan'),
        ];
        if ($request->post('id') == '') {
            Kas_Pengeluaran::create($data);
        } else {
            Kas_Pengeluaran::find($request->post('id'))->update($data);
        }
        return redirect()->route('kas-pengeluaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kas_Pengeluaran  $kas_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Kas_Pengeluaran $kas_Pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kas_Pengeluaran  $kas_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kas_Pengeluaran $kas_Pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kas_Pengeluaran  $kas_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kas_Pengeluaran $kas_Pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kas_Pengeluaran  $kas_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kas_Pengeluaran $kas_Pengeluaran)
    {
        //
    }
}
