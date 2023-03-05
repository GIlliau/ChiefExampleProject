<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class BuyCowRequest extends FormRequest
{
    public function authorize()
    {
        return auth('web')->check();
    }
}
