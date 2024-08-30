<?php

namespace App\Http\Controllers;

use App\Models\SuccessfulEmails;
use Illuminate\Http\Request;

class SuccessfulEmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = SuccessfulEmails::all();
        return response()->json(["data" => $result]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $email_request = $request->only((new SuccessfulEmails)->getFillable());

        $email_request['raw_text'] = parse_email($email_request['email']);
        
        $result = SuccessfulEmails::create($email_request);
        return response()->json(["data" => $result]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuccessfulEmails $successfulEmails, $id)
    {
        $successfulEmail = SuccessfulEmails::findOrFail($id);
        return response()->json(["data" => $successfulEmail]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuccessfulEmails $successfulEmails, $id)
    {
        $email_request = new SuccessfulEmails($request->only((new SuccessfulEmails)->getFillable()));

        
        // Check if email field has changed, then strip html tags
        if($email_request->isDirty('email')){
            $email_request['raw_text'] = parse_email($email_request['email']);
        }
        $result = SuccessfulEmails::whereId($id)->update($email_request->toArray());
        return response()->json(["message" => $result ? 'Record updated successfully' : 'Record update failed - missing or error occurred']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuccessfulEmails $successfulEmails, $id)
    {
        $successfulEmail = SuccessfulEmails::findOrFail($id);
        $successfulEmail->delete();

        return response()->json(['message' => 'Record soft deleted successfully.']);
    }
}
