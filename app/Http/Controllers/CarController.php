<?php

namespace App\Http\Controllers;

use App\Models\ArmadaMobil;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CarController extends Controller
{
    public function list() {
        $cars = Car::all();
    
        return DataTables::of($cars)
            ->addColumn('action', function ($car) {
                return '
                <div class="flex">
                    <a href="'.route('cars.edit', $car->id).'" class="mr-2">
                        <i class="fa-regular fa-pen-to-square fa-xl" style="color:blue;"></i>
                    </a>
                    <form action="'.route('cars.destroy', $car->id).'" method="POST">
                    <button data-modal-target="delete-modal-id-'.$car->id.'" data-modal-toggle="delete-modal-id-'.$car->id.'" type="submit" class="delete-button">
                    
                        <i class="fa-solid fa-trash-can fa-xl" style="color:red;"></i>
                    </button>
                        <input type="hidden" name="_token" value="' . @csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </div>
                    ';
                })
            ->addColumn('type', function ($car) {
                return $car->type;
            })
            ->addColumn('bensin', function ($car) {
                return $car->bensin;
                })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
    public function index() {
        $cars = Car::all();
        return view('admin.cars.table')->with('cars', $cars);
    }

    public function create() {
        return view('admin.cars.create');
    }
    public function edit(Car $id) {
        return view('admin.cars.edit')->with('car', $id);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'type' => 'required|unique:cars,type',
            'plat' => 'required',
            'bensin' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ],[
            'type.required' => 'Type harus diisi',
            'plat.required' => 'Plat harus diisi',
            'bensin.required' => 'Bensin harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar jpeg, png, jpg',
            'type.unique' => 'Type sudah ada',
        ]);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->storeAs('public/images/cars/', $name);
            $data['image'] = $name;
        }
        // dd($data);
        Car::create($data);
        return redirect()->route('cars.index');
    }
    public function update(Request $request, $id) {
        $data = $request->validate([
            'type' => 'required',
            'bensin' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            ],[
            'type.required' => 'Type harus diisi',
            'bensin.required' => 'Bensin harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar jpeg, png, jpg',
        ]);
        if ($request->hasFile('image')) {
            $oldImage =  Car::findOrFail($id)->image;
            Storage::delete('images/cars/'. $oldImage);
        } else {
            $data['image'] = Car::findOrFail($id)->image;
        }
        // dd($data);
        Car::findOrFail($id)->update($data);
        return redirect()->route('cars.index');
    }
    public function destroy(Car $id) {
        if ($id->image !== null) {
            Storage::delete('images/cars/'. $id->image);
        }
        $id->delete();
        return redirect()->route('cars.index');
    }
    public function test($id) {
        $armada = ArmadaMobil::where('id', $id)->with('car:id,type')->get();
        // ArmadaMobil::create([
        //     'car_status' => 'Tersedia',
        //     'plat' => 'H 1235 AD',
        //     'car_id' => 1,
        // ]);
        return ($armada);
    }
    public function listAll() {
        $all = ArmadaMobil::with('car:id,type')->latest()->get();
        return view('admin.cars.all')->with([
            'cars' => $all,
        ]);
    }
    public function allCreate() {
        $cars = Car::all();
        return view('admin.cars.all-create')->with([
            'cars' => $cars,
        ]);
    }
    public function allStore(Request $request) {
        $data = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'plat' => 'required',
        ],[
            'car_id.required' => 'Mobil Harus Di pilih',
            'car_id.exists' => 'Mobil tidak ada',
            'plat.required' => 'Plat Nomor mobil harus diisi',
        ]);
        $data['car_status'] = 'Tersedia';
        ArmadaMobil::create($data);
        return redirect()->route('car.list.all');
    }
    public function allEdit($id) {
        $carses = ArmadaMobil::findOrFail($id);
        return view('admin.cars.all-edit')->with([
            'carses' => $carses,
        ]);
    }
    public function allUpdate(Request $request, $id) {
        $data = $request->validate([
            'plat' => 'required',
        ], [
            'plat.required' => 'Plat Nomor mobil harus diisi',
        ]);
        ArmadaMobil::findOrFail($id)->update($data);
        return redirect()->route('car.list.all');
    }
}
