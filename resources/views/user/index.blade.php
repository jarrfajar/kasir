<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            User
        </h3>
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
                    <a href="{{ route('userC.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah User Baru</a>
                @endrole
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item => $key)
                            <tr>
                                <td>{{ $item+1 }}</td>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->email }}</td>
                                @foreach ($key->roles as $keys)                                    
                                    <td>{{ $keys->name }}</td>
                                @endforeach
                                <td>
                                    <a href="{{ route('tamu.update',$key->id) }}" class="btn btn-warning btn-sm ms-2">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm ms-2 delete" data-id='{{ $key->id }}' data-nama='{{ $key->kode_kamar }}'>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>