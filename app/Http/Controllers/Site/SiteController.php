<?php
namespace Sunflower\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Requests;
use Sunflower\Http\Controllers\Controller;
use Sunflower\Models\Challenge;
use Sunflower\Models\Gallery;

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
        $gallery = Gallery::get();
        $challenges = Challenge::where('is_information', 0)->inRandomOrder()->take(2)->get();

        return view('site::index', compact('gallery'));
    }
}
