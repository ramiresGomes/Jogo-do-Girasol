<?php

namespace Sunflower\Http\Controllers\Admin\Auth;

use Sunflower\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    use ResetsPasswords;

    protected $linkRequestView = 'admin::auth.passwords.email';

    protected $resetView = 'admin::auth.passwords.reset';

    protected $subject = "Link para redefinição de senha";

    public function __construct()
    {
        $this->middleware('guest');
    }
}