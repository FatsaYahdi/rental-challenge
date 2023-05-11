@extends('admin.app')
@section('content')
<div class="relative">
    {{-- @dd($transaction) --}}
    <table class="w-screen text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" >
                    No
                </th>
                <th scope="col" class="px-6 py-3" >
                    Nama
                </th>
                <th scope="col" class="px-6 py-3" >
                    Harga
                </th>
                <th scope="col" class="px-6 py-3" >
                    Tanggal Sewa
                </th>
                <th scope="col" class="px-6 py-3" >
                    Tanggal Kembali
                </th>
                <th scope="col" class="px-6 py-3" >
                    Jenis Mobil
                </th>
                <th scope="col" class="px-6 py-3" >
                    Supir
                </th>
                <th scope="col" class="px-6 py-3" >
                    Aksi
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
            url: "{{ route('trans.user.list') }}",
            type: "GET",
        },
        columns: [
            { data: 'DT_RowIndex', sortable: false, searchable: false},
            { data: 'nama', name: 'nama' },
            { data: 'harga', name: 'harga' },
            { data: 'tanggal_sewa', name: 'tanggal_sewa' },
            { data: 'tanggal_kembali', name: 'tanggal_kembali' },
            { data: 'type', name: 'type' },
            { data: 'supir', name: 'supir' },
            { data: 'action', name: 'action', searchable:false, sortable: false },
        ],
        searching: false, 
        lengthChange: false,
    });
});
</script>
@endpush