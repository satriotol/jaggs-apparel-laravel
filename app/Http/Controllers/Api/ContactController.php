<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return ResponseFormatter::success([
            'contacts' => $contacts,
        ], 'Data Product Berhasil Diambil');
    }
}
