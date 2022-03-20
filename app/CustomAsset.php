<?php
namespace App;

use Statamic\Assets\Asset;

class CustomAsset extends Asset
{
    public function shallowAugmentedArrayKeys()
    {
        return ['id', 'permalink', 'alt', 'width', 'height'];
    }
}
