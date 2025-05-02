<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ContainerController extends Controller
{
    public function getTypes()
    {
        $typeCounts = Service::select('name')
            ->groupBy('name')
            ->selectRaw('name, COUNT(*) as count')
            ->get();

        return response()->json([
            'names' => $typeCounts
        ]);
    }
}
