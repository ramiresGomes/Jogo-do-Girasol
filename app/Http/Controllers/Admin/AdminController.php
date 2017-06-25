<?php

namespace Square\Http\Controllers\Admin;

use Illuminate\Support\Facades\Lang;
use Square\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $page_title = Lang::get('square.admin.dashboard.page-title');
        $page_description = Lang::get('square.admin.dashboard.page-description');

        return view("admin::dashboard",
            compact('page_title', 'page_description'));
    }
}