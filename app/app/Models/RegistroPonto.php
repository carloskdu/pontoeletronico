<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroPonto extends Model
{
    protected $table = 'registros_ponto';

    protected $fillable = [
        'usuario_id',
        'tipo',
        'registrado_em',
    ];

    protected $casts = [
        'registrado_em' => 'datetime', 
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public $timestamps = true;
}
