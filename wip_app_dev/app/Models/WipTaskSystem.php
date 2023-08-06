<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WipTaskSystem extends Model
{

    public $increment = false;
    public $timestamps = false;
    protected $keyType = "string";
    protected $primaryKey = "task_sys";
    use HasFactory;
}
