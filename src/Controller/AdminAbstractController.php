<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Controller;

use Fabricity\Bundle\AdminBundle\Layout\LayoutManager;
use Fabricity\Bundle\AdminBundle\Layout\LayoutManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AdminAbstractController extends AbstractController
{
    private LayoutManagerInterface $layoutManager;

    public function __construct(LayoutManagerInterface $layoutManager)
    {
        $this->layoutManager = $layoutManager;
    }

    abstract protected function getLayoutClass(): string;

    /**
     * @param array<string, mixed> $parameters
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters['fabricity_layout'] = $this->layoutManager->getLayouts();

        return parent::render($view, $parameters, $response);
    }
}
