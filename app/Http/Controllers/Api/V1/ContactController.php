<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function contact(Request $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Message Sent Successfully.',
        ]);
    }
}
