<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProProceso extends Model
{
    protected $table = 'PRO_PROCESO';
    protected $primaryKey = 'PRO_ID';
    protected $fillable = [
        'PRO_ID',
        'PRO_NOMBRE',
        'PRO_PREFIJO',
    ];
    use HasFactory;

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'DOC_ID_PROCESO');
    }
}
