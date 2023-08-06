<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WipTrainingMaterial extends Model
{
    public $increment = false;
    protected $keyType = "integer";
    protected $primaryKey = "training_material_id";
    use HasFactory;
}
