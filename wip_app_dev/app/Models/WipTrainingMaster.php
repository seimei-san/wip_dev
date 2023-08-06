<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WipTrainingMaster extends Model
{
    public $increment = false;
    protected $keyType = "integer";
    protected $primaryKey = "training_id";
    use HasFactory;
}
