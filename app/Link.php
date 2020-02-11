<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = "links";

    protected $fillable = ['slug','url','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'usr_id','id');
    }

    public static function createlink($request){
        $count = auth()->user()->link()->count()+1;
        $user_id = auth()->id();
        $ShortLink = $user_id.'$'.$count;
        $url = $request->url;

        return parent::create([
            'user_id' => $user_id,
            'slug' => $ShortLink,
            'url' => $url,
        ]);
    }

    public function getstatus()
    {
        if ($this->Condition == 0){
            return 'Inactive';
        }else{
            return 'active';
        }
    }
}
