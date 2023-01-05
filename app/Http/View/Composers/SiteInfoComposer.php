<?php

namespace App\Http\View\Composers;

use App\Models\SiteInfo;
use Illuminate\View\View;

class SiteInfoComposer
{

    public function compose(View $view)
    {
        $view->with('siteInfo', SiteInfo::first());
    }
}