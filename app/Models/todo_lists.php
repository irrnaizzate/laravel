<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo_lists extends Model
{
    use HasFactory;
    protected $fillable = ['body','is_complete','user_id'];
}
