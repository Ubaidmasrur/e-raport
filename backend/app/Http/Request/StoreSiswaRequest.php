namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'    => 'required|string|max:100',
            'kelas'   => 'required|string|max:10',
            'user_id' => 'required|exists:users,id'
        ];
    }
}
