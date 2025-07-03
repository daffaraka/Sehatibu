@extends('dashboard.layout')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h4 class="h4">User</h4>


            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah
                User</a>

        </div>

        <hr class="my-4 border-t-2 border-gray-300">


        <table class="table table-striped mt-3">
            <thead>
                <tr class="bg-blue-200 border-2">
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2 text-left">Tanggal Dibuat</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border border-1">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->instansi->alamat_instansi ?? '-' }}</td>
                        <td class="px-4 py-2">
                            @if ($user->role == 'admin')
                                <span class="badge badge-info">Admin</span>
                            @else
                                <span class="badge badge-success">Ibu</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::parse($user->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-4 py-2">
                            <div class="d-flex gap-2">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-success p-2">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" id="form_delete"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger p-2 deleteBtn"
                                        data-id="{{ $user->id }}" data-nama="{{ $user->name }}">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </form>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-outline-secondary p-2">
                                    <i class="fas fa-eye text-sm"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

@push('scripts')
    <script>
        $('.deleteBtn').click(function(e) {

            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak dapat mengembalikan user ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus user ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    $('#form_delete').submit();

                }
            })
        });

        @if (session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session()->get('success') }}',
            });
        @endif

        @if (session()->has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session()->get('error') }}',
            });
        @endif
    </script>
@endpush
