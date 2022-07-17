<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponderTrait
{
    /**
     * @param array $array
     * @return JsonResponse
     */
    public static function arrayResponse(array $array): JsonResponse
    {
        return response()->json(['data' => $array]);
    }

}
