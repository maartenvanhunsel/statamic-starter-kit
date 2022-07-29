<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JackSleight\StatamicBardMutator\Facades\Mutator;

use Statamic\Facades\URL;

class StatamicServiceProvider extends ServiceProvider
{
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Change Link url if no http defined + add target _blank to external urls
         */

        Mutator::tag('link', function ($tag) {
            if (URL::isExternal($tag[0]['attrs']['href'])) {
                /**
                 * Change Link url if no http defined
                 */

                if (str_starts_with($tag[0]['attrs']['href'], 'www.')) {
                    $tag[0]['attrs']['href'] = 'https://' . $tag[0]['attrs']['href'];
                }

                /**
                 * Add target _blank to external urls
                 */
                $tag[0]['attrs']['target'] = '_blank';
            }
            return $tag;
        });

        /**
         * Remove all list items from paragraph
         * @URL https://github.com/jacksleight/statamic-bard-mutator/issues/7#issuecomment-1196428040
         */

        Mutator::tag('list_item', function ($tag, $data) {
            if (($data->content[0]->type ?? null) === 'paragraph') {
                $data->content = $data->content[0]->content;
            }
            return $tag;
        });
    }
}
