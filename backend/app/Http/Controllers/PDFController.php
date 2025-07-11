public function cetakRekap($id, Request $r)
{
    $siswa = Siswa::with('user')->findOrFail($id);
    $nilai = Nilai::with('indikator')->where([
        ['siswa_id', $id],
        ['semester', $r->semester ?? 'Ganjil'],
        ['tahun_ajaran', $r->tahun ?? TahunAjaran::where('is_active', true)->first()?->tahun]
    ])->get();

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.rekap', compact('siswa', 'nilai', 'r'));
    \App\Models\PrintLog::create([
        'user_id' => auth()->id(), 'siswa_id' => $siswa->id,
        'tipe' => 'pdf', 'semester' => $r->semester, 'tahun_ajaran' => $r->tahun
    ]);

    return $pdf->download("Rekap-{$siswa->nama}.pdf");
}

public function kirimEmailRekap($id, Request $r)
{
    $siswa = Siswa::with('user')->findOrFail($id);
    $nilai = Nilai::with('indikator')->where([
        ['siswa_id', $id],
        ['semester', $r->semester],
        ['tahun_ajaran', $r->tahun]
    ])->get();

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.rekap', compact('siswa', 'nilai', 'r'));
    $path = storage_path("app/public/Rekap-{$siswa->nama}.pdf");
    \Illuminate\Support\Facades\Storage::put("public/Rekap-{$siswa->nama}.pdf", $pdf->output());

    Mail::to($siswa->user->email)->send(new \App\Mail\LaporanNilaiMail($siswa, $r->semester, $r->tahun, $path));

    \App\Models\PrintLog::create([
        'user_id' => auth()->id(), 'siswa_id' => $siswa->id,
        'tipe' => 'email', 'semester' => $r->semester, 'tahun_ajaran' => $r->tahun
    ]);

    return response()->json(['message' => 'Email laporan berhasil dikirim']);
}
