<?php

namespace App\Http\Controllers;

use App\Dana_Sosial_Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DanaPemasukanController extends Controller
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
        return view('backend.dana_masuk.index');
    }

    public function getData()
    {
        return DataTables::of(Dana_Sosial_Pemasukan::all())->make(true);
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
            'keterangan'    => $request->post('keterangan')
        ];

        if ($request->input('id') == '') {
            Dana_Sosial_Pemasukan::create($data);
        } else {
            Dana_Sosial_Pemasukan::find($request->post('id'))->update($data);
        }
        return redirect()->route('dana-pemasukan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dana_Sosial_Pemasukan  $dana_Sosial_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Dana_Sosial_Pemasukan $dana_Sosial_Pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dana_Sosial_Pemasukan  $dana_Sosial_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Dana_Sosial_Pemasukan::find($id);
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dana_Sosial_Pemasukan  $dana_Sosial_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dana_Sosial_Pemasukan $dana_Sosial_Pemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dana_Sosial_Pemasukan  $dana_Sosial_Pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Dana_Sosial_Pemasukan::find($id)->delete();
    }
}
