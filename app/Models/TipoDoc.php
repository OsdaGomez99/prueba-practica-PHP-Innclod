<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    protected $table = 'TIP_TIPO_DOC';
    protected $primaryKey = 'TIP_ID';
    protected $fillable = [
        'TIP_ID',
        'TIP_NOMBRE',
        'TIP_PREFIJO',
    ];
    use HasFactory;
}
