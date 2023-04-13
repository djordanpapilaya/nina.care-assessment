<?php

namespace App\Http\Controllers;

use App\Models\Facet;
use Illuminate\Http\Request;

class FacetController extends Controller
{
	public function getAll()
	{
		$users = Facet::all();

		return $users;
	}
}
