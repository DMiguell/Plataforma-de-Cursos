<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    public function getRatingAttribute()
    {
        // el if es para en caso de que un curso no tenga calificacion aparesca automaticamente con 5 estrellas
        if($this->reviews_count)
        {
            // round para redondear los decimales, el 1 es el valor de los decimales
            return round($this->reviews->avg('rating'), 1); // avg es para sacar un promedio de las calificaciones
        }
        else
        {
            return 5;
        }

        
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }

    public function sections(){
        return $this->hasMany('App\Models\Section');
    }

    //Relacion uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    public function category(){
        return $this->belongsTo('App\Models\Level');
    }

    public function price(){
        return $this->belongsTo('App\Models\Level');
    }

    //Relacion muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a uno polimorfica

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relacion hasManyThrough
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}