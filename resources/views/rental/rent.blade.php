<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    </head>
    <script>
        function hitung() {
            // lama hari
            const tanggalSewa = new Date(document.getElementById('tanggal_sewa').value);
            var lamaSewa = parseInt(document.getElementById('lama_sewa').value);
            var tanggalPengembalian = new Date(tanggalSewa.getTime() + (lamaSewa * 24 * 60 * 60 * 1000));
            var formattedDate = moment(tanggalPengembalian).format("YYYY-MM-DD");
            document.getElementById('tanggal_kembali').value = formattedDate;
            
            // harga
            var harga = 50000;
            var hatot = harga * lamaSewa;
            document.getElementById('harga').value = hatot;
        }

    </script>
    <body>
        @include('layouts.navigation')
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 pt-14">
                    {{ __('Sewa') }}
                </h2>
            </x-slot>
            <div class="pt-5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('rent.post', $car->id ) }}" method="POST">
                            @csrf
                            <div class="relative z-0 w-full mb-6 group">
                                <x-input-label for="nama" :value="__('Nama')" />
                                <input type="text" name="nama" id="nama" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('nama') }}" />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <input type="text" name="alamat" id="alamat" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('alamat') }}" />
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <x-input-label for="tanggal_sewa" :value="__('Tanggal Sewa')" />
                                <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('tanggal_sewa') }}" />
                                <x-input-error :messages="$errors->get('tanggal_sewa')" class="mt-2" />
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <x-input-label for="lama_sewa" :value="__('Lama Sewa')" />
                                <input type="number" name="lama_sewa" id="lama_sewa" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" min="1" oninput="hitung()" value="{{ old('lama_sewa') }}" />
                                <x-input-error :messages="$errors->get('lama_sewa')" class="mt-2" />
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <x-input-label for="tanggal_kembali" :value="__('Tanggal Kembali')" />
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('tanggal_kembali') }}" />
                                <x-input-error :messages="$errors->get('tanggal_kembali')" class="mt-2" />
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <x-input-label for="harga" :value="__('Harga')" />
                                <input type="text" name="harga" id="harga" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('harga') }}" />
                                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                <x-input-label :value="__('Supir')" />
                            <div class="flex items-center mb-4">
                                <x-text-input id="supir-ya" class="h-4 w-4" type="radio" name="supir" value="1" />
                                <label for="supir-ya" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
                            </div>
                            <div class="flex items-center">
                                <x-text-input id="supir-no" class="h-4 w-4" type="radio" name="supir" value="0" />
                                <label for="supir-no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                            </div>
                                <x-input-error :messages="$errors->get('supir')" class="mt-2" />
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sewa</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
