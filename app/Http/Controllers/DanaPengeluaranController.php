<?php

namespace App\Http\Controllers;

use App\Dana_Sosial_Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DanaSosialPengeluaranController extends Controller
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
        return view('backend.dana_keluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData()
    {
        return DataTables::of(Dana_Sosial_Pengeluaran::all())->make(true);
    }


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
            'keterangan'    => $request->post('keterangan')
        ];

        if ($request->input('id') == '') {
            Dana_Sosial_Pengeluaran::create($data);
        } else {
            Dana_Sosial_Pengeluaran::find($request->id)->update($data);
        }

        return redirect()->route('dana-pengeluaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dana_Sosial_Pengeluaran  $dana_Sosial_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Dana_Sosial_Pengeluaran $dana_Sosial_Pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dana_Sosial_Pengeluaran  $dana_Sosial_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Dana_Sosial_Pengeluaran::find($request->get('id'));
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dana_Sosial_Pengeluaran  $dana_Sosial_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dana_Sosial_Pengeluaran $dana_Sosial_Pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dana_Sosial_Pengeluaran  $dana_Sosial_Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Dana_Sosial_Pengeluaran::find($id)->delete();
    }
}
