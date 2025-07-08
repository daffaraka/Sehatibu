<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\InputData;
use Illuminate\Http\Request;

class InputDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pageName'] = 'Daftar Input Data';
        $data['inputs'] = InputData::with('user')->get();

        return view('dashboard.input-data.input-data-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pageName'] = 'Daftar Input Data';
        $data['users'] = User::all();

        return view('dashboard.input-data.input-data-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InputData $inputData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InputData $inputData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InputData $inputData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InputData $inputData)
    {
        //
    }


    public function perhitunganAhp($input)
    {
        $kriteria = [
            'protein' => 0.5,
            'lemak' => 0.2,
            'karbohidrat' => 0.2,
            'zat_besi' => 0.05,
            'asam_folat' => 0.05,
        ];

        $menus = Menu::all()->toArray();

        $maxValues = [];
        foreach ($kriteria as $key => $bobot) {
            $maxValues[$key] = max(array_column($menus, $key));
        }



        $scores = [];
        foreach ($menus as $menuName => $nutrients) {
            $score = 0;
            foreach ($kriteria as $k => $bobot) {
                $normalized = $nutrients[$k] / $maxValues[$k];
                $score += $bobot * $normalized;
            }
            $scores[$menuName] = $score;
        }

        arsort($scores); // Urutkan skor tertinggi ke bawah
    }
}
