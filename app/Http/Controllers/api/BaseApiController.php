<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    public function returnErrorMessage($error){

        Log::error($error->getMessage() , ['line' => $error->getLine(), 'file' => $error->getFile(), 'time' => Carbon::now()->format('Y-m-d H:i:s')]);
           
        return response()->json([
            'error' => true,
            'message' => 'Internal Server Error',
        ], 500);

    }

    public function returnValidatorMessage($validateRequest){
        return response()->json([
            'error' => true,
            'message' => $validateRequest->errors()->first(),
        ], 400);
    }
}
