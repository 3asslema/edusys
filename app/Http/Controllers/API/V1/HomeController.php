<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;


class HomeController extends Controller
{
    public function index()
    {
        $user = JWTAuth::parseToken()->toUser();
        $user->load(['address','role','facilities','facilities.users','facilities.tuitionFees','facilities.scolarPrograms','facilities.scolarPrograms', 'facilities.scolarYears', 'facilities.organisation', 'facilities.admissions', 'facilities.admissionRequirements']);

        return response()->json(['user' => $user ]);
    }
}
