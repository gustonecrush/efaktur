<?php

namespace App\Http\Controllers;

use App\Models\PembeliKenaPajak;
use Illuminate\Http\Request;

class PembeliKenaPajakController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota_kab' => 'nullable|string|max:255',
            'npwp' => 'required|string|unique:pembeli_kena_pajaks,npwp|max:255',
        ]);

        PembeliKenaPajak::create($request->all());
        toast('Data pembeli kena pajak telah ditambahkan dalam sistem!', 'success');

        return redirect()->route('admin.pembeli');
    }

    public function update(Request $request)
    {
        $pkp = PembeliKenaPajak::findOrFail($request->id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota_kab' => 'nullable|string|max:255',
        ]);

        $pkp->update($request->all());
        toast('Data pembeli kena pajak telah diupdate dalam sistem!', 'success');

        return redirect()->route('admin.pembeli');
    }

    public function destroy(Request $request)
    {
        $pkp = PembeliKenaPajak::findOrFail($request->id);
        $pkp->delete();

        toast('Data pemebeli kena pajak telah dihapus dalam sistem!', 'success');
        return redirect()->route('admin.pembeli');
    }
}
