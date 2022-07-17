<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            TIPE KAMAR
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
                                        <button type="submit" class="btn btn-danger btn-sm ms-2">
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
</x-app-layout>
