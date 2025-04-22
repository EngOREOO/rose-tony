<?php

namespace App\Http\Controllers;

use App\Models\ContactQuestion;

use Illuminate\Http\Request;

class ContactQuestionController extends Controller
{
    public function create()
    {
        return view('contact-question');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        ContactQuestion::create($data);

        return back()->with('success', 'تم إرسال سؤالك بنجاح، سنقوم بالرد عليك قريباً 👌');
    }
}
