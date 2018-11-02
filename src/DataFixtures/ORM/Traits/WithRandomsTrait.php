<?php

namespace App\DataFixtures\ORM\Traits;

/**
 * Trait WithRandomsTrait
 */
trait WithRandomsTrait
{
    /**
     * @param $objects
     *
     * @return mixed
     */
    protected function randomObject($objects)
    {
        return $objects[rand(0, count($objects) - 1)];
    }
}