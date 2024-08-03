<?php

namespace Modules\JiraBoard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyTask extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeGetTaskState( $query )
    {
        return DB::table('task_state')->select('state_name')->where('state_status', '=', 'active');
    }
}
