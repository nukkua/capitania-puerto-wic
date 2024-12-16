<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCapitaniaPuerto;
use App\Models\CapitaniaPuerto;
use Illuminate\Http\Request;

class CapitaniaPuertoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capitania_puerto = CapitaniaPuerto::all();

        if ($capitania_puerto->isEmpty()) {
            return response()->json([
                "message" => "esta vacia la lista de capitania_puerto",
            ], 400);
        }

        return response()->json(
            $capitania_puerto,
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCapitaniaPuerto $request)
    {
        try {
            $capitania_puerto = CapitaniaPuerto::create($request->all());

            return response()->json([
                "message" => "capitania_puerto creada exitosamente",
                "capitania_puerto" => $capitania_puerto
            ]);
        } catch (\Exception $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CapitaniaPuerto $capitaniaPuerto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CapitaniaPuerto $capitaniaPuerto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CapitaniaPuerto $capitaniaPuerto)
    {
        //
    }
}
