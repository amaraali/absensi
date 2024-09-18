<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $presensi = Presensi::where('user_id', $user->id)->get();

        return view('presensi.index', compact('user', 'presensi'));
    }

    public function store(Request $request, $id)
    {
        // dd($request->all(), $id);
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $presensi = new Presensi();
        $presensi->user_id = $id;
        $presensi->tanggal = today();
        $presensi->jam_masuk = now();
        $presensi->lokasi = $request->latitude . ',' . $request->longitude;
        $presensi->created_by = Auth::id();
        $presensi->save();

        return redirect()->route('presensi.index');
    }
}
