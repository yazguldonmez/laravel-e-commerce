<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function contactStore(ContactRequest $request)
    {
        $data = $request->all();
        $data['ip'] = request()->ip(); //ip'yi request ile almıyor.

        Contact::create($data);

        return back()->with('message', 'Your message has been sent');
    }
}
