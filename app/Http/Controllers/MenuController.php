<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Makanan;
use App\Models\MenuMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pageName'] = 'Daftar Menu Makanan';
        $data['menus'] = Menu::with('makanans')->get();
        foreach ($data['menus'] as $menu) {
            $totalProtein = 0;
            $totalLemak = 0;
            $totalKarbo = 0;
            $totalZatBesi = 0;
            $totalAsamFolat = 0;

            foreach ($menu->makanans as $menuMakanan) {
                $m = $menuMakanan->makanan;
                if ($m) {
                    $totalProtein += $m->protein ?? 0;
                    $totalLemak += $m->lemak ?? 0;
                    $totalKarbo += $m->karbohidrat ?? 0;
                    $totalZatBesi += $m->zat_besi ?? 0;
                    $totalAsamFolat += $m->asam_folat ?? 0;
                }
            }

            // Assign sebagai properti tambahan
            $menu->total_protein = $totalProtein;
            $menu->total_lemak = $totalLemak;
            $menu->total_karbohidrat = $totalKarbo;
            $menu->total_zat_besi = $totalZatBesi;
            $menu->total_asam_folat = $totalAsamFolat;
            $menu->skor_ahp = ($totalProtein + $totalLemak + $totalKarbo + $totalZatBesi + $totalAsamFolat) / 5;
        }

        return view('dashboard.menu-makanan.menu-makanan-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pageName'] = 'Tambah Menu Baru';
        $data['makanan'] = Makanan::all();

        return view('dashboard.menu-makanan.menu-makanan-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_menu' => 'required',
            'makanan_id.*' => 'required',
        ], [
            'nama_menu.required' => 'Nama menu harus diisi',
            'makanan_id.*.required' => 'Daftar makanan harus diisi',
        ]);


        try {
            DB::beginTransaction();

            $menu = new Menu();

            $menu->nama_menu = $request->nama_menu;
            $menu->save();

            for ($i = 0; $i < count($request->makanan_id); $i++) {
                $menuMakanan = new MenuMakanan();
                $menuMakanan->makanan_id = $request->makanan_id[$i];
                $menuMakanan->menu_id = $menu->id;
                $menuMakanan->isMakananPokok = false;
                $menuMakanan->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }



        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $data['pageName'] = 'Edit ' . $menu->nama_menu;
        $data['menu'] = $menu;
        $data['makanan'] = Makanan::all();

        return view('dashboard.menu-makanan.menu-makanan-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'makanan_id.*' => 'required',
        ], [
            'nama_menu.required' => 'Nama menu harus diisi',
            'makanan_id.*.required' => 'Daftar makanan harus diisi',
        ]);


        try {
            DB::beginTransaction();

            $menu->nama_menu = $request->nama_menu;
            $menu->save();



            $menu->makanans()->delete();

            for ($i = 0; $i < count($request->makanan_id); $i++) {
                $menuMakanan = new MenuMakanan();
                $menuMakanan->makanan_id = $request->makanan_id[$i];
                $menuMakanan->menu_id = $menu->id;
                $menuMakanan->isMakananPokok = false;
                $menuMakanan->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }



        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
