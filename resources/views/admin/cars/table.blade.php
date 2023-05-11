@extends('admin.app')
@section('content')
<button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-3" type="button">
    <a href="{{ route('cars.create') }}">Create</a>
</button>
<div class="relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" width="5%">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Bensin
                </th>
                <th scope="col" class="px-6 py-3" width="5%">
                    Action
                </th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@push('sekrip')
<script>
    $(document).ready(function () {
        $('table').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: "{{ route('cars.list') }}",
                type: "GET",
            },
            columns: [
                { data: 'DT_RowIndex', searchable: false, sortable: false },
                { data: 'type', name: 'type' },
                { data: 'bensin', name: 'bensin' },
                { data: 'action', name: 'action', searchable:false, sortable: false },
            ],
            searching: false, 
            lengthChange: false,
        });
    });
</script>
@endpush
