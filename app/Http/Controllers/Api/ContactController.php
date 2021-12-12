<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $social_medias = SocialMedia::all();
        return ResponseFormatter::success([
            'contacts' => $contacts,
            'social_medias' => $social_medias
        ], 'Data Product Berhasil Diambil');
    }
}
