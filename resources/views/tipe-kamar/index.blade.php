<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            TIPE KAMAR
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-header">
                @role('owner|admin')
                    <a href="{{ route('tipe-kamar.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Tipe Kamar</a>
                @endrole
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe Kamar</th>
                            <th>Paket Permalam</th>
                            <th>Paket 4 Jam</th>
                            @role('owner|admin')
                                <th>Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipe_kamar as $item => $key)
                            <tr>
                                <td>{{ $item+1 }}</td>
                                <td>{{ $key->tipe_kamar }}</td>
                                    @foreach ($key->price as $item)
                                        <td>{{ $item->malam }}</td>
                                        <td>{{ $item->jam }}</td>
                                    @endforeach
                                @role('owner|admin')    
                                    <td>
                                        <a href="{{ route('tipe-kamar.update',$key->id) }}" class="btn btn-warning btn-sm ms-2">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm ms-2 delete" data-id='{{ $key->id }}' data-nama='{{ $key->tipe_kamar }}'>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            // $('.delete').click(function() {
            $('#table1 tbody').on('click', '.delete', function () {
                var id = $(this).attr('data-id');
                var data = $(this).attr('data-nama');
                swal({
                    title: "Hapus Data?",
                    text: "Anda Yakin Menghapus Tipe Kamar "+data+"!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/tipe-kamar/"+id+"/delete";
                        swal("Tipe Kamar "+data+" Berhasil Dihapus!", {
                        icon: "success",
                        });
                    } else {
                        swal("Tipe Kamar "+data+" Batal Dihapus!");
                    }
                });
            });
        </script>

        @if (Session::has('success'))
            <script>
                toastr.success("{{ Session::get('success') }}", "Berhasil", {
                    "closeButton": true,
                });
            </script>            
        @endif
        @if (Session::has('update'))
            <script>
                toastr.success("{{ Session::get('update') }}", "Berhasil", {
                    "closeButton": true,
                });
            </script>            
        @endif
    @endpush
</x-app-layout>
