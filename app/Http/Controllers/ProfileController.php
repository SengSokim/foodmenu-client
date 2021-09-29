<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view()
    {
        $response = $this->api_get('portal/auth/profile');
        $data = null;
        if ($response->data) {
             $data = $response->data;
        }

        return ok($data);
    }

    public function update(Request $request)
    {        
        $result = $this->api_post('portal/auth/profile', $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'Profile']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }
}
