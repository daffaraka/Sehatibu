@extends('dashboard.layout')
@section('content')
    <div class="d-flex justify-content-end mb-4">

        <a href="{{ route('makanan.create') }}" class="btn btn-primary">Tambah Makanan</a>
    </div>

    <hr class="my-4">


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="table-dark text-white">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Gambar Makanan</th>
                    <th class="px-4 py-2 text-left">Nama Makanan</th>
                    <th class="px-4 py-2 text-left">Type Protein</th>
                    <th class="px-4 py-2 text-left">Type Makanan</th>
                    <th class="px-4 py-2 text-left">Protein (gram)</th>
                    <th class="px-4 py-2 text-left">Karbohidrat (gram)</th>
                    <th class="px-4 py-2 text-left">Lemak (gram)</th>
                    <th class="px-4 py-2 text-left">Asam Folat (gram)</th>
                    <th class="px-4 py-2 text-left">Zat besi (gram)</th>

                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($makanans as $makanan)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset($makanan->gambar_makanan) }}" alt="Gambar Makanan"
                                class="img-thumbnail d-block mb-2">
                        </td>
                        <td class="px-4 py-2">{{ $makanan->nama_makanan }}</td>
                        <td class="px-4 py-2">
                            @if ($makanan->type_makanan == 'Makanan')
                                <span class="badge bg-dark">Makanan</span>
                            @else
                                <span class="badge bg-light text-dark">Minuman</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if ($makanan->type_protein == 'Nabati')
                                <span class="badge bg-success">Nabati</span>
                            @else
                                <span class="badge bg-info">Hewani</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $makanan->protein }}</td>
                        <td class="px-4 py-2">{{ $makanan->karbohidrat }}</td>
                        <td class="px-4 py-2">{{ $makanan->lemak }}</td>
                        <td class="px-4 py-2">{{ $makanan->asam_folat }}</td>
                                                <td class="px-4 py-2">{{ $makanan->zat_besi }}</td>

                        <td class="px-4 py-2">
                            <div class="btn-group gap-2" role="group">
                                <a href="{{ route('makanan.edit', $makanan->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('makanan.show', $makanan->id) }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <form action="{{ route('makanan.destroy', $makanan->id) }}" method="POST" id="form_delete"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                        data-id="{{ $makanan->id }}" data-nama="{{ $makanan->nama_makanan }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
                text: "Anda tidak dapat mengembalikan makanan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus makanan ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    $('#form_delete').submit();
                }
            })
        });


        // Swal.fire({
        //     icon: 'success',
        //     title: 'Berhasil',
        //     text: 'Data makanan berhasil dihapus!',
        //     confirmButtonText: 'OK'
        // });
    </script>
@endpush
