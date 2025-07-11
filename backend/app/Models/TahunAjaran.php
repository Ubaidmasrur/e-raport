namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $fillable = ['tahun', 'is_active'];

    public static function setActive($id)
    {
        self::query()->update(['is_active' => false]);
        self::findOrFail($id)->update(['is_active' => true]);
    }
}
