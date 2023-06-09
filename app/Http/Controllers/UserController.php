<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAll()
    {

    	return UserCollection::collection(User::with('facetGroup')->paginate(50));
//    	$users = User::all();

//    	return $users;
    }

    public function getUserFilteredOnFacets(Request $request)
    {
    	//Deze functie returned een lijst met userID's
		$filteredUsersIds = User::filterOnFacets($request);
		$users = [];

		foreach($filteredUsersIds as $id)
		{
			$user = User::where('id', $id)
				->first();

			array_push($users, $user);
		}

		return $users;
    }

}
