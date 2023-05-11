@extends('admin.app')
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 border-b py-3 mb-2">
            {{ __('Pembayaran') }}
        </h2>
    <form enctype="multipart/form-data" method="post" action="{{ route('trans.user.send',$trans->id) }}">
    @csrf
    <div class="relative z-0 w-full mb-6 group">
        <x-input-label for="nama" :value="__('Nama')" />
        <input type="text" name="nama" id="nama" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('nama', $trans->nama) }}" disabled />
        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-input-label for="alamat" :value="__('Alamat')" />
        <input type="text" name="alamat" id="alamat" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('alamat', $trans->alamat) }}" disabled />
        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-input-label for="tanggal_sewa" :value="__('Tanggal Sewa')" />
        <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('tanggal_sewa', $trans->tanggal_sewa) }}" disabled />
        <x-input-error :messages="$errors->get('tanggal_sewa')" class="mt-2" />
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-input-label for="tanggal_kembali" :value="__('Tanggal Kembali')" />
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('tanggal_kembali', $trans->tanggal_kembali) }}" disabled />
        <x-input-error :messages="$errors->get('tanggal_kembali')" class="mt-2" />
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-input-label for="harga" :value="__('Harga')" />
        <input type="text" name="harga" id="harga" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('harga', $trans->harga) }}" disabled />
        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-input-label :value="__('Supir')" />
        <div class="flex items-center mb-4">
            <x-text-input id="supir-ya" class="h-4 w-4" type="radio" name="supir" value="1" checked="{{ $trans->supir == true }}" disabled/>
            <label for="supir-ya" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
        </div>
        <div class="flex items-center">
            <x-text-input id="supir-no" class="h-4 w-4" type="radio" name="supir" value="0" checked="{{ $trans->supir == false }}" disabled/>
            <label for="supir-no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
        </div>
        <x-input-error :messages="$errors->get('supir')" class="mt-2" />
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-input-label for="harga" :value="__('Bukti Pembayaran')" />
        <x-text-input id="image" class="block w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="file" name="image" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sewa</button>
</form>
@endsection