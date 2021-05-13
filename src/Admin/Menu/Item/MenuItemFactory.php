<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu\Item;

use Symfony\Component\OptionsResolver\OptionsResolver;

final class MenuItemFactory
{
    public function configureOptions(OptionsResolver $resolver, string $name): void
    {
        $resolver
            ->setDefaults([
                'icon' => null,
                'icon_class' => null,
                'label' => $name,
                'label_translation_parameters' => [],
                'translation_domain' => null,
                'route' => null,
                'route_parameters' => [],
                'active' => false,
            ])
            ->setAllowedTypes('icon', ['null', 'string'])
            ->setAllowedTypes('icon_class', ['null', 'string'])
            ->setAllowedTypes('label', ['null', 'string'])
            ->setAllowedTypes('translation_domain', ['null', 'string'])
            ->setAllowedTypes('label_translation_parameters', ['array'])
            ->setAllowedTypes('route', ['null', 'string'])
            ->setAllowedTypes('route_parameters', ['array'])
        ;
    }

    /**
     * @param array<string, mixed> $options
     */
    public function create(string $name, array $options): MenuItemInterface
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver, $name);
        $options = $resolver->resolve($options);

        return new MenuItem($name, $options);
    }
}
