class UpdateNilaiRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nilai'        => 'sometimes|integer|min:0|max:100',
            'komentar'     => 'nullable|string',
            'semester'     => 'sometimes|string',
            'tahun_ajaran' => 'sometimes|string',
        ];
    }
}
