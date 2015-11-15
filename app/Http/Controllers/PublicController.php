<?php
/**
 * Created by PhpStorm.
 * Written by Paul Hayter
 * Created for Counselling Ltd
 * Using Laravel framework version 5
 * Date: 04/11/2015
 * Time: 12:24
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PublicController extends Controller {

    /**
     * Display the home page.
     *
     * @return Response
     */
    public function home()
    {
        return view('public.home');
    }

}

