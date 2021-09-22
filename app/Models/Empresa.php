<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'logotipo'
    ];

    /**
     * Funcionarios da empresa
     */
    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }
}
