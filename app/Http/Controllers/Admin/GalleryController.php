<?php

namespace Sunflower\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use Sunflower\Models\Gallery;

class GalleryController extends BaseController
{
    private $current_page;

    public function __construct()
    {
        $this->current_page = 'gallery';

        parent::__construct($this->current_page);
    }

    private $path = "uploads/gallery";

    public function index()
    {
        $page_title = $this->page_title;
        $page_description = $this->page_description['list'];
        $breadcrumb = $this->breadcrumbAdd(Lang::get("sunflower.admin.pages.{$this->current_page}"))->breadcrumb;

        $gallery = Gallery::all();

        return view("admin::{$this->current_page}.index", compact('gallery', 'page_title', 'page_description', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $images = $this->upload($request->file('image'));

        foreach ($images as $image) {
            Gallery::create([
                'name' => $image['name'],
                'dimensions' => $image['dimensions'],
                'url' => asset('uploads/gallery'),
                'path' => base_path('public/uploads/gallery')
            ]);
        }

        return Response::json('success', 200);
    }

    public function upload($files)
    {
        $images = [];

        if (!is_dir($this->path . "/thumbs")) {
            mkdir($this->path . "/thumbs", 0777, true);
        }

        foreach ($files as $file) {
            $hash = substr(md5(uniqid(time(), true)), 0, 6);
            $filename = "galeria-{$hash}.{$file->getClientOriginalExtension()}";

            $image = Image::make($file);

            $image->resize(1024, 1024, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$this->path}/{$filename}", 70);

            $temp = ['name' => $filename, 'dimensions' => "{$image->width()}x{$image->height()}"];
            array_push($images, $temp);

            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$this->path}/thumbs/{$filename}", 70);
        }

        return $images;
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();

        $this->unlinkImage($gallery);

        return redirect()->back();
    }

    public function unlinkImage(Gallery $image)
    {
        $path = str_replace("{image_id}", $image->id, $this->path);

        if (file_exists(public_path("{$path}{$image->name}")))
            unlink(public_path("{$path}{$image->name}"));

        if (file_exists(public_path("{$path}thumbs/{$image->name}")))
            unlink(public_path("{$path}thumbs/{$image->name}"));
    }
}