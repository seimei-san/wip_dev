<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use PhpParser\Node\Stmt\Else_;

class WipMessage extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'wip_msgs';

    protected $fillable = [
        'id',
        'domain_id',
        'user_id',
        'chat_sys',
        'display_name',
        'chat_user_id',
        'conversation_id',
        'message_id',
        'date',
        'time',
        'message'
    ];
}
