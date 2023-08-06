<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WipReportInterval extends Model
{
    public $increment = false;
    public $timestamps = false;
    protected $keyType = "string";
    protected $primaryKey = "report_interval";
    use HasFactory;
}
