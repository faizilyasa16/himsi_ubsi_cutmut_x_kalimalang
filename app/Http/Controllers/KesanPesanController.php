<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KesanPesan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class KesanPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all KesanPesan records from the database
        $kesanPesans = KesanPesan::paginate(6); // Paginate results for better performance
        return view('user.kesan-pesan.index' , compact('kesanPesans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.kesan-pesan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kesan_pesan' => 'required|string|max:255',
            'status' => 'nullable|in:active,inactive', // status boleh kosong
        ]);

        $kesanPesan = new KesanPesan();
        $kesanPesan->kesan_pesan = $validated['kesan_pesan'];
        $kesanPesan->status = $validated['status'] ?? 'inactive'; //
        $kesanPesan->user_id = Auth::id(); 
        $kesanPesan->save();

        Alert::success('Kesan dan pesan berhasil disimpan!');
        return redirect()->route('kesan-pesan.index');

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
        $kesanPesan = KesanPesan::findOrFail($id);
        return view('user.kesan-pesan.edit', compact('kesanPesan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kesan_pesan' => 'required|string|max:255',
            'status' => 'nullable|in:active,inactive', // Validasi status
        ]);

        $kesanPesan = KesanPesan::findOrFail($id);
        $kesanPesan->kesan_pesan = $validated['kesan_pesan'];
        $kesanPesan->status = $validated['status'] ?? 'inactive'; // default inactive kalau gak ada input
        $kesanPesan->user_id = Auth::id(); // Update user_id jika
        $kesanPesan->save();
        Alert::success('Kesan dan pesan berhasil diperbarui!');

        return redirect()->route('kesan-pesan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kesanPesan = KesanPesan::findOrFail($id);
        $kesanPesan->delete();
        Alert::success('Kesan dan pesan berhasil dihapus!');
        return redirect()->route('kesan-pesan.index');
    }
}
