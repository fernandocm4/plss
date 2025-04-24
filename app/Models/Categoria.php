<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    public $timestamps = true;

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}
