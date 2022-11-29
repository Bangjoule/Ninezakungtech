<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whislists;

class listsController extends Controller
{
    /**
     * Display a listsing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = lists::all();
        return $lists;
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
        $lists = new lists();
        $lists->category_ram = $request->input('category_ram');
        $lists->category_colors = $request->input('category_colors');
        $lists->category_bundles = $request->input('category_bundles');
        $lists->category_ssd = $request->input('category_ssd');
        $lists->category_types = $request->input('category_types');
        $lists->save();

        return response()->json([
            'status' => 201,
            'data' => $lists
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
        $lists = lists::find($id);
        if($lists) {
            return response()->json([
                'status' => 200,
                'data' => $lists
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
        $lists = lists::find($id);
        if($lists){
            $lists->category_ram = $request->category_ram ? $request->category_ram : $lists->category_ram;
            $lists->category_colors = $request->category_colors ? $request->category_colors : $lists->category_colors;
            $lists->category_bundles = $request->category_bundles ? $request->category_bundles : $lists->category_bundles;
            $lists->category_ssd = $request->category_ssd ? $request->category_ssd : $lists->category_ssd;
            $lists->category_types = $request->category_types ? $request->category_types : $lists->category_types;
            $lists->save();
            return response()->json([
                'status' => 200,
                'data' => $lists
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
        $lists = lists::where('id', $id)->first();
        if($lists){
            $lists->delete();
            return response()->json([
                'status'=>200,
                'data' => $lists
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
