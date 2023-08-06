<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WipHoliday extends Model
{
    public $increment = false;
    protected $keyType = "date";
    protected $primaryKey = "wip_holiday";
    use HasFactory;
}
