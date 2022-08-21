<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            KAMAR
        </h3>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                @role('owner|admin')
                    <a href="{{ route('kamar.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah
                        Kamar Baru</a>
                @endrole
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Paket Permalam</th>
                            <th>Paket 4 Jam</th>
                            <th>Status</th>
                            @role('owner|admin')
                                <th>Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kamar as $item => $key)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td class="text-center fw-bold">{{ $key->kode_kamar }}</td>
                                <td>{{ $key->tipe_kamar->tipe_kamar }}</td>
                                @foreach ($key->tipe_kamar->price as $item)
                                    <td>{{ $item->malam }}</td>
                                    <td>{{ $item->jam }}</td>
                                @endforeach
                                <td>
                                    @if ($key->status == 'tersedia')
                                        <span class="badge rounded-pill bg-success">{{ $key->status }}</span>
                                    @else
                                        <span class="badge rounded-pill bg-danger">{{ $key->status }}</span>
                                    @endif
                                </td>
                                @role('owner|admin')
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('kamar.edit', $key->id) }}"
                                                class="btn btn-warning btn-sm ms-2">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            {{-- <a href="#" class="btn btn-danger btn-sm ms-2 delete"
                                                data-id='{{ $key->id }}' data-nama='{{ $key->kode_kamar }}'>
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a> --}}
                                            <button type="submit" class="btn btn-danger btn-sm ms-2 delete"
                                                data-id='{{ $key->id }}' data-nama='{{ $key->kode_kamar }}' id="btnId">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            // $('.delete').click(function() {
            $('#table1 tbody').on('click', '.delete', function () {
                var id = $(this).attr('data-id');
                var kamar = $(this).attr('data-nama');
                swal({
                        title: "Hapus Data?",
                        text: "Anda Yakin Menghapus Kamar " + kamar + "!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/kamar/" + id + "/delete";
                            swal("Kamar " + kamar + " Berhasil Dihapus!", {
                                icon: "success",
                            });
                        } else {
                            swal("Kamar " + kamar + " Batal Dihapus!");
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
