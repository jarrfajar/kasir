<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            CHECK OUT
        </h3>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5>Pilih kamar yang terpakai</h5>
            </div>
            <div class="card-body">
                <div class="row row-cols-auto">
                    @foreach ($kamar as $item)
                        <div class="col">
                            <div class="card bg-danger text-white" style="width: 11.5rem;">
                                <div class="card-body">
                                    <h3 class="text-white">Kamar {{ $item->kode_kamar }}</h3>
                                    <h6 class="text-white">{{ $item->tipe_kamar->tipe_kamar }}</h5>
                                    <a href="{{ route('check-out.detail',$item->kode_kamar) }}" class="btn btn-light mt-3">Pilih Kamar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        @if (Session::has('success'))
            <script>
                toastr.success("{{ Session::get('success') }}", "Berhasil", {
                    "closeButton": true,
                });
            </script>            
        @endif
    @endpush
</x-app-layout>
