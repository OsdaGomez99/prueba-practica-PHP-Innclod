<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProProceso extends Model
{
    protected $table = 'PRO_PROCESO';
    protected $primaryKey = 'PRO_ID';
    protected $fillable = [
        'TIP_ID',
        'TIP_NOMBRE',
        'TIP_PREFIJO',
    ];
    use HasFactory;
}
