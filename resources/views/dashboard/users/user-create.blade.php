@extends('dashboard.layout')
@section('title','Tambah User')
@section('content')

    <div class="container">
        <h4 class="h4 mb-4">Tambah Formulir</h4>


        <form action="{{ route('user.store') }}" method="POST" id="form_create">

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="opd">OPD</option>
                    <option value="walidata">Walidata</option>
                </select>
            </div>

            <button type="submit"
                class="mt-5 btn btn-primary">Tambahkan</button>
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
                        window.location.href = "{{ route('user.index') }}";
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
