<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    use HasFactory;

    protected $fillable = ['operacao', 'natureza_operacao', 'modelo', 'finalidade', 'ambiente', 'pedido_id'];

    
}
