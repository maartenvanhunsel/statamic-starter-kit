<?php
namespace App;

use Statamic\Entries\Entry;

class CustomEntry extends Entry
{
    public function shallowAugmentedArrayKeys()
    {
        // In case you want to add custom collections, change this {handle} and modify where needed.
        if ($this->collectionHandle() == 'handle') {
            return ['id', 'slug', 'url', 'title', 'api_url', 'collection'];
        } elseif ($this->collectionHandle() == 'demo_blog') {
            return ['id', 'slug', 'url', 'title', 'api_url', 'collection', 'description', 'featured_image', 'categories'];
        } else {
            return ['id', 'slug', 'url', 'title', 'api_url', 'collection'];
        }
    }
}
