<?php

namespace App\Http\Controllers\PemilihanUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voting;
use Illuminate\Support\Facades\Auth;
use App\Models\Kandidat;
use App\Models\Pemilihan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Charts\HasilVoting;
class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemilihan = Pemilihan::where('status', 'mulai')->get();
        return view('home.layanan.voting', compact('pemilihan'));
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
        $user = Auth::user();

        // Cek role user
        if (!in_array($user->role, ['bph', 'anggota'])) {
            abort(403, 'Kamu tidak memiliki izin untuk melakukan voting.');
        }

        // Validasi input
        $request->validate([
            'kandidat_id'   => 'required|exists:kandidat,id',
            'pemilihan_id'  => 'required|exists:pemilihan,id',
        ]);

        // Cek apakah user sudah voting di pemilihan ini
        $sudahVoting = Voting::where('user_id', $user->id)
            ->where('pemilihan_id', $request->pemilihan_id)
            ->exists();

        if ($sudahVoting) {
            return back()->with('error', 'Kamu sudah memberikan suara pada pemilihan ini.');
        }

        // Simpan voting
        Voting::create([
            'user_id'       => $user->id,
            'kandidat_id'   => $request->kandidat_id,
            'pemilihan_id'  => $request->pemilihan_id,
        ]);
        Alert::success('Voting Berhasil', 'Terima kasih telah memberikan suara kamu.');
        return redirect()->route('voting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $pemilihan = Pemilihan::with(['kandidat.ketua', 'kandidat.wakil'])
                ->where('slug', $slug)
                ->firstOrFail();

        $sudahVote = Voting::where('user_id', Auth::id())
                        ->where('pemilihan_id', $pemilihan->id)
                        ->exists();
        
        // Create the voting chart
        $votingChart = app()->make(HasilVoting::class)->build($pemilihan);
        
        return view('home.layanan.isi.voting', compact('pemilihan', 'sudahVote', 'votingChart'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
