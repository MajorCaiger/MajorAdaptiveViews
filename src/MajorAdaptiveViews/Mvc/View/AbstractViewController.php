<?php

/**
 * Abstract View Controller
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace MajorAdaptiveViews\Mvc\View;

/**
 * Abstract View Controller
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
abstract class AbstractViewController implements ViewControllerInterface
{
    protected $options;

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    protected function getOptions()
    {
        return $this->options;
    }

    protected function getOption($name, $default = null)
    {
        return isset($this->options[$name]) ? $this->options[$name] : $default;
    }
}
