<?php

namespace Square\Http\Controllers\Admin;

use Illuminate\Support\Facades\Lang;
use Square\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $page;

    protected $page_title;

    protected $page_description;

    protected $breadcrumb;

    public function __construct($page)
    {
        $this->page = $page;

        $this->page_title = Lang::get("square.admin.pages.{$this->page}");

        $this->page_description = [
            'list' => Lang::get('square.custom.page-description.list', ['module' => Lang::get("square.admin.pages.{$this->page}")]),
            'new' => Lang::get('square.custom.page-description.new'),
            'edit' => Lang::get('square.custom.page-description.edit')
        ];

        $this->breadcrumb = [];
    }

    public function breadcrumbAdd($name, $link = null)
    {
        if ($link) {
            array_push($this->breadcrumb, [
                'name' => $name,
                'link' => $link
            ]);

            return $this;
        }

        array_push($this->breadcrumb, ['name' => $name]);

        return $this;
    }
}
