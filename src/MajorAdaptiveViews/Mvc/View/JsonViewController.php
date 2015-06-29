<?php

namespace MajorAdaptiveViews\Mvc\View;

use Zend\View\Model\JsonModel;

/**
 * Json View Controller
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class JsonViewController extends AbstractViewController
{
    public function render(array $params)
    {
        return new JsonModel($params);
    }
}
