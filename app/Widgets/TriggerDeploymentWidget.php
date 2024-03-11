<?php

namespace App\Widgets;

use Statamic\Widgets\Widget;

class TriggerDeploymentWidget extends Widget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        if (config('services.vercel.deployment-hook-url')) {
            return view('widgets.trigger-deployment-widget');
        }
    }
}
