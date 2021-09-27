<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function listSports(){
        return response()->json(Sports::all());
    }
}
