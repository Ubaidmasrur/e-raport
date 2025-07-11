namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return Siswa::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'kelas'   => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $siswa = Siswa::create($request->all());
        return response()->json($siswa, 201);
    }

    public function show($id)
    {
        return Siswa::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->only('nama', 'kelas', 'user_id'));
        return response()->json($siswa);
    }

    public function destroy($id)
    {
        Siswa::destroy($id);
        return response()->json(['message' => 'Siswa dihapus']);
    }
}
