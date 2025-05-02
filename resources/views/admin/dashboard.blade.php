@extends('admin.layout.master')

@section('content')
    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12 col-xxl-6">
                <div class="mb-8">
                    {{-- <h2 class="mb-2">Dashboard</h2> --}}
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
            <canvas id="statsChart" width="400" height="200" style="border: 1px solid black;"></canvas>
            </div>
        </div>

        {{-- Statistic Cards --}}
        <div class="row g-4">
            {{-- Number of services we offer --}}
            <div class="col-md-4 col-xl-3">
                <div class="card shadow-sm rounded-3 p-3 text-center">
                    <h5 class="mb-1">Services</h5>
                    <h2 class="text-primary">{{ $servicesCount ?? '0' }}</h2>
                </div>
            </div>

            {{-- Current number of users --}}
            <div class="col-md-4 col-xl-3">
                <div class="card shadow-sm rounded-3 p-3 text-center">
                    <h5 class="mb-1">Users</h5>
                    <h2 class="text-success">{{ $usersCount ?? '0' }}</h2>
                </div>
            </div>

            {{-- Number of user services --}}
            <div class="col-md-4 col-xl-3">
                <div class="card shadow-sm rounded-3 p-3 text-center">
                    <h5 class="mb-1">User Services</h5>
                    <h2 class="text-warning">{{ $userServicesCount ?? '0' }}</h2>
                </div>
            </div>
            
            {{-- Number of Admins --}}
            <div class="col-md-4 col-xl-3">
                <div class="card shadow-sm rounded-3 p-3 text-center">
                    <h5 class="mb-1">Number of Admins</h5>
                    <h2 class="text-warning">{{ $adminsCount ?? '0' }}</h2>
                </div>
            </div>

            {{-- Number of Apps --}}
            <div class="col-md-4 col-xl-3">
                <div class="card shadow-sm rounded-3 p-3 text-center">
                    <h5 class="mb-1">Number of Apps</h5>
                    <h2 class="text-danger">{{ $appsCount ?? '0' }}</h2>
                </div>
            </div>

            {{-- Number of added domains --}}
            <div class="col-md-4 col-xl-3">
                <div class="card shadow-sm rounded-3 p-3 text-center">
                    <h5 class="mb-1">Number of Domains</h5>
                    <h2 class="text-info">{{ $domainsCount ?? '0' }}</h2>
                </div>
            </div>
        </div>

        {{-- Service Report Data --}}
        @if(!empty($serviceReportData))
            <div class="mt-4">
                <h3>Service Report</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Reports</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceReportData as $report)
                            <tr>
                                <td>{{ $report['serviceName'] }}</td>
                                <td>{{ $report['reportData'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

@php
    $stats = [
        'servicesCount' => $servicesCount,
        'usersCount' => $usersCount,
        'domainsCount' => $domainsCount,
        'adminsCount' => $adminsCount,
        'userServicesCount' => $userServicesCount,
        'appsCount' => $appsCount,
    ];
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stats = @json($stats);

        const ctx = document.getElementById('statsChart').getContext('2d');
        const statsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Services', 'Users', 'Domains', 'Admins','UserServices', 'Apps'],
                datasets: [{
                    label: 'Dashboard Stats',
                    data: [
                        stats.servicesCount || 0,
                        stats.usersCount || 0,
                        stats.domainsCount || 0,
                        stats.adminsCount || 0,
                        stats.userServicesCount || 0,
                        stats.appsCount || 0,

                    ],
                    backgroundColor: [
                        'rgba(13, 110, 253, 0.7)',
                        'rgba(25, 135, 84, 0.7)',
                        'rgba(255, 193, 7, 0.7)',
                        'rgba(220, 53, 69, 0.7)',
                    ],
                    borderColor: [
                        'rgba(13, 110, 253, 1)',
                        'rgba(25, 135, 84, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(220, 53, 69, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush
