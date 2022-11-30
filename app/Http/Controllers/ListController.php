<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whislist;

class ListController extends Controller
{
    /**
     * Display a Whislisting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Whislist = Whislist::all();
        return $Whislist;
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
        $Whislist = new Whislist();
        $Whislist->category_ram = $request->input('category_ram');
        $Whislist->category_colors = $request->input('category_colors');
        $Whislist->category_bundles = $request->input('category_bundles');
        $Whislist->category_ssd = $request->input('category_ssd');
        $Whislist->category_types = $request->input('category_types');
        $Whislist->save();

        return response()->json([
            'status' => 201,
            'data' => $Whislist
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
        $Whislist = Whislist::find($id);
        if($Whislist) {
            return response()->json([
                'status' => 200,
                'data' => $Whislist
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
        $Whislist = Whislist::find($id);
        if($Whislist){
            $Whislist->category_ram = $request->category_ram ? $request->category_ram : $Whislist->category_ram;
            $Whislist->category_colors = $request->category_colors ? $request->category_colors : $Whislist->category_colors;
            $Whislist->category_bundles = $request->category_bundles ? $request->category_bundles : $Whislist->category_bundles;
            $Whislist->category_ssd = $request->category_ssd ? $request->category_ssd : $Whislist->category_ssd;
            $Whislist->category_types = $request->category_types ? $request->category_types : $Whislist->category_types;
            $Whislist->save();
            return response()->json([
                'status' => 200,
                'data' => $Whislist
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
        $Whislist = Whislist::where('id', $id)->first();
        if($Whislist){
            $Whislist->delete();
            return response()->json([
                'status'=>200,
                'data' => $Whislist
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
