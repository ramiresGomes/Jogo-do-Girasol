<?php

namespace Sunflower\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Sunflower\Models\Member;

class MemberController extends BaseController
{
    private $current_page;

    public function __construct()
    {
        $this->current_page = 'member';

        parent::__construct($this->current_page);
    }

    public function index()
    {
        $page_title = $this->page_title;
        $page_description = $this->page_description['list'];
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"))->breadcrumb;

        $members = Member::latest()->paginate(15);

        return view("admin::{$this->current_page}.index",
            compact('members', 'page_title', 'page_description', 'breadcrumb'));
    }

    public function create()
    {
        $page_title = $this->page_title;
        $page_description = $this->page_description['new'];
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"), route("admin.{$this->current_page}.index"))
            ->breadcrumbAdd(Lang::get('sunflower.custom.button.new'))
            ->breadcrumb;

        return view("admin::{$this->current_page}.create",
            compact('page_title', 'page_description', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $member = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route("admin.{$this->current_page}.edit", $member->id);
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);

        $page_title = $this->page_title;
        $page_description = $this->page_description['edit'] . $member->name;
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"), route("admin.{$this->current_page}.index"))
            ->breadcrumbAdd(Lang::get('sunflower.custom.button.edit'))
            ->breadcrumb;

        return view("admin::{$this->current_page}.edit",
            compact('page_title', 'page_description', 'breadcrumb', 'member'));
    }

    public function update(Request $request, $id)
    {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ];

        if (!empty($request['password'])) {
            $input['password'] = bcrypt($request->password);
        }

        Member::find($id)->update($input);
    }

    public function destroy($id)
    {
        Member::find($id)->delete();

        return redirect()->back();
    }
}