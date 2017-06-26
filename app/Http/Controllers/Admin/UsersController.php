<?php

namespace Sunflower\Http\Controllers\Admin;

use Illuminate\Support\Facades\Lang;
use Sunflower\Models\User;
use Illuminate\Http\Request;

class UsersController extends BaseController
{
    private $current_page;

    public function __construct()
    {
        $this->current_page = 'user';

        parent::__construct($this->current_page);
    }

    public function index()
    {
        $page_title = $this->page_title;
        $page_description = $this->page_description['list'];
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"))->breadcrumb;

        $users = User::latest()->paginate(30);

        return view("admin::{$this->current_page}.index",
            compact('users', 'page_title', 'page_description', 'breadcrumb'));
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
        $input = $this->prepareFields($request);

        User::create($input);

        if ($request->ajax()) {
            return response()->json(['responseText' => 'Registro adicionado com sucesso'], 200);
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);

        $page_title = $this->page_title;
        $page_description = $this->page_description['edit'] . $user->name;
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"), route("admin.{$this->current_page}.index"))
            ->breadcrumbAdd(Lang::get('sunflower.custom.button.edit'))
            ->breadcrumb;

        return view("admin::{$this->current_page}.edit",
            compact('user', 'page_title', 'page_description', 'breadcrumb'));
    }

    public function update(Request $request, $id)
    {
        $input = $this->prepareFields($request);
        User::find($id)->update($input);

        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.user.index');
    }

    private function prepareFields(Request $request)
    {
        $input = $request->all();

        if (isset($input['password'])) {
            $input['password'] = bcrypt($input['password']);
            return $input;
        }

        return $input;
    }

    public function emailValidate($email, $id = null)
    {
        $response = User::where('email', '=', $email)->where('id', '!=', $id)->get();

        return $response->isEmpty() ? 200 : 406;
    }
}
