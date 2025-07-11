class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'indikator_id', 'semester', 'tahun_ajaran', 'nilai', 'komentar'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
