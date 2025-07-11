namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $fillable = ['tahun', 'is_active'];

    // Hanya satu tahun ajaran yang aktif
    public static function setActive($id)
    {
        self::query()->update(['is_active' => false]);
        self::find($id)->update(['is_active' => true]);
    }
}
