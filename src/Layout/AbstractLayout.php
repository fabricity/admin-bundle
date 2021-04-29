<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Layout;

use Fabricity\Bundle\AdminBundle\Layout\Builder\BuilderInterface;

abstract class AbstractLayout
{

    public function buildAsideLeft(BuilderInterface $builder): void
    {

    }

}