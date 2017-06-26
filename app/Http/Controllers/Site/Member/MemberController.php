<?php

namespace Sunflower\Http\Controllers\Site\Member;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Sunflower\Http\Controllers\Controller;
use Sunflower\Models\Challenge;
use Sunflower\Models\Member;

class MemberController extends Controller
{
    protected $picture_path;
    protected $picture_url;

    public function __construct()
    {
        $this->middleware('member');
        $this->picture_url = asset("uploads/challenges/{challenge_id}/members/{member_id}");
        $this->picture_path = public_path("uploads/challenges/{challenge_id}/members/{member_id}");
    }

    public function index()
    {
        $member = Auth::guard('web_member')->user();

        $next_challenge = $this->getNextChallengeTemplate($member);

        return view('site::member.panel.index', compact('member', 'next_challenge'));
    }

    public function meetChallenge(Request $request)
    {
        $challenge = Challenge::find($request->challenge_id);
        $member = Auth::guard('web_member')->user();

        if ($challenge->members->contains($member->id)) {
            return false;
        }

        $file = $this->uploadPicture($request->file('picture'), $challenge, $member);

        $challenge->members()->attach($member->id, [
            'picture' => $file['picture_name'],
            'picture_path' => $file['picture_path'],
            'picture_url' => $file['picture_url'],
            'picture_dimensions' => $file['picture_dimensions']
        ]);

        return redirect()->back()->with('data', 'Parabéns, o desafio foi cumprido com sucesso.');
    }

    protected function getNextChallengeTemplate(Member $member = null)
    {
        if (is_null($member)) {
            $member = Auth::guard('web_member')->user();
        }

        $next_challenge = Challenge::whereDoesntHave('members', function ($query) use ($member) {
            $query->where('member_id', $member->id);
        })->first();

        return view("site::member.panel._partials.challenge",
            compact('next_challenge'))->render();
    }

    protected function uploadPicture($file, Challenge $challenge, Member $member)
    {
        $picture_path = str_replace('{challenge_id}', $challenge->id, str_replace('{member_id}', $member->id, $this->picture_path));
        $picture_url = str_replace('{challenge_id}', $challenge->id, str_replace('{member_id}', $member->id, $this->picture_url));

        if (!is_dir($picture_path . "/thumbs")) {
            mkdir($picture_path . "/thumbs", 0777, true);
        }

        $new_name = Str::slug($challenge->name) . "_" . Str::slug($member->name) . '.' . $file->getClientOriginalExtension();

        $image = Image::make($file);

        $image->resize(1024, 1024, function ($constraint) {
            $constraint->aspectRatio();
        })->save("{$picture_path}/{$new_name}");

        $dimensions = "{$image->width()}x{$image->height()}";

        $image->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save("{$picture_path}/thumbs/{$new_name}");

        return [
            'picture_name' => $new_name,
            'picture_url' => $picture_url,
            'picture_path' => $picture_path,
            'picture_dimensions' => $dimensions
        ];
    }
}