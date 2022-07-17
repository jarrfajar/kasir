<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            UBAH DATA TAMU
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tamu.edit', $tamu->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h6>NIK</h5>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{ old('nik') ?? $tamu->nik }}" name="nik" id="nik" placeholder="NIK">
                                        @error('nik')
                                            <div class="text-danger">
                                                {{ 'Nik harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            <h6  class="mt-3">Nama</h5>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('nama') ?? $tamu->nama }}" name="nama" id="nama" placeholder="Nama Lengkap">
                                    @error('nama')
                                        <div class="text-danger">
                                            {{ 'Nama harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                        <option selected>{{ old('jenis_kelamin') ?? $tamu->jenis_kelamin }}</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <h6 class="mt-3">Tempat Tanggal Lahir</h5>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('kab/kota') ?? $tamu->kab_kota }}" name="kab_kota" id="kab_kota" placeholder="Kabupaten/Kota">
                                    @error('kab_kota')
                                        <div class="text-danger">
                                            {{ 'Kab/Kota harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" value="{{ old('tgl_lahir') ?? $tamu->tgl_lahir }}" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir">
                                    @error('tgl_lahir')
                                        <div class="text-danger">
                                            {{ 'Tanggal Lahir harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="mt-3">Agama</h5>
                            <select class="form-select"  name="agama" aria-label="Default select example">
                                <option selected>{{ old('agama') ?? $tamu->agama }}</option>
                                <option value="islam">Islam</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="katolik">Katolik</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                            <h6 class="mt-3">Pekerjaan</h5>
                            <input type="text" class="form-control" value="{{ old('pekerjaan') ?? $tamu->pekerjaan }}" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                            @error('pekerjaan')
                                <div class="text-danger">
                                    {{ 'Pekerjaan harus diisi' }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <h6>Alamat</h5>
                            <textarea class="form-control mb-3" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap">{{ old('alamat') ?? $tamu->alamat }}</textarea>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('rt_rw') ?? $tamu->rt_rw }}" id="rt_rw" name="rt_rw" placeholder="RT/RW">
                                    @error('rt_rw')
                                        <div class="text-danger">
                                            {{ 'RT/RW harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('kel_desa') ?? $tamu->kel_desa }}" id="kel_desa" name="kel_desa" placeholder="Kel/Desa">
                                    @error('kel_desa')
                                        <div class="text-danger">
                                            {{ 'Kel/Desa harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ old('kecamatan') ?? $tamu->kecamatan }}" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                                    @error('kecamatan')
                                        <div class="text-danger">
                                            {{ 'Kecamatan harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="mt-3">Warga Negara</h5>
                                <select class="form-select" name="warga_negara" aria-label="Default select example">
                                    <option selected>{{ old('warga_negara') ?? $tamu->warga_negara }}</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            <h6 class="mt-3">Nomor Telepon</h5>
                            <input type="text" class="form-control" value="{{ old('nomor') ?? $tamu->nomor }}" id="nomor" name="nomor" placeholder="Nomor Telepon">
                            @error('nomor')
                                <div class="text-danger">
                                    {{ 'Nomor harus diisi' }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('tamu') }}" class="btn btn-warning mt-5 mx-2">Batal</a>
                                <button class="btn btn-primary mt-5">Ubah Data Tamu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
