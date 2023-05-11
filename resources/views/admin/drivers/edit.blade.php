@extends('admin.app')
@section('content')    
<form action="{{ route('driver.update', $driver->id) }}" method="POST">
    @csrf
    @method('PUT')
    <h3 class="text-xl">
        Edit Mobil
    </h3>
    <div class="p-6 space-y-2">
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama',$driver->nama)" placeholder="Nama" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="alamat" :value="__('Alamat Rumah')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat',$driver->alamat)" placeholder="Alamat Rumah" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @if ($driver->jenis_kelamin == 'Laki-Laki')
                <option selected value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                @endif
                @if ($driver->jenis_kelamin == 'Perempuan')
                <option value="Laki-Laki">Laki-Laki</option>
                <option selected value="Perempuan">Perempuan</option>
                @endif
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="status" :value="__('Status')" />
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @if ($driver->status == 'Tersedia')
                <option selected value="Tersedia">Tersedia</option>
                <option value="Dipesan">Dipesan</option>
                @endif
                @if ($driver->status == 'Dipesan')
                <option value="Tersedia">Tersedia</option>
                <option selected value="Dipesan">Dipesan</option>
                @endif
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
    </div>
    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Update
        </button>
    </div>
</form>
@endsection
