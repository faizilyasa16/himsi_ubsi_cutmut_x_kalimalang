<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = User::all();
        return view('user.pengurus.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,anggota,bph,alumni',
            'divisi' => 'nullable|in:ketua,wakil_ketua,sekretaris,bendahara,pendidikan,rsdm,litbang,kominfo',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto jika ada
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('users/photos', 'public');
        }

        // Simpan user
        User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'divisi' => $request->divisi,
            'photo' => $photoPath,
        ]);

        return redirect()->route('pengurus.index')->with('success', 'Pengurus berhasil ditambahkan.');
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
        $pengurus = User::findOrFail($id);
        return view('user.pengurus.edit', compact('pengurus'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $pengurus = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:users,nim,' . $pengurus->id,
            'email' => 'required|email|unique:users,email,' . $pengurus->id,
            'role' => 'required|in:admin,anggota,bph,alumni',
            'divisi' => 'nullable|in:ketua,wakil_ketua,sekretaris,bendahara,pendidikan,rsdm,litbang,kominfo',
            'peringatan' => 'nullable|in:sp_1,sp_2,sp_3',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle foto baru jika di-upload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($pengurus->photo && Storage::disk('public')->exists($pengurus->photo)) {
                Storage::disk('public')->delete($pengurus->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('users/photos', 'public');
            $pengurus->photo = $path;
        }

        // Update field lainnya
        $pengurus->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'role' => $request->role,
            'divisi' => $request->divisi,
            'peringatan' => $request->peringatan,
            'photo' => $pengurus->photo, 
        ]);


        $pengurus->save();

        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengurus = User::findOrFail($id);
        $pengurus->delete();

        return redirect()->route('pengurus.index')->with('success', 'Pengurus berhasil dihapus.');
    }
}
