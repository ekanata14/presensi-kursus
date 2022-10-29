<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function course(){
        return $this->hasMany(Course::class, 'id');
    }

    public function scopeFilter($query, Array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }
}
