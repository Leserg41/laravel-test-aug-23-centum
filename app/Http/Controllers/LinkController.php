<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Carbon\Carbon;

class LinkController extends Controller
{
    public function link (string $link) {
        $link = Link::where([
            ['name', '=', $link],
            ['expire', '>=', Carbon::now()]
        ])->first();

        if ($link->redirects_limit >= $link->redirects || $link === null) {
            return abort(404);
        }

        $link->update(['redirects' => $link->redirects++]);

        dd($link);
    }

    public function add () {
        return view('links.add');
    }

    public function addHandler (Request $request) {
        $request->validate([
            'name' => ['min:6', 'regex:/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/'],
        ]);

        Link::create([
            'name' => $request->name,
            'redirects_limit' => $request->redirects_limit,
            'redirects' => 0,
            'expire' => Carbon::now()->addHour($request->expire_hours)
        ]);
    }
}
