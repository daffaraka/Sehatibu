@extends('dashboard.layout')
@section('title', 'Tambah User')
@section('content')
    <div class="mt-4">
        <h4 class="h4 mb-4">Tambah Data</h4>

        <form action="{{ route('input-data.store') }}" method="POST" id="form_create">
            @csrf
            <div class="mb-3">
                <label class="form-label font-semibold">User</label>
                <select name="user_id" class="form-select" required>
                    <option value="">-- Pilih User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Tinggi Badan</label>
                <input type="number" class="form-control" name="tb" required>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Berat Badan</label>
                <input type="number" class="form-control" name="bb" required>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Trisemester</label>
                <input type="number" class="form-control" name="trisemester" required>
            </div>

            <div class="mb-3">
                <label class="form-label font-semibold">Aktivitas Harian</label>
                <input type="text" class="form-control" name="aktivitas_harian" required>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary ">Tambahkan</button>
                <a href="{{ route('input-data.index') }}" class="btn btn-dark">Kembali</a>
            </div>
        </form>
    </div>
@endsection



<script>
    $(document).ready(function() {
        $('#form_create').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        swal("Berhasil", response.message, "success");
                        window.location.href = "{{ route('input-data.index') }}";
                    } else {
                        swal("Gagal", response.message, "error");
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("Gagal", xhr.responseText, "error");
                }
            });
        });
    });
</script>
