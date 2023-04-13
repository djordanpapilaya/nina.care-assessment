<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FacetGroup extends Model
{
    use HasFactory;

	protected $primaryKey = 'uuid';
	protected $table = 'facet_group';

	protected $fillable = [
		'uuid',
		'facet_slug',
		'type',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	public function facet(): HasMany
	{
		return $this->hasMany(Facet::class);
	}
}
