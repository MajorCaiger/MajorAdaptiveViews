<?php

namespace MajorAdaptiveViews\Mvc\View;

/**
 * View Controller Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface ViewControllerInterface
{
    public function render(array $params);

    public function setOptions(array $options);
}
