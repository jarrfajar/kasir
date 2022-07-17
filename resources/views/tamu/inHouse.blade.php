<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            Tamu In-House
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
                            <th>Jam Chek Out</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tamu as $item => $key)
                            @if ($key->tamu->status == 'check-in')
                                <tr>
                                    <td>{{ $item+1 }}</td>
                                    <td class="text-center fw-bold">{{ $key->kamar_id }}</td>
                                    <td>{{ $key->tamu->nama }}</td>
                                    <td>{{ $key->tipe_kamar }}</td>
                                    <td>{{ $key->check_in }}</td>
                                    <td class="fw-bold">{{ $key->check_out }}</td>
                                    <td class="fw-bold text-center">{{ $key->check_out_jam }}</td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('tamu.update',$key->id) }}" class="btn btn-warning btn-sm ms-2">
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
</x-app-layout>
