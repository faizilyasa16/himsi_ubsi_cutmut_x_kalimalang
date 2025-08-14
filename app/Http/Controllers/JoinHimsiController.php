<?php

namespace App\Http\Controllers;

use App\Models\JoinHimsi;
use Illuminate\Http\Request;
class JoinHimsiController extends Controller
{
    public function index()
    {
        // Mengambil data link dari model JoinHimsi
        $joinHimsi = JoinHimsi::first();

        // Mengembalikan view dengan data link
        return view('user.join.index', compact('joinHimsi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        // kalau sudah ada data, update
        $joinHimsi = JoinHimsi::first();
        if ($joinHimsi) {
            $joinHimsi->update([
                'link' => $request->link
            ]);
        } else {
            JoinHimsi::create([
                'link' => $request->link
            ]);
        }

        return redirect()->route('join-himsi.index')->with('success', 'Link Join HIMSI berhasil disimpan.');
    }

}
