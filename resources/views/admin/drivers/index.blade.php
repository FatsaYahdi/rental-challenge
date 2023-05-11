@extends('admin.app')
@section('content')
<div class="relative">
    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-3" type="button">
        <a href="{{ route('driver.create') }}">Create</a>
    </button>
    <table class="w-screen text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-md text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" width="5%">
                    No
                </th>
                <th scope="col" class="px-6 py-3" width="20%">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3" width="20%">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3" width="15%">
                    Jenis Kelamin
                </th>
                <th scope="col" class="px-6 py-3" width="15%">
                    Status
                </th>
                <th scope="col" class="px-6 py-3" width="15%">
                    Aksi
                </th>
            </tr>
        </thead>
    </table>
</div>
  </div> 
  
@endsection
@push('sekrip')
<script>
    $(document).ready(function () {
            $('table').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: "{{ route('driver.list') }}",
                type: "GET",
            },
            columns: [
                { data: 'DT_RowIndex', sortable: false, searchable: false },
                { data: 'nama', name: 'nama' },
                { data: 'alamat', name: 'alamat' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin', searchable: false },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', searchable:false, sortable: false },
            ],
            searching: false, 
            lengthChange: false,
        });
    });
</script>
@endpush