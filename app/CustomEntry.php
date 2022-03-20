<?php
namespace App;

use Statamic\Entries\Entry;

class CustomEntry extends Entry
{
    public function shallowAugmentedArrayKeys()
    {
        if ($this->collectionHandle() == 'collection-handle') {
            return ['id', 'slug', 'url', 'title', 'subtitle', 'api_url', 'collection'];
        } else {
            return ['id', 'slug', 'url', 'title', 'subtitle', 'api_url', 'collection'];
        }
    }
}
