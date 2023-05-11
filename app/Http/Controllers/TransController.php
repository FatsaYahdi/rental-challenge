<?php

namespace App\Http\Controllers;

use App\Models\Trans;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransController extends Controller
{
    public function index() {
        return view('admin.trans.list');
    }
    public function listNew() {
        $trans = Trans::where('status', 'Pesanan Baru');
        return DataTables::of($trans)
        ->addColumn('nama', function ($tran) {
            return $tran->nama;
        })
        ->addColumn('harga', function ($tran) {
            return $tran->harga;
        })
        ->addColumn('tanggal_sewa', function ($tran) {
            return $tran->tanggal_sewa;
        })
        ->addColumn('tanggal_kembali', function ($tran) {
            return $tran->tanggal_kembali;
        })
        ->addColumn('status', function ($tran) {
            return $tran->status;
        })
        ->addColumn('action', function ($tran) {
            return 'aksi';
        })
        ->addIndexColumn()
        ->escapeColumns(['action'])
        ->toJson();
    }
    public function process() {
        return view('admin.trans.proses');
    }
    public function done() {
        return view('admin.trans.done');
    }
}
