<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
	protected $fillable=[
        'title', 'description', 'category_id', 'post_type', 'students_max', 'price', 'started_at', 'ended_at', 'status', 
    ];
    //'started_at', 'ended_at', A REMETTRE UNE FOIS PBLM DATE REGLE !!!

	 public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function picture(){
    	return $this->hasOne(Picture::class);
    }

    public function scopePublished($query){
        return $query->where('status', 'published');
    }

    public function getStartedAtAttribute($value)
    {
            // $post->started_at    ce format c'est pour l'édition uniquement on va essayé de formater ici
        return   explode('+', Carbon::parse($value)->toW3cString())[0] ?? Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getEndedAtAttribute($value)
    {
        return   explode('+', Carbon::parse($value)->toW3cString())[0] ?? Carbon::parse($value)->format('d/m/Y H:i:s');
    }
  
  public function getStartedAtFrAttribute($value)
    {
        //dump($this->attributes['started_at']);
            // dans les vues cotés front $post->started_at_fr  un autre format 
        return Carbon::parse($this->attributes['started_at'])->format('d/m/Y H:i:s');
    }

    public function getEndedAtFrAttribute($value)
    { 
        return Carbon::parse($this->attributes['ended_at'])->format('d/m/Y H:i:s');
    }

}
