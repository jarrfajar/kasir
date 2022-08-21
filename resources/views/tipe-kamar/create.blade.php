<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            TAMBAH TIPE KAMAR
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tipe-kamar.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h6 class="">Nama Tipe Kamar</h5>
                                <input type="text" class="form-control" value="{{ old('tipe_kamar') }}" name="tipe_kamar" id="tipe_kamar" placeholder="Nama Tipe kamar">
                                    @error('tipe_kamar')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                        </div>
                        <div class="col">
                            <h6>Harga Kamar</h5>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" type-currency="IDR" class="form-control" value="{{ old('harga') }}" name="harga" id="harga" placeholder="Paket Permalam">
                                        @error('harga')
                                            <div class="text-danger">
                                                {{ 'Paket Permalam wajib diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" type-currency="IDR" class="form-control" value="{{ old('jam') }}" name="jam" id="jam" placeholder="Paket 4 Jam">
                                        @error('jam')
                                            <div class="text-danger">
                                                {{ 'Paket 4 Jam wajib diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('tipe-kamar') }}" class="btn btn-warning mt-5 mx-2">Batal</a>
                                <button class="btn btn-primary mt-5">Tambah Tipe Kamar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
