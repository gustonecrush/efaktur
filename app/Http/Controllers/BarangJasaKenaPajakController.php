<?php

namespace App\Http\Controllers;

use App\Models\BarangJasaKenaPajak;
use App\Models\FakturPajak;
use Illuminate\Http\Request;

class BarangJasaKenaPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama_barang_jasa_kena_pajak' => 'required',
            'harga_satuan' => 'required|integer',
            'kuantitas' => 'required',
        ]);

        $barang = new BarangJasaKenaPajak();
        $barang->id_faktur_pajak = $request->id;
        $barang->nama_barang_jasa_kena_pajak = $request->nama_barang_jasa_kena_pajak;
        $barang->harga_satuan = $request->harga_satuan;
        $barang->kuantitas = $request->kuantitas;
        $barang->total = (int)$request->kuantitas * (int)$request->harga_satuan;

        $faktur = FakturPajak::where('id', '=', $request->id)->first();

        // Update the specific column
        $faktur->harga_jual += (int)$request->kuantitas * (int)$request->harga_satuan;

        $faktur->save();

        $barang->save();

        toast('Data barang/jasa faktur pajak telah ditambahkan dalam sistem!', 'success');

        return redirect('/admin/faktur/' . $request->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $pkp = BarangJasaKenaPajak::findOrFail($request->id);
        $faktur = FakturPajak::findOrFail($request->faktur_id);

        // Update the specific column
        $faktur->harga_jual -= (int)$request->total;
        $faktur->save();
        $pkp->delete();

        toast('Data barang/jasa faktur telah dihapus dalam sistem!', 'success');
        return redirect()->back();
    }
}
