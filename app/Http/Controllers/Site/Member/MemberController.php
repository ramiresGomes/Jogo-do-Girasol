<?php

namespace Square\Http\Controllers\Site\Member;

use Illuminate\Support\Facades\Auth;
use Square\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function index()
    {
        $member = Auth::guard('web_member')->user();

        return view('site::member.panel.index', compact('member'));
    }
}