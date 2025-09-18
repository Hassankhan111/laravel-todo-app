<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class todo extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'due_date'
    ];

    protected $primaryKey = 'todo_id';
    protected $Casts = [
        'due_date' => 'date',
    ];

    public function user(){
        return $this->belongsTo('User::class','user_id','user_id');
    }
}
