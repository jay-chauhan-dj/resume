<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ContactController extends BaseController
{
    public function contact(Request $request)
    {
        $name = $request->input("name");
        $email = $request->input("email");
        $mobileNumber = $request->input("contact-phone");
        $subject = $request->input("subject");
        $message = $request->input("message");

        $whatsappResponse = Http::withHeaders([
            'authorization' => 'Bearer 76ae62e5e0587463000ec1613174c82d39b6b34303e446e013547baa47011cb99308692840de5b06e3444c777fa767419f5287665b9869b49dbd87379b854a3b',
            'Accept' => 'application/json',
        ])->post('https://api.dj-jay.in/v1/whatsapp/send', [
            'whatsappNumber' => $mobileNumber,
            'name' => $name,
            'templateName' => "quick_reply",
            'templateData' => [$name, $subject],
        ]);
        Log::channel("whatsapp")->info("Fallback Details: " . json_encode($whatsappResponse));

        $whatsappResponse = Http::withHeaders([
            'authorization' => 'Bearer 76ae62e5e0587463000ec1613174c82d39b6b34303e446e013547baa47011cb99308692840de5b06e3444c777fa767419f5287665b9869b49dbd87379b854a3b',
            'Accept' => 'application/json',
        ])->post('https://api.dj-jay.in/v1/email/sendQuickReply', [
            'name' => $name,
            'to' => $email,
        ]);

        $insert = array(
            "name" => $name,
            "email" => $email,
            "contactNumber" => $mobileNumber,
            "subject" => $subject,
            "message" => $message,
            "mailSent" => "1"
        );
        Contact::insert($insert);
        return response()->json(["status" => "200"]);
    }
}
