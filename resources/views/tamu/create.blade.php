<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            TAMBAH TAMU BARU
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tamu.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h6>NIK</h5>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="status" value="tamu">
                                        <input type="text" class="form-control" value="{{ old('nik') }}" name="nik" id="nik" placeholder="NIK">
                                        @error('nik')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            <h6  class="mt-3">Nama</h5>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('nama') }}" name="nama" id="nama" placeholder="Nama Lengkap">
                                    @error('nama')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <select class="form-select" value="{{ old('jenis_kelamin') }}" name="jenis_kelamin" aria-label="Default select example">
                                        <option disabled selected>Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <h6 class="mt-3">Tempat Tanggal Lahir</h5>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('kab_kota') }}" name="kab_kota" id="kab_kota" placeholder="Kabupaten/Kota">
                                    @error('kab_kota')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="datetime-local" class="form-control bg-white" value="{{ old('tgl_lahir') }}" name="tgl_lahir" id="tgl_lahir" placeholder="Pilih Tanggal">
                                    @error('tgl_lahir')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="mt-3">Agama</h5>
                            <select class="form-select"  name="agama" aria-label="Default select example">{{ old('agama') }}">
                                <option disabled selected>Agama</option>
                                <option value="islam">Islam</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="katolik">Katolik</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                            <h6 class="mt-3">Pekerjaan</h5>
                            <input type="text" class="form-control" value="{{ old('pekerjaan') }}" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                            @error('pekerjaan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <h6>Alamat</h5>
                            <textarea class="form-control mb-3" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('kecamatan') }}" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                                    @error('kecamatan')
                                        <div class="text-danger">
                                            {{ 'Kecamatan harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('kel_desa') }}" id="kel_desa" name="kel_desa" placeholder="Kel/Desa">
                                    @error('kel/desa')
                                        <div class="text-danger">
                                            {{ 'Kel/Desa harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('rt_rw') }}" id="rt_rw" name="rt_rw" placeholder="RT/RW">
                                    @error('rt/rw')
                                        <div class="text-danger">
                                            {{ 'RT/RW harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                            </div> --}}
                            <h6 class="mt-3">Warga Negara</h5>
                                <select class="form-select" name="warga_negara" aria-label="Default select example">{{ old('warga_negara') }}
                                    <option disabled selected>Warga Negara</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            <h6 class="mt-3">Nomor Telepon</h5>
                            <input type="text" class="form-control" value="{{ old('nomor') }}" id="nomor" name="nomor" placeholder="Nomor Telepon">
                            @error('nomor')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('tamu') }}" class="btn btn-warning mt-5 mx-2">Batal</a>
                                <button class="btn btn-primary mt-5">Tambah Tamu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            flatpickr("#tgl_lahir", {
              dateFormat: "d-m-Y",
            });
        </script>
    @endpush
</x-app-layout>
