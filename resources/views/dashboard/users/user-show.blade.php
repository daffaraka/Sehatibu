@extends('dashboard.layout')
@section('content')
    <div class="grid grid-cols-2 md:grid-cols-2 gap-4 mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                value="{{ $user->tanggal_lahir }}" disabled>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" disabled>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="opd" {{ $user->role == 'opd' ? 'selected' : '' }}>OPD</option>
                <option value="walidata" {{ $user->role == 'walidata' ? 'selected' : '' }}>Walidata</option>
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('user.index') }}" class="mt-5 btn btn-secondary">
            Kembali
        </a>
    </div>
@endsection
