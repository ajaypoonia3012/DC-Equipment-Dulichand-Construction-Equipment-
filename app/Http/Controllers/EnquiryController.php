<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'location' => 'nullable|string|max:255',
            'inquiry_type' => 'required|string|in:equipment,chemicals,repair_service,rental,general',
            'product_or_service_interest' => 'nullable|string|max:255',
            'message' => 'required|string|min:10|max:3000',
        ]);

        $enquiry = new Enquiry($validated);
        $enquiry->ip_address = $request->ip();
        $enquiry->status = 'new';
        $enquiry->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your quotation request has been received. Our Jaipur technical engineering desk (+91 86969 62600) will contact you shortly.',
                'enquiry_id' => $enquiry->id,
            ]);
        }

        return redirect()->back()->with('success', 'Thank you! Your quotation request has been received. Our Jaipur technical desk will contact you promptly.');
    }
}
