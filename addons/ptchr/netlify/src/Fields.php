<?php

namespace Ptchr\Netlify;

use Illuminate\Support\Facades\Http;

class Fields
{

    /**
     * @return array|array[]
     */
    public function setBlueprint(): void
    {

    }

    public function configFieldItems(): array
    {
        return [
            'settings' => [
                'fields' => [
                    'deploying' => [
                        'type' => 'toggle',
                        'display' => 'Enable auto-deploying',
                        'width' => 25,
                        // 'instructions' => 'This can be used to disable all scripts and over-rides individual scripts setting',
                    ],
                    'interval' => [
                        'type' => 'integer',
                        'display' => 'Deploy interval',
                        'width' => 75,
                        'if' => [
                            'deploying' => 'true'
                        ],
                        'instructions' => 'This can be used to disable all scripts and over-rides individual scripts setting',
                    ],
                    'site_id' => [
                        'type' => 'select',
                        'display' => 'Current site',
                        'options' => $this->getNetlifySites(),
                        'if' =>  auth()->user()->can('show settings')
                    ]
                ]
            ]
        ];
    }

    public function getNetlifySites()
    {

        $sites = Http::withToken(config('config.netlify.token'))->get('https://api.netlify.com/api/v1/sites')
        ->json();

        $sites = collect($sites);

        $sites = $sites->mapWithKeys(function($user, $key) {
            $user = (object)$user;
            return [$user->site_id => $user->name . ' [' . $user->site_id . ']'];
        });

        return $sites;
    }
}
