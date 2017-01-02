<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignersModel extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'users_designers';
  public $timestamps = true;
  
  public function users() {
     
      return $this->hasOne( 'App\Models\UsersModel', 'id', 'users' );
  }
}
