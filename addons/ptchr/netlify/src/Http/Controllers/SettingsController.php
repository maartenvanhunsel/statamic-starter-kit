<?php

namespace Ptchr\Netlify\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Ptchr\Netlify\Blueprints\SettingsBlueprint;
use Ptchr\Netlify\Fields as FooFields;
use Statamic\Facades\Blueprint;
use Statamic\Facades\File;
use Statamic\Facades\YAML;
use Statamic\Support\Arr;

use Statamic\Http\Controllers\CP\CpController;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
//        dd($this->authorize('show netlify'));
        $blueprint = (new SettingsBlueprint)->createBlueprint();
        $fields = $blueprint->fields();
        $fields = $fields->preProcess();

        $values = collect(YAML::file(__DIR__.'/../content/addons/netlify.yaml')->parse())
            ->merge(YAML::file(base_path('content/addons/netlify.yaml'))->parse())
            ->all();

        $fields = $fields->addValues($values);
        // $data = (new FooFields)->getData();

        // $data = $this->getData();


        return view('netlify::settings.index', [
            'settings' => [
                'token' => config('config.netlify.token'),
                'site' => config('config.netlify.site'),
                'build_hook' => config('config.netlify.build_hook')
            ],
            'blueprint' => $blueprint->toPublishArray(),
            'values' => $fields->values(),
            'meta' => $fields->meta(),
        ]);
    }

    public function update(Request $request): void
    {
        $blueprint = Blueprint::makeFromSections((new FooFields)->configFieldItems());

        $fields = $blueprint->fields();
        $fields = $fields->addValues($request->all());
        $fields->validate();

        $values = Arr::removeNullValues($fields->process()->values()->all());

        File::put(base_path('content/addons/netlify.yaml'), YAML::dump($values));
    }

    public function getData()
    {
        $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();
        dd($users);
    }
}
