<?php

namespace App\Http\Requests;

class UserRequest
{
    public function storeRules()
    {
        return [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required',
        ];
    }

    public function updateRules()
    {
        return [
            'id' => 'required',
            'name' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required',
        ];
    }

    public function deleteRules()
    {
        return [
            'id' => 'required',
        ];
    }

    public function messages()
    {
        return __('validation');
    }
}