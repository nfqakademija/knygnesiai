<?php

namespace App\DataFixtures\Traits;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Trait WithContainerTrait
 */
trait WithContainerTrait
{
    protected $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}