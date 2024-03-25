<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nome', 'nomeUtilizador', 'email', 'password', 'morada', 'foto', 'ativo', 'tipoUtilizador'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // relacao com multa
    public function multa() {
        // usamos hasMany quando e um para muitos
        return $this->hasMany(multa::class);   
    }

    public function livro() {
        // usamos belongsToMany quando temos muitos para muitos
        return $this->belongsToMany(livro::class, 'requisicoes', 'idUtilizador','idLivro');
    }
}
