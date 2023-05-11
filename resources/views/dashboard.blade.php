<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 pt-14">
            {{ __('List Mobil') }}
        </h2>
    </x-slot>

    <div class="pt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 md:grid md:grid-cols-3 gap-4">
                    @foreach ($cars as $car)
                    <div class="w-full md:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 row-span-3">
                        <a>
                            {{-- image --}}
                            @if ($car->image !== null)
                            <div class="min-h-[267px]">
                                <img class="p-4 min-h-[250px] rounded-t-lg" src="{{ asset('storage/images/cars/'.$car->image) }}" alt="product image" />
                            </div>
                            @endif
                            @if ($car->image == null)
                            <div class="min-h-[267px]">
                                <img class="p-4 min-h-[250px] rounded-t-lg" src="https://hips.hearstapps.com/hmg-prod/images/2023-mclaren-artura-101-1655218102.jpg?crop=1.00xw:0.847xh;0,0.153xh&resize=1200:*" alt="product image" />
                            </div>
                            @endif
                        </a>
                        <div class="px-5 pb-5">
                            <a>
                                {{-- mobil --}}
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $car->car->type }}
                                </h5>
                            </a>
                            <div class="flex items-center justify-between">
                                {{-- harga --}}
                                <span class="text-xl font-bold text-gray-900 dark:text-white">
                                    Rp. 100000 / hari
                                </span>
                                {{-- rent --}}
                                <a href="{{ route('rent', ['id' => $car->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Sewa
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
