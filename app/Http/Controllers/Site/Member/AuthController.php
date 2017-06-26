<?php

namespace Sunflower\Http\Controllers\Site\Member;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Sunflower\Models\Member;
use Validator;
use Sunflower\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/membro';

    protected $guard = 'web_member';

    protected $loginView = 'site::member.auth.login';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'register', 'showRegistrationForm']]);
    }

    public function create()
    {
        return view('site::member.auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:6'
        ]);

        Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $request->session()->flash('status', ['message' => 'Registro cadastrado com sucesso.', 'status' => 'success']);

        $this->login($request);

        return redirect()->route('site.member.index');
    }

    public function verifyEmailUnique(Request $request)
    {
        if (Member::where('email', value($request->all()))->count() > 0) {
            return Response::json([], 400);
        }

        return Response::json(200);
    }
}