<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            TAMBAH USER BARU
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('userC.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h6>Nama</h5>
                                <div class="row">
                                    <div class="col">
                                        {{-- <input type="hidden" name="status" value="tersedia"> --}}
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Nama User">
                                        @error('name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="col">
                            <h6>Email</h5>
                                <div class="row">
                                    <div class="col">
                                        {{-- <input type="hidden" name="status" value="tersedia"> --}}
                                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Email User">
                                        @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h6>Password</h5>
                                <div class="row">
                                    <div class="col">
                                        <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password" placeholder="Password">
                                        @error('password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        {{-- <div class="col">
                            <h6>Konfirmasi Password</h5>
                                <div class="row">
                                    <div class="col">
                                        <input type="password" class="form-control" value="{{ old('password_confirm') }}" name="password_confirm" id="password_confirm" placeholder="Password_confirm">
                                        @error('password_confirm')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        </div> --}}
                        <div class="col">
                            <h6 class="">Role</h5>
                                <select class="form-select" name="role" id="role" aria-label="Default select example">
                                    <option disabled selected>Role</option>
                                    @foreach ($users as $key)
                                        @foreach ($key->roles as $keys)
                                            <option value="{{ $keys->name }}">{{ $keys->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('userC') }}" class="btn btn-warning mt-5 mx-2">Batal</a>
                                <button class="btn btn-primary mt-5">Tambah Kamar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
