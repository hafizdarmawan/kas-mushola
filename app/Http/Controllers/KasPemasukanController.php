<?php

namespace App\Http\Controllers;

use App\Kas_Pemasukan;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasPemasukanController extends Controller
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
        return view('backend.kas_masuk.index');
    }


    public function getData()
    {
        return Datatables::of(Kas_Pemasukan::all())->make(true);
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
            'id_users'      => Auth::id(),
            'sumber'        => $request->post('sumber'),
            'jumlah'        => $request->post('jumlah'),
            'tanggal'       => $request->post('tanggal'),
            'keterangan'    => $request->post('keterangan'),
        ];
        if (empty($request->id)) {
            Kas_Pemasukan::create($data);
        } else {
            Kas_Pemasukan::find($request->id)->update($data);
        }
        return redirect()->route('kas-pemasukan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kas_Pemasukan  $kas_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Kas_Pemasukan $kas_Pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kas_Pemasukan  $kas_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Kas_Pemasukan::find($request->id);
        echo json_encode($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kas_Pemasukan  $kas_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kas_Pemasukan $kas_Pemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kas_Pemasukan  $kas_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = Kas_Pemasukan::find($id);
        $data->delete();
    }
}
