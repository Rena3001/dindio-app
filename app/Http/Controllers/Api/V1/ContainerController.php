<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    // GET /api/v1/Container/type
    public function getTypes()
    {
        // Nümunə tip siyahısı
        return response()->json([
            'types' => ['nginx', 'mysql', 'redis', 'php-fpm']
        ]);
    }

    // GET /api/v1/Container
    public function index()
    {
        // Bütün container-ların siyahısı (demo cavab)
        return response()->json([
            ['id' => 1, 'name' => 'Nginx', 'status' => 'running'],
            ['id' => 2, 'name' => 'Redis', 'status' => 'stopped'],
        ]);
    }

    // GET /api/v1/Container/{id}
    public function show($id)
    {
        // Bir container detalları (mock)
        return response()->json([
            'id' => $id,
            'name' => 'Nginx',
            'status' => 'running',
            'ports' => [80, 443],
            'created_at' => now()
        ]);
    }

    // GET /api/v1/Container/{id}/log
    public function log($id)
    {
        return response()->json([
            'id' => $id,
            'logs' => [
                '[INFO] Container booted',
                '[INFO] Listening on port 80',
                '[INFO] Health check passed'
            ]
        ]);
    }

    // POST /api/v1/Container/operation/{id}
    public function operateSingle($id, Request $request)
    {
        $mode = $request->input('mode'); // e.g., start, stop, restart

        return response()->json([
            'id' => $id,
            'mode' => $mode,
            'message' => "Operation '$mode' applied to container $id"
        ]);
    }

    // POST /api/v1/Container/operation
    public function operateBulk(Request $request)
    {
        $ids = $request->input('ids'); // [1,2,3]
        $mode = $request->input('mode');

        return response()->json([
            'ids' => $ids,
            'mode' => $mode,
            'message' => "Bulk operation '$mode' applied to containers",
        ]);
    }

    // GET /api/v1/Container/active
    public function getActive()
    {
        return response()->json([
            'containers' => [
                ['id' => 1, 'name' => 'nginx', 'active' => true],
                ['id' => 2, 'name' => 'php-fpm', 'active' => true],
            ],
            'applications' => [
                ['id' => 10, 'name' => 'my-app', 'active' => true],
            ]
        ]);
    }
}
