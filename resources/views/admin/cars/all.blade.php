@extends('admin.app')
@section('content')
<button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-3">
    <a href="{{ route('car.all.create') }}">Create</a>
</button>
<div class="relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" width="5%" >
                    No
                </th>
                <th scope="col" class="px-6 py-3" >
                    Type Mobil
                </th>
                <th scope="col" class="px-6 py-3" >
                    Plat Nomor
                </th>
                <th scope="col" class="px-6 py-3" >
                    Status
                </th>
                <th scope="col" class="px-6 py-3" >
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($cars as $car)
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $car->car->type }}
                </td>
                <td class="px-6 py-4">
                    {{ $car->plat }}
                </td>
                <td class="px-6 py-4">
                    {{ $car->car_status }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('car.all.edit', $car->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection
