class StoreIndikatorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama'   => 'required|string|max:100',
            'domain' => 'required|in:kognitif,afektif,psikomotorik'
        ];
    }
}
