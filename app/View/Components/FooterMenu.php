<?php

namespace App\View\Components;

use App\Models\Content\Page;
use Illuminate\View\Component;

class FooterMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // get all active menu item pages
        $pages = (new Page())->newQuery()->where('status', 1)->orderBy('sort_order', 'asc')->get();
        return view('components.footer-menu', [
            'pages' => $pages,
        ]);
    }
}
