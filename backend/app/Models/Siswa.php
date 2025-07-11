class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kelas', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
