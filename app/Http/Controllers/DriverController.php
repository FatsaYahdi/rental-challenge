<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    public function index() {
        return view('admin.drivers.index');
    }
    public function list() {
        $drivers = Driver::all();

        return DataTables::of($drivers)
        ->addColumn('nama',  function($driver){
            return $driver->nama;
        })
        ->addColumn('jenis_kelamin',  function($driver){
            return $driver->jenis_kelamin;
        })
        ->addColumn('alamat',  function($driver){
            return $driver->alamat;
        })
        ->addColumn('status', function($driver){
            return $driver->status;
        })
        ->addColumn('action', function($driver){
            return '<div class="flex">
            <a href="'.route('driver.edit', $driver->id).'" class="mr-2">
                <i class="fa-regular fa-pen-to-square fa-xl" style="color:blue;"></i>
            </a>
            <form action="'.route('driver.edit', $driver->id).'" method="POST">
            <button data-modal-target="delete-modal-id-'.$driver->id.'" data-modal-toggle="delete-modal-id-'.$driver->id.'" type="submit" class="delete-button">
            
                <i class="fa-solid fa-trash-can fa-xl" style="color:red;"></i>
            </button>
                <input type="hidden" name="_token" value="' . @csrf_token() . '">
                <input type="hidden" name="_method" value="DELETE">
            </form>
        </div>';
        })
        ->addIndexColumn()
        ->toJson()
        ;
    }
    public function create() {
        return view('admin.drivers.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required|min:3',
            'jenis_kelamin' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi'
        ]);
        $data['status'] = 'Tersedia';
        Driver::create($data);
        return redirect()->route('driver.index');
    }
    public function edit($id) {
        return view('admin.drivers.edit', [
            'driver' => Driver::find($id)
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required|min:3',
            'jenis_kelamin' => 'required',
            'status' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'status.required' => 'Status harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi'
        ]);
        Driver::find($id)->update($data);
        return redirect()->route('driver.index');
    }
}
