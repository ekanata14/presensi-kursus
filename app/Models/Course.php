<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student(){
        return $this->belongsTo(Students::class, 'id');
    }

    public function scopeFilter($query, Array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('lessons', 'like', '%' . $search . '%')->orWhere('date' , 'like' , '%' . $search .'%');
        });
    }

    // public function getRouteKeyName()   
    // {
    //     return 'id_students';
    // }
}
