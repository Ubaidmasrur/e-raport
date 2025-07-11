namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Indikator;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        return Nilai::with(['siswa', 'indikator'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'     => 'required|exists:siswas,id',
            'indikator_id' => 'required|exists:indikators,id',
            'semester'     => 'required',
            'tahun_ajaran' => 'required',
            'nilai'        => 'required|integer|min:0|max:100',
            'komentar'     => 'nullable'
        ]);

        $nilai = Nilai::create($request->all());
        return response()->json($nilai, 201);
    }

    public function show($id)
    {
        return Nilai::with(['siswa', 'indikator'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->only('nilai', 'komentar', 'semester', 'tahun_ajaran'));
        return response()->json($nilai);
    }

    public function destroy($id)
    {
        Nilai::destroy($id);
        return response()->json(['message' => 'Nilai dihapus']);
    }
}
