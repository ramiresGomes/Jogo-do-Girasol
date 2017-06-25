<?php

namespace Square\Http\Controllers\Site\Member;

use Square\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    use ResetsPasswords;

    protected $linkRequestView = "site.member.auth.request-reset";

    protected $resetView = "site.member.auth.reset";

    protected $redirectPath = "/membro";

    protected $subject = "Link para redefinição de senha";

    protected $guard = "web_member";

    protected $broker = "members";

    public function __construct()
    {
        $this->middleware('guest');
    }
}
