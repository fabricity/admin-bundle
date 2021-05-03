<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Controller;

use Fabricity\Bundle\AdminBundle\Admin\Layout\LayoutFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AdminAbstractController extends AbstractController
{
    private LayoutFactoryInterface $layoutFactory;

    public function __construct(LayoutFactoryInterface $layoutFactory)
    {
        $this->layoutFactory = $layoutFactory;
    }

    abstract protected function getLayoutClass(): string;

    /**
     * @param array<string, mixed> $parameters
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $layoutClass = $this->getLayoutClass();
        $parameters['fabricity_layout'] = $this->layoutFactory->create($layoutClass);

        return parent::render($view, $parameters, $response);
    }
}
