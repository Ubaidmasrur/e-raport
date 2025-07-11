namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Ambil rekap nilai lengkap 1 siswa
     */
    public function rekapPerSiswa($id, Request $request)
    {
        $semester = $request->semester ?? 'Ganjil';
        $tahun = $request->tahun ?? now()->year . '/' . (now()->year + 1);

        $nilai = Nilai::with('indikator')
            ->where('siswa_id', $id)
            ->where('semester', $semester)
            ->where('tahun_ajaran', $tahun)
            ->get();

        return response()->json([
            'siswa' => Siswa::with('user')->findOrFail($id
