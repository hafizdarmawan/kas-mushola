<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KasRekapController extends Controller
{
    public function index()
    {
        return view('backend.kas_rekap.index');
    }

    public function getData()
    {
        return DataTables::of(DB::table('kas_pemasukan')
            ->join('users', 'users.id', '=', 'kas_pemasukan.id_users')
            ->join('kas_pengeluaran', 'users.id', '=', 'kas_pengeluaran.id_user')
            ->select(
                'kas_pemasukan.sumber',
                'kas_pemasukan.jumlah AS jml',
                'kas_pemasukan.tanggal',
                'kas_pengeluaran.keperluan',
                'kas_pengeluaran.jumlah',
                'kas_pengeluaran.tanggal'
            )->get())->make(true);
    }
}
