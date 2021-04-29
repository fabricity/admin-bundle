<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Layout;

final class LayoutManager implements LayoutManagerInterface
{
    /** @var LayoutInterface[] */
    private iterable $layouts;

    /**
     * @param LayoutInterface[] $layouts
     */
    public function __construct(iterable $layouts)
    {
        $this->layouts = $layouts;
    }

    public function getLayouts(): array
    {
        $test = [];

        foreach ($this->layouts as $layout) {
            $test[] = $layout;
        }

        return $test;
    }

}