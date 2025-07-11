public function index(Request $request)
{
    $query = Siswa::with('user');

    if ($request->search) {
        $query->where('nama', 'like', "%$request->search%")
              ->orWhere('kelas', 'like', "%$request->search%");
    }

    if ($request->kelas) {
        $query->where('kelas', $request->kelas);
    }

    return $query->get();
}
