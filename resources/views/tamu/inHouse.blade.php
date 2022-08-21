<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            Tamu In-House
        </h3>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Kamar</th>
                            <th>Nama</th>
                            <th>Tipe Kamar</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tamu as $item => $key)
                            @if ($key->tamu->status == 'check-in')
                                <tr>
                                    <td>{{ $item + 1 }}</td>
                                    <td class="text-center fw-bold">{{ $key->kamar_id }}</td>
                                    <td>{{ $key->tamu->nama }}</td>
                                    <td>{{ $key->tipe_kamar }}</td>
                                    <td>{{ $key->check_in }} | {{ $key->check_in_jam }}</td>
                                    <td class="fw-bold">{{ $key->check_out }} | {{ $key->check_out_jam }}</td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('tamu.extend', $key->id) }}"
                                                class="btn btn-warning btn-sm ms-2">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
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
