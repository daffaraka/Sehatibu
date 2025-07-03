@extends('dashboard.layout')
@section('title', 'Tambah User')
@section('content')
    <div class="">

        @include('dashboard.flash')

        <form action="{{ route('makanan.store') }}" method="POST" id="form_create" enctype="multipart/form-data">
            @csrf



            <div class="mb-3">
                <img src="" alt="gambar makanan" id="previewMakanan" class="img-thumbnail d-block mb-2 w-25">
                <label for="">Gambar Makanan</label>
                <input type="file" id="gambar" class="form-control" name="gambar_makanan" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="">Nama Makanan/Minuman</label>
                <input type="text" class="form-control" name="nama_makanan" required value="{{ old('nama_makanan') }}">
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Type Makanan</label>
                <select name="type_makanan" class="form-select" required>
                    <option value="">-- Pilih Type Makanan --</option>
                    <option value="makanan" {{ old('type_makanan') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ old('type_makanan') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Type Protein</label>
                <select name="type_protein" class="form-select" required>
                    <option value="">-- Pilih Type Protein --</option>
                    <option value="nabati" {{ old('type_protein') == 'Nabati' ? 'selected' : '' }}>Nabati</option>
                    <option value="hewani" {{ old('type_protein') == 'Hewani' ? 'selected' : '' }}>Hewani</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Protein (Gram) </label>
                <input type="number" class="form-control" name="protein" required value="{{ old('protein', 0) }}">
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Karbohidrat (Gram)</label>
                <input type="number" class="form-control" name="karbohidrat" required value="{{ old('karbohidrat', 0) }}">
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Lemak (Gram)</label>
                <input type="number" class="form-control" name="lemak" required value="{{ old('lemak', 0) }}">
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Asam Folat (Gram)</label>
                <input type="number" class="form-control" name="asam_folat" required value="{{ old('asam_folat', 0) }}">
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary ">Tambahkan</button>
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

