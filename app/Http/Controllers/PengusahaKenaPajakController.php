<?php

namespace App\Http\Controllers;

use App\Models\PengusahaKenaPajak;
use Illuminate\Http\Request;

class PengusahaKenaPajakController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota_kab' => 'nullable|string|max:255',
            'npwp' => 'required|string|unique:pengusaha_kena_pajaks,npwp|max:255',
        ]);

        PengusahaKenaPajak::create($request->all());
        toast('Data pengusaha kena pajak telah ditambahkan dalam sistem!', 'success');

        return redirect()->route('admin.pengusaha');
    }

    public function update(Request $request)
    {
        $pkp = PengusahaKenaPajak::findOrFail($request->id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota_kab' => 'nullable|string|max:255',
        ]);

        $pkp->update($request->all());
        toast('Data pengusaha kena pajak telah diupdate dalam sistem!', 'success');

        return redirect()->route('admin.pengusaha');
    }

    public function destroy(Request $request)
    {
        $pkp = PengusahaKenaPajak::findOrFail($request->id);
        $pkp->delete();

        toast('Data pengusaha kena pajak telah dihapus dalam sistem!', 'success');
        return redirect()->route('admin.pengusaha');
    }
}
