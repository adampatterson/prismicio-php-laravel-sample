<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PrismicComposer
{
    /**
     * Create a new prismic composer.
     *
     * Properties here are set in App\Http\Middleware\ConnectToPrismic
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        // Define the prismic.io repository API endpoint
        $this->endpoint = $request->attributes->get('endpoint');

        // Define the link resolver
        $this->linkResolver = $request->attributes->get('linkResolver');

        // Define the menu content
        $this->menu = $request->attributes->get('api')->getSingle('menu');
    }

    /**
     * Bind the link resolver and the menu content to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('endpoint', $this->endpoint);
        $view->with('linkResolver', $this->linkResolver);
        $view->with('menu', $this->menu);
    }
}
