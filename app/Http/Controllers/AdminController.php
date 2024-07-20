<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangPemesanan;
use App\Models\FakturPajak;
use App\Models\Mitra;
use App\Models\PembeliKenaPajak;
use App\Models\Pemesanan;
use App\Models\PengusahaKenaPajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            toast('Successfully logged in. Welcome to Dashboard E-Faktur CV Sayovi Karyatama.', 'success',);
            return redirect()->route('admin.faktur');
        }

        toast('Failed to login, cannot find your account contact your operator!', 'error',);
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toast('Successfully logged out. Thanks has used Dashboard E-Faktur CV Sayovi Karyatama.', 'success',);

        return redirect()->route('admin.login');
    }

    public function pengusahaKenaPajakPage()
    {
        $pkps = PengusahaKenaPajak::all();
        return view('admin.pengusaha-kena-pajak', compact('pkps'));
    }

    public function pembeliKenaPajakPage()
    {
        $pbkps = PembeliKenaPajak::all();
        return view('admin.pembeli-kena-pajak', compact('pbkps'));
    }

    public function fakturPajakPage()
    {
        $pengusahaKenaPajaks = PengusahaKenaPajak::all();
        $pembeliKenaPajaks = PembeliKenaPajak::all();
        $fakturPajaks = FakturPajak::with(['getPembeliKenaPajak', 'getPengusahaKenaPajak', 'getBarangJasaKenaPajak'])->get();
        return view('admin.faktur-pajak', compact('fakturPajaks', 'pengusahaKenaPajaks', 'pembeliKenaPajaks'));
    }

    public function fakturPajakDetailPage($id)
    {

        $fakturPajaks = FakturPajak::where('id', '=', $id)->with(['getPembeliKenaPajak', 'getPengusahaKenaPajak', 'getBarangJasaKenaPajak'])->first();

        // dd($fakturPajaks);
        return view('admin.faktur-pajak-detail', compact('fakturPajaks'));
    }
}
