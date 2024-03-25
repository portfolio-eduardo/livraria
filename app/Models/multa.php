<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multa extends Model
{
    use HasFactory;
    protected $fillable = ['dataEmissao', 'valor', 'pago', 'idUtilizador'];

    // relacao com o utilizador multado
    public function utilizador() {
        return $this->belongsTo(User::class);
    }
}
