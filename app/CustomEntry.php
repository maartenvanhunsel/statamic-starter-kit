<?php
namespace App;

class CustomEntry extends \Ptchr\StatamicBasics\Entry
{
    public function shallowAugmentedArrayKeys()
    {
        $defaults = ['id', 'slug', 'url', 'title', 'api_url', 'collection'];

        // In case you want to add custom collections, change this {handle} and modify where needed.
        if ($this->collectionHandle() == 'handle') {
            return [...$defaults, 'example-field'];
        } else {
            return $defaults;
        }
    }
}
