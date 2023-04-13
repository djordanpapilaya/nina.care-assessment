<?php

namespace App\Http\Controllers;

use App\Models\FacetGroup;
use Illuminate\Http\Request;

class FacetGroupController extends Controller
{
	public function getAll()
	{
		$users = FacetGroup::all();

		return $users;
	}
}
