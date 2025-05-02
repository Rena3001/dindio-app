<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Domain;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
        {

            $servicesCount = Service::count();
            $usersCount = User::count();
            $userServicesCount = UserService::count();
            $adminsCount = User::where('is_admin', true)->count();
            $appsCount = App::count(); // əgər App modelin varsa
            $domainsCount = Domain::count(); // əgər Domain modelin varsa
        
            $serviceReportData = []; // və ya lazım olan real data
        
            return view('admin.dashboard', compact(
                'servicesCount',
                'usersCount',
                'userServicesCount',
                'adminsCount',
                'appsCount',
                'domainsCount',
                'serviceReportData'
            ));

        }


    public function totalPayments()
    {
        $totalPayments = Payment::sum('amount');
        return view('admin.payments.total', compact('totalPayments'));
    }

    public function paidUsers()
    {
        $paidUsersCount = User::whereHas('payments')->count();
        return view('admin.payments.users', compact('paidUsersCount'));
    }

    // Əgər detal səhifəsi lazım olsa
    // public function paidUsersDetail()
    // {
    //     $user = User::find(1);
    //     $payments = $user->payments;
    //     return view('admin.payments.user-detail', compact('user', 'payments'));
    // }

    public function stats()
    {
        $stats = [
            'servicesCount' => Service::count(),
            'usersCount' => User::count(),
            'userServicesCount' => UserService::count(),
            'appsCount' => App::count(),
            'domainsCount' => Domain::count(),
            'adminsCount' => User::where('is_admin', true)->count(),
        ];

        return response()->json($stats);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $response = Http::post('http://your-app-url/api/v1/Account/login', $credentials);

        if ($response->successful()) {
            $data = $response->json();
            session(['api_token' => $data['token']]);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed');
        }
    }

    public function getAdminData()
    {
        $token = session('api_token');

        if (!$token) {
            return redirect()->route('admin.login');
        }

        $response = Http::withToken($token)->get('http://your-app-url/api/v1/Account/profile');

        if ($response->successful()) {
            $userData = $response->json();
            return view('admin.dashboard', compact('userData'));
        } else {
            return redirect()->back()->with('error', 'Failed to retrieve data');
        }
    }
}
