@extends('dashboard.layout')
@section('content')
    <h4 class="h4 mb-4">Edit Formulir</h4>


    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                value="{{ $user->tanggal_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="opd" {{ $user->role == 'opd' ? 'selected' : '' }}>OPD</option>
                <option value="walidata" {{ $user->role == 'walidata' ? 'selected' : '' }}>Walidata</option>
            </select>
        </div>


        <div class="d-flex justify-content-between gap-2">
            <button type="submit" class="mt-5 btn btn-primary">Perbarui</button>
            <a href="{{ route('user.index') }}" class="mt-5 btn btn-secondary">
                Kembali</a>
        </div>

    </form>
@endsection



{{-- @push('scripts')
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
                            window.location.href = "{{ route('formulir.index') }}";
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
@endpush --}}
