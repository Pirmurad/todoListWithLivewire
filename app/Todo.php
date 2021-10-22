<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','description', 'completed','user_id'];

//    public function getRouteKeyName()
//    {
//        return 'title';
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function steps()
    {
        return $this->hasmany(Step::class);
    }
}
