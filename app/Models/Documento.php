<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'DOC_DOCUMENTO';
    protected $primaryKey = 'DOC_ID';
    protected $fillable = [
        'DOC_ID',
        'DOC_NOMBRE',
        'DOC_CODIGO',
        'DOC_CONTENIDO',
        'DOC_ID_TIPO',
        'DOC_ID_PROCESO',
    ];
    use HasFactory;

    public function tipo()
    {
        return $this->belongsTo(\App\Models\TipoDoc::class, 'DOC_ID_TIPO');
    }

    public function proceso()
    {
        return $this->belongsTo(\App\Models\ProProceso::class, 'DOC_ID_PROCESO');
    }
}
