@extends('dashboard.layout')
@section('content')
    <style>
        select option {
            color: black;
        }

        .select2.select2-container {
            /* width: 50% !important; */
            /* margin-right: 2vh; */
        }

        .select2-container .select2-selection--single {
            width: auto;
            display: flex;
            height: auto;
            line-height: inherit;
            padding: 0.5rem 1rem;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: unset;
        }
    </style>
    <div class="">

        @include('dashboard.flash')

        <form action="{{ route('menu.update', $menu->id) }}" method="POST" id="form_create" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="">Nama Menu</label>
                <input type="text" class="form-control" name="nama_menu" required
                    value="{{ $menu->nama_menu ?? old('nama_menu') }}">
            </div>


            <div class="card p-3 rounded-0 shadow-sm">
                <label for="">Tambah Daftar Makanan</label>


                @foreach ($menu->makanans as $menuMakan)
                    <div id="inputFormRow">


                        <div class="input-group mb-3">
                            <select class="livesearch form-control d-flex" name="makanan_id[]">
                                <option value="">Pilih Makanan</option>
                                @foreach ($makanan as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $menuMakan->id ? 'selected' : '' }}>{{ $item->nama_makanan }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Kurangi</button>
                            </div>
                        </div>

                    </div>
                @endforeach

                <div id="newRow"></div>
                <button id="addRow" type="button" class="btn btn-sm btn-secondary mb-4">Tambah Input Makanan</button>

            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary ">Simpan Perubahan Menu Makanan</button>
                <a href="{{ route('input-data.index') }}" class="btn btn-dark">Kembali</a>
            </div>
        </form>
    </div>
@endsection



@push('scripts')
    <script>
        $(document).ready(function() {
            $('.livesearch').select2();
        });



        $("#addRow").click(function() {

            // Get the JSON data as an array
            var makananArray = {!! $makanan !!};

            // Create the options HTML using a loop
            var options = '';
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html +=
                '<select class="livesearch form-control d-flex" name="makanan_id[]">';
            html += '<option value="">Pilih Makanan</option>';
            $.each(makananArray, function(key, menu) {
                html += '<option value="' + menu.id + '">' + menu.nama_makanan + '</option>';
            });
            html += '</select>';
            html +=
                '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Kurangi</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            // Append the new row to #newRow

            $('#newRow').append(html);
            $('.livesearch').select2();
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });


        $('#gambar').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewMakanan').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
