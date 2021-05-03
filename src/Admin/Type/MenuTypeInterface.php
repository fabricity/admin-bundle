<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Type;

use Fabricity\Bundle\AdminBundle\Admin\Menu\MenuBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface MenuTypeInterface extends TypeInterface
{
    /**
     * @param array<string, mixed> $options
     */
    public function build(MenuBuilderInterface $builder, array $options): void;

    public function configureOptions(OptionsResolver $resolver): void;
}
