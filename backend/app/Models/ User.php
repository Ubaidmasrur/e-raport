class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}

