<?php

namespace Webkul\Admin\Http\Controllers\Customers;

use Illuminate\Http\Request;
use Webkul\Admin\DataGrids\Customers\EnquiryDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Customer\Models\ContactEnquiryProxy;

class EnquiryController extends Controller
{
    /**
     * Display a listing of customer enquiries.
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(EnquiryDataGrid::class)->toJson();
        }

        return view('admin::customers.enquiries.index');
    }

    /**
     * Display the specified enquiry.
     */
    public function view($id)
    {
        $enquiry = ContactEnquiryProxy::modelClass()::findOrFail($id);

        return view('admin::customers.enquiries.view', compact('enquiry'));
    }

    /**
     * Update the specified enquiry status and internal confidential notes.
     */
    public function update(Request $request, $id)
    {
        $enquiry = ContactEnquiryProxy::modelClass()::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:new,in_progress,resolved,closed',
            'internal_notes' => 'nullable|string',
        ]);

        $enquiry->update($validated);

        session()->flash('success', 'Enquiry status and internal notes updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified enquiry.
     */
    public function destroy($id)
    {
        $enquiry = ContactEnquiryProxy::modelClass()::findOrFail($id);
        $enquiry->delete();

        return response()->json(['message' => 'Enquiry deleted successfully.']);
    }
}
