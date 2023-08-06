<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WipTrainingRecord extends Model
{
    public $increment = false;
    protected $keyType = "integer";
    protected $primaryKey = "training_record_id";
    use HasFactory;
}
