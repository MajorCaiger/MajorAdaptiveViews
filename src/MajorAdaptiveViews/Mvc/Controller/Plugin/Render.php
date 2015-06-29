<?php

/**
 * Render Plugin
 *
 * Determines which ViewController to use to render the content
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace MajorAdaptiveViews\Mvc\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Http\Request;
use MajorAdaptiveViews\Mvc\View\ViewControllerInterface;

/**
 * Render Plugin
 *
 * Determines which ViewController to use to render the content
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Render extends AbstractPlugin
{
    public function __invoke(array $params)
    {
        $contentType = $this->getContentType($this->getController()->getRequest());

        $viewControllers = $this->getController()->params('view_controller');

        if ($viewControllers === null) {
            throw new \RuntimeException('view_controller param not found in route config');
        }

        if (!is_array($viewControllers) || empty($viewControllers)) {
            throw new \RuntimeException('view_controller config must be an array');
        }

        if (isset($viewControllers[$contentType])) {
            $viewControllerConfig = $viewControllers[$contentType];
        } elseif (isset($viewControllers['default'])) {
            $viewControllerConfig = $viewControllers['default'];
        } else {
            throw new \RuntimeException('view_controller config could not be matched');
        }

        /** @var ViewControllerInterface $viewController */
        $viewController = $this->getController()->getServiceLocator()->get('ViewControllerManager')
            ->get($viewControllerConfig['service']);

        if (isset($viewControllerConfig['options'])) {
            $viewController->setOptions($viewControllerConfig['options']);
        }

        return $viewController->render($params);
    }

    private function getContentType(Request $request)
    {
        $contentTypeHeader = $request->getHeader('Content-Type');

        if ($contentTypeHeader) {
            return strtolower($contentTypeHeader->getFieldValue());
        }

        return 'default';
    }
}
