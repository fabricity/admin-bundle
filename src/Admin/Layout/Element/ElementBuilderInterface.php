<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout\Element;

interface ElementBuilderInterface
{
    public function addMenu(string $name, string $type, array $options = []): ElementBuilderInterface;
}