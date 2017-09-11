<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  /*
* Get the teachers associated with the given tag.
* @return \Illuminate\Database\Eloquent\Relations\BelogsToMany
*/
public function users()
{
  return $this->belongsToMany('App\User','subject_user');
}

public function classes()
  {
    return $this->belongsTo('App\Classes');
  }


}
