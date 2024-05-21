<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    // Agrega la propiedad fillable para permitir la asignación masiva de atributos
    protected $fillable = ['status'];

    public static function store($request) {
        $status = Status::create($request->all());
        return response()->json($status);
    }
}
