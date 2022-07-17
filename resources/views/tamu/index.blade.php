<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            BUKU TAMU
        </h3>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session()->get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session()->get('update')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('tamu.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Tamu Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                            <th>Warga Negara</th>
                            <th>Nomor Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tamu as $item => $key)
                            <tr>
                                <td>{{ $item+1 }}</td>
                                <td>{{ $key->nik }}</td>
                                <td>{{ $key->nama }}</td>
                                <td>{{ $key->alamat }}</td>
                                <td>{{ $key->warga_negara }}</td>
                                <td>{{ $key->nomor }}</td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <a href="{{ route('tamu.update',$key->id) }}" class="btn btn-warning btn-sm ms-2">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm ms-2">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
