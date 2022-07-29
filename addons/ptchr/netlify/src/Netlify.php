<?php

namespace Ptchr\Netlify;

use Illuminate\Support\Carbon;
// use Jonassiewertsen\OhDear\Exceptions\OhDearCredentialsNotProvidedException;
// use OhDear\PhpSdk\OhDear as OhDearSDK;

class Netlify
{
    /**
     * The Odear instance
     *
     * @var OhDearSDK
     */
    public $ohDear;

    /**
     * The specific monitored Oh Dear site
     *
     * @var \OhDear\PhpSdk\Resources\Site
     */
    public $site;

}
