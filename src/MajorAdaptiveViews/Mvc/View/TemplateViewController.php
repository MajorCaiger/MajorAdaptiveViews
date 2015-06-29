<?php

namespace MajorAdaptiveViews\Mvc\View;

use Zend\View\Model\ViewModel;

/**
 * Template View Controller
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class TemplateViewController extends AbstractViewController
{
    public function render(array $params)
    {
        $viewModel = new ViewModel($params);
        $viewModel->setTemplate($this->getOption('template'));

        return $viewModel;
    }
}
