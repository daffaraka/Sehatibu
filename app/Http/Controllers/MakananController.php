<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MakananController extends Controller
{

    public function index()
    {
        $data['pageName'] = 'Daftar Makanan Tersedia';
        $data['makanans'] = Makanan::all();

        return view('dashboard.makanan.makanan-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pageName'] = 'Tambah Makanan';

        return view('dashboard.makanan.makanan-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'gambar_makanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'nama_makanan' => 'required|string|max:255',
            'type_protein' => 'required|string|max:255',
            'type_makanan' => 'required|string|max:255',
            'protein' => 'required|numeric',
            'karbohidrat' => 'required|numeric',
            'lemak' => 'required|numeric',
            'asam_folat' => 'required|numeric',
            'zat_besi' => 'required|numeric'
        ], [
            'gambar.required' => 'Gambar makanan harus diunggah.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Hanya gambar dengan ekstensi jpeg, png, jpg, gif, atau svg yang diizinkan.',
            'gambar.max' => 'Ukuran file gambar tidak boleh lebih dari 2MB.',
            'nama_makanan.required' => 'Nama makanan harus diisi.',
            'type_protein.required' => 'Type protein harus diisi.',
            'type_makanan.required' => 'Type makanan harus diisi.',
            'protein.required' => 'Protein harus diisi.',
            'karbohidrat.required' => 'Karbohidrat harus diisi.',
            'lemak.required' => 'Lemak harus diisi.',
            'asam_folat.required' => 'Asam folat harus diisi.',
                        'zat_besi.required' => 'Zat besi harus diisi.',

        ]);


        $file = $request->file('gambar_makanan');
        $fileExt = $file->getClientOriginalExtension();
        $savedName = time() . '_' . $request->nama_makanan . '.' . $fileExt;
        $file->storeAs('public', $savedName);


        // dd($publicPath);
        Makanan::create([
            'nama_makanan' => $request->nama_makanan,
            'gambar_makanan' => 'gambar-makanan/' . $savedName,
            'type_protein' => $request->type_protein,
            'type_makanan' => $request->type_makanan,
            'protein' => $request->protein,
            'karbohidrat' => $request->karbohidrat,
            'lemak' => $request->lemak,
            'asam_folat' => $request->asam_folat,
            'zat_besi' => $request->zat_besi
        ]);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Makanan $makanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Makanan $makanan)
    {
        $data['pageName'] = 'Edit Makanan';
        $data['makanan'] = $makanan;
        return view('dashboard.makanan.makanan-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Makanan $makanan)
    {


        // dd($request->all());
        $request->validate([
            'gambar_makanan' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'nama_makanan' => 'required|string|max:255',
            'type_protein' => 'required|string|max:255',
            'type_makanan' => 'required|string|max:255',
            'protein' => 'required|numeric',
            'karbohidrat' => 'required|numeric',
            'lemak' => 'required|numeric',
            'asam_folat' => 'required|numeric',
            'zat_besi' => 'required|numeric'
        ], [
            'gambar.required' => 'Gambar makanan harus diunggah.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Hanya gambar dengan ekstensi jpeg, png, jpg, gif, atau svg yang diizinkan.',
            'gambar.max' => 'Ukuran file gambar tidak boleh lebih dari 2MB.',
            'nama_makanan.required' => 'Nama makanan harus diisi.',
            'type_protein.required' => 'Type protein harus diisi.',
            'type_makanan.required' => 'Type makanan harus diisi.',
            'protein.required' => 'Protein harus diisi.',
            'karbohidrat.required' => 'Karbohidrat harus diisi.',
            'lemak.required' => 'Lemak harus diisi.',
            'asam_folat.required' => 'Asam folat harus diisi.',
            'zat_besi.required' => 'Zat besi harus diisi.',
        ]);


        if ($request->hasFile('gambar_makanan')) {
            $file = $request->file('gambar_makanan');
            $fileExt = $file->getClientOriginalExtension();
            $savedName = time() . '_' . $request->nama_makanan . '.' . $fileExt;

            if (File::exists($makanan->gambar_makanan)) {
                File::delete($makanan->gambar_makanan);
                $file->storeAs('public', $savedName);
            } else {
                $file->storeAs('public', $savedName);
            };


            $makanan->update([
                'nama_makanan' => $request->nama_makanan,
                'gambar_makanan' => 'gambar-makanan/' . $savedName,
                'type_protein' => $request->type_protein,
                'type_makanan' => $request->type_makanan,
                'protein' => $request->protein,
                'karbohidrat' => $request->karbohidrat,
                'lemak' => $request->lemak,
                'asam_folat' => $request->asam_folat,
            ]);
        } else {
            $makanan->update([
                'nama_makanan' => $request->nama_makanan,
                'type_protein' => $request->type_protein,
                'type_makanan' => $request->type_makanan,
                'protein' => $request->protein,
                'karbohidrat' => $request->karbohidrat,
                'lemak' => $request->lemak,
                'asam_folat' => $request->asam_folat,
            ]);
        }


        // $savedName = time() . '_' . $request->nama_makanan . '.' . $fielExt;
        // $path = $file->storeAs('public', $savedName);


        // // dd($publicPath);
        // $makanan->update([
        //     'nama_makanan' => $request->nama_makanan,
        //     'gambar_makanan' => 'gambar-makanan/' . $savedName,
        //     'type_protein' => $request->type_protein,
        //     'type_makanan' => $request->type_makanan,
        //     'protein' => $request->protein,
        //     'karbohidrat' => $request->karbohidrat,
        //     'lemak' => $request->lemak,
        //     'asam_folat' => $request->asam_folat,
        // ]);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Makanan $makanan)
    {


        if (File::exists($makanan->gambar_makanan)) {
            File::delete($makanan->gambar_makanan);
        }

        $makanan->delete();

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus');
    }
}
