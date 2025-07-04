<?php

namespace App\Http\Controllers;

use App\Models\InputData;
use App\Models\User;
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
}
