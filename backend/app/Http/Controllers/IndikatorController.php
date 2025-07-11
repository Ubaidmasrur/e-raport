namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    public function index()
    {
        return Indikator::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'domain'=> 'required|in:kognitif,afektif,psikomotorik'
        ]);

        $indikator = Indikator::create($request->all());
        return response()->json($indikator, 201);
    }

    public function show($id)
    {
        return Indikator::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $indikator = Indikator::findOrFail($id);
        $indikator->update($request->only('nama', 'domain'));
        return response()->json($indikator);
    }

    public function destroy($id)
    {
        Indikator::destroy($id);
        return response()->json(['message' => 'Indikator dihapus']);
    }
}
