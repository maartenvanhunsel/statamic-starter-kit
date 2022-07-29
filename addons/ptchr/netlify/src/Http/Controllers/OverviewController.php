<?php

namespace Ptchr\Netlify\Http\Controllers;
use Statamic\Facades\YAML;

class OverviewController extends Controller
{
    public function index()
    {

//        dd($this->authorize('show netlify'));

        // if ($this->ohdear === null) {
        //     return $this->errorView();
        // }

        $values = collect(YAML::file(__DIR__.'/../content/addons/netlify.yaml')->parse())
            ->merge(YAML::file(base_path('content/addons/netlify.yaml'))->parse())
            ->all();
        $values = (object)$values;

        return view('netlify::overview.index', [
            'settings' => [
                'token' => config('config.netlify.token'),
                'site' => config('config.netlify.site') ?? null,
                'build_hook' => config('config.netlify.build_hook')
            ]
        ]);
    }
}
