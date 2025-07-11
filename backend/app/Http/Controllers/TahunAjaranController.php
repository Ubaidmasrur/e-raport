namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        return TahunAjaran::all();
    }

    public function store(Request $request)
    {
        $request->validate(['tahun' => 'required|string']);
        return TahunAjaran::create($request->only('tahun'));
    }

    public function show($id)
    {
        return TahunAjaran::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $tahun = TahunAjaran::findOrFail($id);
        $tahun->update($request->only('tahun'));
        return $tahun;
    }

    public function destroy($id)
    {
        TahunAjaran::destroy($id);
        return response()->json(['message' => 'Tahun ajaran dihapus']);
    }

    public function setAktif($id)
    {
        TahunAjaran::setActive($id);
        return response()->json(['message' => 'Tahun ajaran aktif diperbarui']);
    }

    public function aktif()
    {
        return TahunAjaran::where('is_active', true)->first();
    }
}
