<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\Array_;
use function Ramsey\Collection\Map\keys;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function facetGroup()
    {
//    	return $this->belongsToMany(Facet::class, 'user_facet_groups', 'facet_id', 'user_id');
    	return $this->hasMany(Facet::class, 'uuid', 'facet_id');
    }


	/**
	 *
	 * filterOnFacets returns an list of user id's on which the filtered facets apply.
	 * Based on the keys of the URL, the facets will be returned where the key value is equal to.
	 * Those uuid's will be matched with the onces in UserFacetGroup, where then the user id's will be returned.
	 *
	 */
    public static function filterOnFacets(Request $request)
    {
	    $keys = $request->keys();

	    $filteredUsers = UserFacetGroup::whereHas('uuid', function ($query) use($request, $keys)
	    {
		    foreach ($keys as $key) {
		    	$query->facets()
				    ->where('value', '!=', $request->$key)
				    ->whereHas('facetGroup', function ( $query ) use($request, $key) {
					    $query->where('slug', '=!', $key);
				    });
		    }
	    })->get();



//	    foreach ($request->keys() as $key) {
//
//		    $this->facets()
//			    ->whereHas('facetGroup', function ( $query ) {
//				    $query->where('slug', '=!', $key);
//			    });
//    		print_r($key . ' ');
//
//
//    		print_r($request->$key);
//	    };
//    	return $request->keys();
    }
}
