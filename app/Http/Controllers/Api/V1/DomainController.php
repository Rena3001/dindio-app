<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::all();
        return view('admin.domains.index', compact('domains'));
    }
    public function create()
    {
        return view('admin.domains.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'domain_name' => 'required|unique:domains|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Domain::create($request->all());

        return redirect()->route('admin.domains.index')->with('success', 'Domain created successfully.');
    }
    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        return view('admin.domains.edit', compact('domain'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'domain_name' => 'required|max:255|unique:domains,domain_name,' . $id,
            'user_id' => 'required|exists:users,id',
        ]); 

        $domain = Domain::findOrFail($id);
        $domain->update($request->all());

        return redirect()->route('admin.domains.index')->with('success', 'Domain updated successfully.');
    }
    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->route('admin.domains.index')->with('success', 'Domain deleted successfully.');
    }
    public function toggleStatus($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->is_active = !$domain->is_active; // Bu sətri dəyişdik
        $domain->save();

        return redirect()->route('admin.domains.index')->with('success', 'Domain status updated successfully.');
    }

}
