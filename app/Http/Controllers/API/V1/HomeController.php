<?php

namespace App\Http\Controllers\API\V1;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;


class HomeController extends Controller
{
    public function index()
    {
        $user = JWTAuth::parseToken()->toUser();
        $academicYear = AcademicYear::orderBy('created_at', 'desc')->first();
        $user->load(['address','role','facilities','facilities.users','facilities.tuitionFees','facilities.scolarPrograms','facilities.scolarPrograms', 'facilities.scolarYears', 'facilities.organisation', 'facilities.admissions','facilities.admissions.student', 'facilities.admissionRequirements']);

        return response()->json(['user' => $user, 'academicYear' => $academicYear ]);
    }
}
