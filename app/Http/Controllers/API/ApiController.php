<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function recentrecord()
    {
        $recentRecord = Form::latest()->first();

        return response()->json($recentRecord);

    }
}

