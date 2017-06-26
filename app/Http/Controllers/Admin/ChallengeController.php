<?php

namespace Sunflower\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Sunflower\Models\Challenge;

class ChallengeController extends BaseController
{
    private $current_page;

    public function __construct()
    {
        $this->current_page = 'challenge';

        parent::__construct($this->current_page);
    }

    public function index()
    {
        $page_title = $this->page_title;
        $page_description = $this->page_description['list'];
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"))->breadcrumb;

        $challenges = Challenge::latest()->paginate(15);

        return view("admin::{$this->current_page}.index", compact('challenges', 'page_title', 'page_description', 'breadcrumb'));
    }

    public function create()
    {
        $page_title = $this->page_title;
        $page_description = $this->page_description['new'];
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"), route("admin.{$this->current_page}.index"))
            ->breadcrumbAdd(Lang::get('sunflower.custom.button.new'))
            ->breadcrumb;

        return view("admin::{$this->current_page}.create", compact('page_title', 'page_description', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $challenge = Challenge::create($request->all());

        return redirect()->route("admin.{$this->current_page}.edit", $challenge->id);
    }

    public function edit($id)
    {
        $challenge = Challenge::findOrFail($id);

        $page_title = $this->page_title;
        $page_description = $this->page_description['edit'] . $challenge->name;
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"), route("admin.{$this->current_page}.index"))
            ->breadcrumbAdd(Lang::get('sunflower.custom.button.edit'))
            ->breadcrumb;

        return view("admin::{$this->current_page}.edit",
            compact('page_title', 'page_description', 'breadcrumb', 'challenge'));
    }

    public function update(Request $request, $id)
    {
        Challenge::find($id)->update($request->all());
    }

    public function destroy($id)
    {
        Challenge::find($id)->delete();

        return redirect()->back();
    }
}