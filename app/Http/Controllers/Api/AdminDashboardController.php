<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // API üçün statistika məlumatları
        $servicesCount = Service::count();
        $usersCount = User::count();
        $userServicesCount = UserService::count();
        $adminsCount = User::where('is_admin', true)->count();
        $domainsCount = Domain::count();

        return response()->json([
            'servicesCount' => $servicesCount,
            'usersCount' => $usersCount,
            'userServicesCount' => $userServicesCount,
            'adminsCount' => $adminsCount,
            'domainsCount' => $domainsCount,
        ]);
    }
}
