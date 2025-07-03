    @extends('dashboard.layout')
@section('content')

        <div class="d-flex justify-content-between mb-4">
            <h4 class="h4">Input Data</h4>

            <a href="{{ route('input-data.create') }}"
                class="btn btn-primary">Tambah Data Input</a>
        </div>

        <hr class="my-4">

        <table class="table table-bordered w-100">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nama Ibu</th>
                    <th class="px-4 py-2 text-left">Tinggi Badan</th>
                    <th class="px-4 py-2 text-left">Berat Badan</th>
                    <th class="px-4 py-2 text-left">Tri Semester</th>
                    <th class="px-4 py-2 text-left">Aktivitas Harian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $input)
                    <tr>
                        <td class="px-4 py-2">{{$loop->iteration}}</td>
                        <td class="px-4 py-2">{{ $input->user_id }}</td>
                        <td class="px-4 py-2">{{ $input->tb }}</td>
                        <td class="px-4 py-2">{{ $input->bb }}</td>
                        <td class="px-4 py-2">{{ $input->trisemester }}</td>
                        <td class="px-4 py-2">{{ $input->aktivitas_harian }}</td>
                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::parse($input->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-4 py-2">
                            <div class="btn-group" role="group">
                                <a href="{{ route('user.edit', $input->id) }}" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('user.destroy', $input->id) }}" method="POST" id="form_delete"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger deleteBtn"
                                        data-id="{{ $input->id }}" data-nama="{{ $input->user_id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('user.show', $input->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
    </script>
@endpush

