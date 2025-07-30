<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        // Validasi data
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle upload foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            // Simpan foto baru
            $photoPath = $request->file('photo')->store('users/photos', 'public');
        } else {
            // Pakai foto lama kalau tidak upload
            $photoPath = $user->photo;
        }

        // Update data user
        $user->update([
            'email' => $request->email,
            'photo' => $photoPath,
        ]);
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Profil berhasil diperbarui.');
        return redirect()->back();
    }


    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'], // otomatis cek new_password_confirmation
        ]);

        $user = User::findOrFail(Auth::id());


        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.'])->withInput();
        }

        // Jika password lama sesuai, update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Password berhasil diperbarui.');
        return back();
    }
}
