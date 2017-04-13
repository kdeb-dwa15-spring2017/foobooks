<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lesson extends Model
{
    //
    public function videos()
	{
	    # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
	    return $this->belongsToMany('App\Video')->withTimestamps();
	}

	public function user() {
		# Lesson belongs to User
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\User');
	}
}
