<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Xidmətlər səhifəsini göstərmək üçün metod
    public function index()
    {
        $services = Service::all(); // bütün xidmətlər
        $serviceCount = $services->count(); // sayını al

        return view('admin.services.index', compact('services', 'serviceCount'));
    }

    // Yeni xidmət əlavə etmək üçün form göstərmək
    public function create()
    {
        return view('admin.services.create');
    }

    // Xidmət məlumatlarını yadda saxlamaq üçün metod
    public function store(Request $request)
    {
        // store metodunda
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Service::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);


        return redirect()->route('admin.services.index'); // Xidmətlər səhifəsinə geri yönləndir
    }

    // Xidməti redaktə etmək üçün form göstərmək
    public function edit($id)
    {
        $model = Service::findOrFail($id); // Servisi bazadan tapırıq

        return view('admin.services.edit', compact('model'));
    }


    // Xidməti yeniləmək üçün metod
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service->update($request->all()); // Mövcud xidməti yenilə

        return redirect()->route('admin.services.index'); // Xidmətlər səhifəsinə yönləndir
    }

    // Xidməti silmək üçün metod
    public function destroy(Service $service)
    {
        $service->delete(); // Xidməti sil

        return redirect()->route('admin.services.index'); // Xidmətlər səhifəsinə geri yönləndir
    }

    public function toggleStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->status = $service->status == 1 ? 0 : 1;
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Status uğurla dəyişdirildi.');
    }

}
