<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Fetch all FAQs from the database
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }
    public function create()
    {
        // Show the form to create a new FAQ
        return view('admin.faqs.create');
    }
    public function store(Request $request)
    {
        // Validate and store the new FAQ
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }
    public function edit($id)
    {
        // Show the form to edit an existing FAQ
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.edit', compact('faq'));
    }
    public function update(Request $request, $id)
    {
        // Validate and update the existing FAQ
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }
    public function destroy($id) 
    {
        // Delete the FAQ
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
    public function toggleStatus($id)
    {
        // Toggle the status of the FAQ
        $faq = Faq::findOrFail($id);
        $faq->is_active = !$faq->is_active;
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ status updated successfully.');
    }
}
