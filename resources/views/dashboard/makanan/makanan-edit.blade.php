@extends('dashboard.layout')
@section('title', 'Edit Makananan')
@section('content')
    <div class="">

        @include('dashboard.flash')

        <form action="{{ route('makanan.update',$makanan->id) }}" method="POST" id="form_create" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <img src="{{ asset($makanan->gambar_makanan) }}" alt="gambar makanan" id="previewMakanan"
                    class="img-thumbnail d-block mb-2 w-25">
                <label for="">Gambar Makanan</label>
                <input type="file" id="gambar" class="form-control" name="gambar_makanan" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="">Nama Makanan/Minuman</label>
                <input type="text" class="form-control" name="nama_makanan" required
                    value="{{ $makanan->nama_makanan ?? old('nama_makanan') }}">
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Type Makanan</label>
                <select name="type_makanan" class="form-select" required>
                    <option value="">-- Pilih Type Makanan --</option>
                    <option value="makanan"
                        {{ $makanan->type_makanan == 'Makanan' ? 'selected' : '' }}>Makanan
                    </option>
                    <option value="minuman"
                        {{ $makanan->type_makanan == 'Minuman' ? 'selected' : '' }}>Minuman
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Type Protein</label>
                <select name="type_protein" class="form-select" required>
                    <option value="">-- Pilih Type Protein --</option>
                    <option value="nabati" {{ $makanan->type_protein == 'Nabati' ? 'selected' : '' }}>Nabati</option>
                    <option value="hewani" {{ $makanan->type_protein == 'Hewani' ? 'selected' : '' }}>Hewani</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Protein (Gram) </label>
                <input type="number" class="form-control" name="protein" required value="{{ $makanan->protein }}">
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Karbohidrat (Gram)</label>
                <input type="number" class="form-control" name="karbohidrat" required value="{{ $makanan->karbohidrat }}">
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Lemak (Gram)</label>
                <input type="number" class="form-control" name="lemak" required value="{{ $makanan->lemak }}">
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Asam Folat (Gram)</label>
                <input type="number" class="form-control" name="asam_folat" required value="{{ $makanan->asam_folat }}">
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary ">Perbarui</button>
                <a href="{{ route('input-data.index') }}" class="btn btn-dark">Kembali</a>
            </div>
        </form>
    </div>
@endsection



@push('scripts')
    <script>
        // $(document).ready(function() {
        //     $('#form_create').submit(function(e) {
        //         e.preventDefault();

        //         $.ajax({
        //             url: $(this).attr('action'),
        //             method: $(this).attr('method'),
        //             data: new FormData(this),
        //             processData: false,
        //             dataType: 'json',
        //             contentType: false,
        //             success: function(response) {
        //                 if (response.status) {
        //                     swal("Berhasil", response.message, "success");
        //                     window.location.href = "{{ route('input-data.index') }}";
        //                 } else {
        //                     swal("Gagal", response.message, "error");
        //                 }
        //             },
        //             error: function(xhr, ajaxOptions, thrownError) {
        //                 swal("Gagal", xhr.responseText, "error");
        //             }
        //         });
        //     });
        // });


        $('#gambar').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewMakanan').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
