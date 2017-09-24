<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\NewAdmissionRequest;
use App\Repositories\AdmissionRepository;
use App\Http\Controllers\Controller;
use App\Storage\DataBag;
use Illuminate\Support\Facades\Log;

class AdmissionController extends Controller
{

    /**
     * Add new admission
     *
     * @param NewAdmissionRequest $request
     * @param AdmissionRepository $repository
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NewAdmissionRequest $request, AdmissionRepository $repository)
    {
        try {
            $user = auth()->user()->company;
            $admissionArray = $request->get('admission');

            $data = new DataBag($admissionArray);
            $admission = $repository->createAdmission($data);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
        $message = trans('app.success_message');
        $admission->load(['student','contact']);
        return response()->json(['admission' => $admission, 'message' => $message], 201);
    }
}
