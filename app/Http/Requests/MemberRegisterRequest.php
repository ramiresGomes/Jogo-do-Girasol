<?php

namespace Sunflower\Http\Requests;

use Sunflower\Http\Requests\Request;

class MemberRegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'Email',
            'password' => 'Senha'
        ];
    }
}
