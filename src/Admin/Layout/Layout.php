<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout;

use Fabricity\Bundle\AdminBundle\Admin\Layout\Element\ElementInterface;

final class Layout implements LayoutInterface
{
    private ElementInterface $asideLeft;

    public function __construct(ElementInterface $asideLeft)
    {
        $this->asideLeft = $asideLeft;
    }

    public function getAsideLeft(): ElementInterface
    {
        return $this->asideLeft;
    }
}