<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Type;

use Fabricity\Bundle\AdminBundle\Admin\Layout\Element\ElementBuilderInterface;

interface LayoutTypeInterface extends TypeInterface
{
    public function buildAsideLeft(ElementBuilderInterface $builder): void;
}
