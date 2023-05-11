<?php

namespace App\Http\Controllers;

use App\Models\ArmadaMobil;
use App\Models\Car;
use App\Models\Trans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function sewa($id){
        $car = Car::find($id);
        return view('rental.rent')->with('car', $car);
    }
    public function admin() {
        return view('admin.index');
    }
    public function list() {
        $cars = ArmadaMobil::with('car')->get();
        // return $cars;
        return view('dashboard')->with([
            'cars' => $cars
        ]);
    }
    public function lists() {
        $cars = ArmadaMobil::with('car')->get();
        return $cars;
    }
    public function store(Request $request, $id) {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_sewa' => 'required',
            'tanggal_kembali' => 'required',
            'harga' => 'required',
            'supir' => 'required'
        ],[
            'nama.required' => 'Nama harus di isi',
            'alamat.required' => 'Alamat harus di isi',
            'tanggal_sewa.required' => 'Tanggal sewa harus di isi',
            'tanggal_kembali.required' => 'Tanggal kembali harus di isi',
            'harga.required' => 'Harga harus di isi',
            'harga.numeric' => 'Harga harus berupa angka',
            'supir.required' => 'Supir harus di pilih'
        ]);
        $car = Car::find($id);
        $data['status'] = 'Pesanan Baru';
        $data['car_id'] = $car->id;
        $data['type'] = $car->type;
        $data['user_id'] = auth()->user()->id;
        Trans::create($data);
        return redirect()->route('trans.user.index');
    }
    public function index () {
        return view('dashboard.index');
    }
    public function indexTrans () {
        return view('dashboard.trans.index');
    }
    public function pay ($id) {
        $transaction = Trans::where('id', $id)->first();
        return view('dashboard.trans.pay')->with([
            'trans' => $transaction
        ]);
    }
    public function indexTransList() {
        $user = Auth::id();
        $transaction = Trans::where('user_id', $user)->where('status', 'Pesanan Baru')->with('car')->with('user')->with('driver')->get();
        return DataTables::of($transaction)
        ->addColumn('nama', function ($trans) {
            return $trans->nama;
        })
        ->addColumn('harga', function ($trans) {
            return $trans->harga;
        })
        ->addColumn('tanggal_sewa', function ($trans) {
            return $trans->tanggal_sewa;
        })
        ->addColumn('tanggal_kembali', function ($trans) {
            return $trans->tanggal_kembali;
        })
        ->addColumn('type', function ($trans) {
            return $trans->car->type;
        })
        ->addColumn('supir', function ($trans) {
            if ($trans->supir == true) {
                return '-';
            } else {
                return 'Mandiri';
            }
        })
        ->addColumn('action', function ($trans) {
            return '<a href="/dashboard/transaction/pay/'.$trans->id.'">Bayar</a>';
        })
        ->addIndexColumn()
        ->toJson()
        ;
    }
    public function send(Request $request, $id) {
        $data = $request->validate([
            'image' => 'required|image|mimes:png,jpg'
        ],[
            'image.required' => 'Foto harus di isi',
            'image.image' => 'Foto harus berupa gambar',
            'image.mimes' => 'Foto harus berupa png, jpg'
        ]);
        $image = $request->file('image');
        $imageName = auth()->user()->id.'_'.$image->getClientOriginalName();
        $image->storeAs('public/images/trans/', $imageName);
        Trans::findOrFail($id)->update([
            'image' => $imageName,
            'status' => 'Dalam Proses'
        ]);
        return redirect()->route('trans.index');
    }
}
