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
