<?php

namespace Square\Http\Controllers\Admin\Auth;

use Square\Http\Controllers\Controller;
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