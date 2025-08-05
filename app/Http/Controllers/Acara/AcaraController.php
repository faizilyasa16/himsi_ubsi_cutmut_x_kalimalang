<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\Support\Facades\Auth;
class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            // Jika user login, tampilkan semua acara
            $acara = Acara::whereIn('status', ['open', 'closed'])->latest()->paginate(6);
        } else {
            // Jika belum login, hanya tampilkan acara dengan nama kategori yang tidak mengandung 'himsi'
            $acara = Acara::whereHas('kategori', function ($query) {
                $query->where('nama', 'NOT LIKE', '%himsi%');
            })->whereIn('status', ['open', 'closed'])->latest()->paginate(6);
        }

        return view('home.layanan.acara', compact('acara'));
    }




    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
        // Create WhatsApp message with event details
        $waMessage = "Halo! Saya ingin tahu lebih lanjut tentang acara ini:\n\n";
        $waMessage .= "📚 *{$acara->nama}*\n";
        $waMessage .= "🗓️ Tanggal: " . \Carbon\Carbon::parse($acara->waktu_mulai)->isoFormat('dddd, D MMMM Y') . "\n";
        $waMessage .= "⏰ Waktu: " . \Carbon\Carbon::parse($acara->waktu_mulai)->format('H:i') . " WIB";
        
        if($acara->waktu_selesai) {
            $waMessage .= " - " . \Carbon\Carbon::parse($acara->waktu_selesai)->format('H:i') . " WIB";
        }
        
        $waMessage .= "\n📍 Lokasi: {$acara->lokasi}\n";
        
        if($acara->biaya) {
            if($acara->biaya == '0' || strtolower($acara->biaya) == 'gratis') {
                $waMessage .= "💰 Biaya: GRATIS\n";
            } else {
                $waMessage .= "💰 Biaya: Rp " . number_format((int) preg_replace('/\D/', '', $acara->biaya), 0, ',', '.') . "\n";
            }
        }
        
        if($acara->kuota) {
            $waMessage .= "👥 Kuota: {$acara->kuota} orang\n";
        }
        
        
        // Encode the message for URL
        $encodedMessage = urlencode($waMessage);
        // Bersihkan nomor dari karakter non-digit
        $rawNumber = $acara->contact_person;
        $cleaned = preg_replace('/\D/', '', $rawNumber);

        // Ubah awalan 0 menjadi 62 (untuk Indonesia)
        $phone = preg_replace('/^0/', '62', $cleaned);

        // Buat URL WhatsApp
        $waUrl = "https://wa.me/{$phone}?text={$encodedMessage}";


        return view('home.layanan.isi.acara', compact('acara', 'waUrl'));
    }

}
