<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Details;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = details::all();
        return $details;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $details = new details();
        $details->nama_merk = $request->input('nama_merk');
        $details->stok = $request->input('stok');
        $details->deskripsi = $request->input('deskripsi');
        $details->save();

        return response()->json([
            'status' => 201,
            'data' => $details
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = details::find($id);
        if($details) {
            return response()->json([
                'status' => 200,
                'data' => $details
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $details = details::find($id);
        if($details){
            $details->nama_merk = $request->nama_merk ? $request->nama_merk : $details->nama_merk;
            $details->stok = $request->stok ? $request->stok : $details->stok;
            $details->deskripsi = $request->deskripsi ? $request->deskripsi : $details->deskripsi;
            $details->save();
            return response()->json([
                'status' => 200,
                'data' => $details
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details = details::where('id', $id)->first();
        if($details){
            $details->delete();
            return response()->json([
                'status'=>200,
                'data' => $details
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
