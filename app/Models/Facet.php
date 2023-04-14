<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facet extends Model
{
    use HasFactory;

	protected $primaryKey = 'uuid';
	protected $table = 'facet';

	protected $fillable = [
		'uuid',
		'group_id',
		'facet_slug',
		'value',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	public function facetGroup(): BelongsTo
	{
		return $this->belongsTo(FacetGroup::class);
	}

	public function users(): HasMany
	{
		return $this->hasMany(User::class, 'facet_id', 'uuid');
	}
}
