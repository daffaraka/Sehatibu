@extends('dashboard.layout')
@section('content')
    <div class="d-flex justify-content-end mb-4">

        <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
    </div>

    <hr class="my-4">


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="table-dark text-white">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left w-25">Nama Menu Makanan</th>
                    <th class="px-4 py-2 text-left">Skor AHP</th>

                    <th class="px-4 py-2 text-left">Protein</th>
                    <th class="px-4 py-2 text-left">Lemak</th>
                    <th class="px-4 py-2 text-left">Karbohidrat</th>
                    <th class="px-4 py-2 text-left">Zat Besi</th>
                    <th class="px-4 py-2 text-left">Asam Folat</th>
                    <th class="px-4 py-2 text-left">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $menu->nama_menu }}</td>
                        <th class="px-4 py-2 text-left">Skor AHP</th>

                        <td class="px-4 py-2">{{ number_format($menu->total_protein, 0) }} Gram</td>
                        <td class="px-4 py-2">{{ number_format($menu->total_lemak, 0) }} Gram</td>
                        <td class="px-4 py-2">{{ number_format($menu->total_karbohidrat, 0) }} Gram</td>
                        <td class="px-4 py-2">{{ number_format($menu->total_zat_besi, 0) }} Gram</td>
                        <td class="px-4 py-2">{{ number_format($menu->total_asam_folat, 0) }} Gram</td>
                        <td class="px-4 py-2">
                            <div class="btn-group gap-2" role="group">
                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" id="form_delete"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                        data-id="{{ $menu->id }}" data-nama="{{ $menu->menu }}">
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
                text: "Anda tidak dapat mengembalikan menu ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus menu ini!'
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
