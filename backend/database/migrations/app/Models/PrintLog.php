namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintLog extends Model
{
    protected $fillable = ['user_id', 'siswa_id', 'tipe', 'semester', 'tahun_ajaran', 'waktu'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }
}
