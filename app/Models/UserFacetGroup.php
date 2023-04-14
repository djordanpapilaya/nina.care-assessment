<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserFacetGroup extends Model
{
    use HasFactory;

	protected $fillable = [
		'uuid',
		'user_id',
		'facet_id',
	];

	public function user(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'users');
	}

	public function facets(): BelongsToMany
	{
		return $this->belongsToMany(Facet::class, 'facets');
	}
}
