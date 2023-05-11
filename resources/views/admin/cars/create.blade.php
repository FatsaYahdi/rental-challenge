@extends('admin.app')
@section('content')    
<form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <h3 class="text-xl">
        Buat Mobil
    </h3>
    <div class="p-6 space-y-2">
        <div>
            <x-input-label for="type" :value="__('Type')" />
            <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" placeholder="Type Mobil" />
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="plat" :value="__('Plat Nomor')" />
            <x-text-input id="plat" class="block mt-1 w-full" type="text" name="plat" :value="old('plat')" placeholder="Plat Nomor Mobil" />
            <x-input-error :messages="$errors->get('plat')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="bensin" :value="__('Jenis Bensin')" />
            <x-text-input id="bensin" class="block mt-1 w-full" type="text" name="bensin" :value="old('bensin')" placeholder="Jenis Bensin Mobil" />
            <x-input-error :messages="$errors->get('bensin')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="image" :value="__('Gambar')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" min="1" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
    </div>
    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Buat
        </button>
    </div>
</form>
@endsection
