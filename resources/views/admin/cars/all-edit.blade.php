@extends('admin.app')
@section('content')    
<form action="{{ route('car.all.update', $carses->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <h3 class="text-xl">
        Edit Mobil
    </h3>
    <div class="p-6 space-y-2">
        <div>
            <x-input-label for="car_id" :value="__('Type Mobil')" class="mb-1" />
            <select name="car_id" id="car_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>{{ $carses->car->type }}</option>
            </select>
            <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="plat" :value="__('Plat Nomor')" />
            <x-text-input id="plat" class="block mt-1 w-full" type="text" name="plat" :value="old('plat', $carses->plat)" placeholder="Plat Nomor Mobil" />
            <x-input-error :messages="$errors->get('plat')" class="mt-2" />
        </div>
    </div>
    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Update
        </button>
    </div>
</form>
@endsection
