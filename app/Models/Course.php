<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'date' => 'datetime:d-m-Y'
    ];

    public function student(){
        return $this->belongsTo(Students::class, 'id');
    }
}
