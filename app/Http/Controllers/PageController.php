<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content\Page;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $url)
    {
        //Check if page exists by checking URL in Database
        $page = (new Page())->newQuery()->where('url', $url)->first();

        if (!$page) {
            return abort(404);
        }

        return view('pages.show', [
            'page' => $page
        ]);
    }
}
