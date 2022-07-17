<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            TAMBAH KAMAR BARU
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kamar.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h6>Nomor Kamar</h5>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="status" value="tersedia">
                                        <input type="text" class="form-control" value="{{ old('kode_kamar') }}" name="kode_kamar" id="kode_kamar" placeholder="Nomor kamar">
                                        @error('kode_kamar')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="col">
                            <h6 class="">Tipe Kamar</h5>
                                <select class="form-select" name="tipe_kamar_id" id="tipe_kamar_id" aria-label="Default select example">{{ old('tipe_kamar_id') }}
                                    <option disabled selected>Tipe Kamar</option>
                                    @foreach ($tipe_kamar as $item)
                                        <option value="{{ $item->id }}">{{ $item->tipe_kamar }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('kamar') }}" class="btn btn-warning mt-5 mx-2">Batal</a>
                                <button class="btn btn-primary mt-5">Tambah Kamar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
