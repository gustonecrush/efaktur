<?php

namespace App\Http\Controllers;

use App\Models\FakturPajak;
use Illuminate\Http\Request;

class FakturPajakController extends Controller
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
            'id_pengusaha_kena_pajak' => 'required|exists:pengusaha_kena_pajaks,id',
            'id_pembeli_kena_pajak' => 'required|exists:pembeli_kena_pajaks,id',
            'no_seri_faktur' => 'required|unique:faktur_pajaks',
            'harga_jual' => 'required|integer',
            'dikurangi_potongan_harga' => 'required|integer',
            'dikurangi_uang_muka' => 'required|integer',
            'dasar_pengenaan_pajak' => 'required|integer',
            'total_ppn' => 'required|integer',
            'total_ppnbm' => 'required|integer',
            'location' => 'required|integer',
            'ttd' => 'required|string'
        ]);

        FakturPajak::create($validatedData);
        toast('Data pembeli faktur pajak telah ditambahkan dalam sistem!', 'success');

        return redirect()->route('admin.faktur');
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
    public function update(Request $request)
    {
        $faktur = FakturPajak::findOrFail($request->id);

        $validatedData = $request->validate([
            'harga_jual' => 'required|integer',
            'dikurangi_potongan_harga' => 'required|integer',
            'dikurangi_uang_muka' => 'required|integer',
            'dasar_pengenaan_pajak' => 'required|integer',
            'total_ppn' => 'required|integer',
            'total_ppnbm' => 'required|integer',
            'location' => 'required|integer',
            'ttd' => 'required|string'
        ]);

        $faktur->update($validatedData);
        toast('Data faktur pajak telah diupdate dalam sistem!', 'success');

        return redirect()->route('admin.faktur');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $pkp = FakturPajak::findOrFail($request->id);
        $pkp->delete();

        toast('Data faktur pajak telah dihapus dalam sistem!', 'success');
        return redirect()->route('admin.faktur');
    }
}
