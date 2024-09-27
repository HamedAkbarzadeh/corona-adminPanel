<?php

namespace App\Http\Controllers\GD;

use App\Services\GD\GD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GDController extends Controller
{
    function generateImage()
    {

        GD::image()->setBG('white')->setText('No Photo', 'black')->jpg();
    }
}
