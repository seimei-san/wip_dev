<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WipTaskSystemIntegration extends Model
{
    public $increment = false;
    public $timestamps = false;
    protected $keyType = "string";
    protected $primaryKey = "task_sys_integ";
    use HasFactory;
}
