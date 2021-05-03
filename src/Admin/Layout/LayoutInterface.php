<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout;

use Fabricity\Bundle\AdminBundle\Admin\Layout\Element\ElementInterface;

interface LayoutInterface
{
    public function getAsideLeft(): ElementInterface;
}