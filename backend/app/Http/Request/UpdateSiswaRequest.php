class UpdateSiswaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama'    => 'sometimes|string|max:100',
            'kelas'   => 'sometimes|string|max:10',
            'user_id' => 'sometimes|exists:users,id'
        ];
    }
}
