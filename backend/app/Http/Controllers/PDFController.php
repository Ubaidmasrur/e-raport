namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TahunAjaran;

class PDFController extends Controller
{
    public function cetakRekap($id, Request $request)
    {
        $semester = $request->semester ?? 'Ganjil';
        $tahun = $request->tahun ?? TahunAjaran::where('is_active', true)->first()?->tahun;

        $siswa = Siswa::with('user')->findOrFa

use App\Mail\LaporanNilaiMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

public function kirimEmailRekap($id, Request $request)
{
    $semester = $request->semester ?? 'Ganjil';
    $tahun = $request->tahun ?? TahunAjaran::where('is_active', true)->first()?->tahun;

    $siswa = Siswa::with('user')->findOrFail($id);
    $nilai = Nilai::with('indikator')
        ->where('siswa_id', $id)
        ->where('semester', $semester)
        ->where('tahun_ajaran', $tahun)
        ->get();

    // Generate PDF dan simpan sementara
    $pdf = Pdf::loadView('pdf.rekap', compact('siswa', 'nilai', 'semester', 'tahun'));
    $filename = "Rekap-Nilai-{$siswa->nama}-{$semester}-{$tahun}.pdf";
    $pdfPath = storage_path("app/public/{$filename}");
    Storage::put("public/{$filename}", $pdf->output());

    // Kirim ke email wali murid
    $wali = $siswa->user;
    Mail::to($wali->email)->send(new LaporanNilaiMail($siswa, $semester, $tahun, $pdfPath));

    return response()->json(['message' => 'Laporan berhasil dikirim ke wali murid.']);
}

use App\Models\PrintLog;

PrintLog::create([
    'user_id' => auth()->id(),
    'siswa_id' => $siswa->id,
    'tipe' => 'pdf',
    'semester' => $semester,
    'tahun_ajaran' => $tahun,
    'waktu' => now()
]);
