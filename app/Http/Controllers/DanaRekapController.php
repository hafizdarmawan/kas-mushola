<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DanaRekapController extends Controller
{

    public function index()
    {
        return view('backend.dana_rekap.index');
    }


    public function getData()
    {
        return DataTables::of(
            DB::table('dana_sosial_pemasukan')
                ->join('users', 'users.id', '=', 'dana_sosial_pemasukan.id_users')
                ->join('dana_sosial_pengeluaran', 'users.id', '=', 'dana_sosial_pengeluaran.id_user')
                ->select(
                    'dana_sosial_pemasukan.sumber',
                    'dana_sosial_pemasukan.jumlah',
                    'dana_sosial_pemasukan.tanggal',
                    'dana_sosial_pengeluaran.keperluan',
                    'dana_sosial_pengeluaran.jumlah',
                    'dana_sosial_pengeluaran.tanggal',
                )
                ->get()
        )->make(true);
    }

}
