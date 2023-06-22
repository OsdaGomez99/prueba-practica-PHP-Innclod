<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'DOC_DOCUMENTO';
    protected $primaryKey = 'DOC_ID';
    use HasFactory;
}
