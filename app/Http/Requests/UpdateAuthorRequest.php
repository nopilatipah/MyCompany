<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends StoreAuthorRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function rules()
    {
        $rules=parent::rules();
        $rules['email']='required|unique:users,email,'.$this->route('akun');
        return $rules;
    }
}
