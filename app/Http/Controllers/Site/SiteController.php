<?php
namespace Square\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Requests;
use Square\Http\Controllers\Controller;

class SiteController extends Controller
{
    public $default_seo = [
        'site_name' => 'Jogo do Girasol',
        'description' => '',
        'keywords' => 'jogo, girasol',
        'title' => '',
        'image' => '',
        'type' => 'website',
        'locale' => 'pt-br',
        'locale_alternate' => 'pt-pt'
    ];

    public function index()
    {
        return view('site::index');
    }
}
