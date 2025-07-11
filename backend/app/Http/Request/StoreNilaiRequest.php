class StoreNilaiRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'siswa_id'     => 'required|exists:siswas,id',
            'indikator_id' => 'required|exists:indikators,id',
            'semester'     => 'required|string',
            'tahun_ajaran' => 'required|string',
            'nilai'        => 'required|integer|min:0|max:100',
            'komentar'     => 'nullable|string'
        ];
    }
}
