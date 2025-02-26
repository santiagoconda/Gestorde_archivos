<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Models;

class archivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = rol::all();
        return view('welcome')->compact('roles');
    }


}
