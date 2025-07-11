class UpdateIndikatorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama'   => 'sometimes|string|max:100',
            'domain' => 'sometimes|in:kognitif,afektif,psikomotorik'
        ];
    }
}
