<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            UBAH TIPE KAMAR
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tipe-kamar.edit',$tipe_kamar->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h6 class="">Tipe Kamar</h5>
                                <input type="text" class="form-control" value="{{ old('tipe_kamar') ?? $tipe_kamar->tipe_kamar }}" name="tipe_kamar" id="tipe_kamar" placeholder="Tipe kamar">
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
                                        <input type="text" type-currency="IDR" class="form-control" value="{{ old('malam') ?? $price->malam }}" name="malam" id="malam" placeholder="Paket Permalam">
                                        @error('malam')
                                            <div class="text-danger">
                                                {{ 'Paket Permalam wajib diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" type-currency="IDR" class="form-control" value="{{ old('jam') ?? $price->jam }}" name="jam" id="jam" placeholder="Paket 4 Jam">
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
                                <button class="btn btn-primary mt-5">Ubah Tipe Kamar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
