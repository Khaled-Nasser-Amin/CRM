<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserProfileController extends Controller
{

    public function show(Request $request)
    {
        return view('Profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
