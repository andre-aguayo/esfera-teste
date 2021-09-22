<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'sobrenome',
        'empresa_id',
        'email',
        'telefone'
    ];

    /**
     * Empresa ao qual o funcitonario pertence
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
