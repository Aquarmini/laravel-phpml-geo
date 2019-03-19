<?php

namespace App;

use Illuminate\Container\Container;
use Phpml\Classification\KNearestNeighbors;

class PoiDistrictService
{
    /**
     * @var KNearestNeighbors
     */
    protected $classifier;

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;

        $samples = unserialize(file_get_contents(base_path('storage/samples')));
        $labels = unserialize(file_get_contents(base_path('storage/labels')));

        $this->classifier = new KNearestNeighbors();
        $this->classifier->train($samples, $labels);
    }

    /**
     * @return KNearestNeighbors
     */
    public function getClassifier(): KNearestNeighbors
    {
        return $this->classifier;
    }
}
