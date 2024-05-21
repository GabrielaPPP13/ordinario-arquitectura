<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function store($request) {
        $responsable = Responsable::create($request->all());
        return response()->json($responsable);
    }
}
