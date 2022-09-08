<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
      protected $fillable = [
        'name',
        'age',
        'sex',
        'memo'
    ];
    //名前検索
    public function scopeNameFilter($query, string $name = null){
      if(!$name){
        return $query;
      }

      return $query->where('name', 'like', '%'.$name.'%');
    }
}
