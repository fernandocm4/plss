<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Situacao extends Model
{
    use HasFactory;

    protected $table = 'situacoes';
    public $timestamps = true;

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}
