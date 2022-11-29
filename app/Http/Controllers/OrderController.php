<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = order::all();
        return $order;
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
        $order = new order();
        $order->satuan = $request->input('satuan');
        $order->jenis_tipe = $request->input('jenis_tipe');
        $order->bundle_pilihan = $request->input('bundle_pilihan');
        $order->satuan_ram = $request->input('satuan_ram');
        $order->pilih_warna = $request->input('pilih_warna');
        $order->satuan_ssd = $request->input('satuan_ssd');
        $order->tipe_windows = $request->input('tipe_windows');
        $order->save();

        return response()->json([
            'status' => 201,
            'data' => $order
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
        $order = order::find($id);
        if($order) {
            return response()->json([
                'status' => 200,
                'data' => $order
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
        $order = order::find($id);
        if($order){
            $order->satuan = $request->satuan ? $request->satuan : $order->satuan;
            $order->jenis_tipe = $request->jenis_tipe ? $request->jenis_tipe : $order->jenis_tipe;
            $order->bundle_pilihan = $request->bundle_pilihan ? $request->bundle_pilihan : $order->bundle_pilihan;
            $order->satuan_ram = $request->satuan_ram ? $request->satuan_ram : $order->satuan_ram;
            $order->pilih_warna = $request->pilih_warna ? $request->pilih_warna : $order->pilih_warna;
            $order->satuan_ssd = $request->satuan_ssd ? $request->satuan_ssd : $order->satuan_ssd;
            $order->tipe_windows = $request->tipe_windows ? $request->tipe_windows : $order->tipe_windows;
            $order->save();
            return response()->json([
                'status' => 200,
                'data' => $order
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
        $order = order::where('id', $id)->first();
        if($order){
            $order->delete();
            return response()->json([
                'status'=>200,
                'data' => $order
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
