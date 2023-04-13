<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFacetGroup extends Model
{
    use HasFactory;

	protected $fillable = [
		'uuid',
		'user_id',
		'facet_group_id',
	];
}
