<?php

namespace Sunflower\Http\Controllers\Admin;

use Illuminate\Support\Facades\Lang;
use Sunflower\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $page_title = Lang::get('sunflower.admin.dashboard.page-title');
        $page_description = Lang::get('sunflower.admin.dashboard.page-description');

        return view("admin::dashboard",
            compact('page_title', 'page_description'));
    }
}