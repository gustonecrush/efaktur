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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'id_pengusaha_kena_pajak' => 'required|exists:pengusaha_kena_pajaks,id',
            'id_pembeli_kena_pajak' => 'required|exists:pembeli_kena_pajaks,id',
            'no_seri_faktur' => 'required|unique:faktur_pajaks',
            'location' => 'required',
            'ttd' => 'required|string'
        ]);

        // Create a new instance of the FakturPajak model
        $fakturPajak = new FakturPajak();

        // Assign the validated data to the model properties
        $fakturPajak->id_pengusaha_kena_pajak = $validatedData['id_pengusaha_kena_pajak'];
        $fakturPajak->id_pembeli_kena_pajak = $validatedData['id_pembeli_kena_pajak'];
        $fakturPajak->no_seri_faktur = $validatedData['no_seri_faktur'];
        $fakturPajak->harga_jual = 0;
        $fakturPajak->dikurangi_potongan_harga = 0;
        $fakturPajak->dikurangi_uang_muka = 0;
        $fakturPajak->dasar_pengenaan_pajak = 0;
        $fakturPajak->total_ppn = 0;
        $fakturPajak->total_ppnbm = 0;
        $fakturPajak->location = $validatedData['location'];
        $fakturPajak->ttd = $validatedData['ttd'];

        // Save the model to the database
        $fakturPajak->save();

        // Provide feedback to the user
        toast('Data pembeli faktur pajak telah ditambahkan dalam sistem!', 'success');

        // Redirect to the admin.faktur route
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
        // Validate the request data

        // Find the specific faktur using the provided id
        $faktur = FakturPajak::where('id', '=', $request->id)->first();
        // Update the faktur properties one by one
        $faktur->harga_jual = $request['harga_jual'];
        $faktur->dikurangi_potongan_harga = $request['dikurangi_potongan_harga'] ?? $faktur->dikurangi_potongan_harga;
        $faktur->dikurangi_uang_muka = $request['dikurangi_uang_muka'] ?? $faktur->dikurangi_uang_muka;
        $faktur->dasar_pengenaan_pajak = $request['dasar_pengenaan_pajak'] ?? $faktur->dasar_pengenaan_pajak;
        $faktur->location = $request['location'];
        $faktur->total_ppnbm = $request['total_ppnbm'];
        $faktur->total_ppn = $request['dasar_pengenaan_pajak'] * 11 / 100 ?? $faktur->dasar_pengenaan_pajak;;
        $faktur->ttd = $request['ttd'];

        // Save the updated faktur to the database
        $faktur->save();

        // Provide feedback to the user
        toast('Data faktur pajak telah diupdate dalam sistem!', 'success');

        // Redirect to the admin.faktur route
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
