<?php

namespace Ptchr\Netlify\Http\Controllers;

use Ptchr\Netlify\Netlify;
use Statamic\Http\Controllers\CP\CpController as StatamicCpController;

abstract class Controller extends StatamicCpController
{
    /**
     * @var Netlify|null
     */
    public $netlify;

    public function __construct()
    {
        $this->netlify = $this->fetchOhDear();
    }

    /**
     * Will return the OhDear instance, if the connection has been successfull
     *
     * @return Netlify|null
     */
    public function fetchOhDear()
    {
        $ohdear = new Netlify;

        // if ($this->dataNull($ohdear)) {
        //     return null;
        // }

        return $ohdear;
    }

    /**
     * Returning the default error view
     */
    public function errorView()
    {
        // return response()->view('oh-dear::error.problem');
    }

    /**
     * Checking if the returned data is null
     *
     * @param $ohdear
     * @return bool
     */
    private function dataNull($ohdear)
    {
        return $ohdear->ohDear === null || $ohdear->site === null;
    }
}
