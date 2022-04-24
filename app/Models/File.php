<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function owner()
    {
        return $this->morphTo();
    }
}
