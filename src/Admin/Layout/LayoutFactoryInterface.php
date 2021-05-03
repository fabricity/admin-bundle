<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout;

interface LayoutFactoryInterface
{
    public function create(string $type): Layout;
}