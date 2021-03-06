<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['name','todo_id'];

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
