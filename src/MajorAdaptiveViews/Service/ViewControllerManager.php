<?php

namespace MajorAdaptiveViews\Service;

use Zend\ServiceManager\AbstractPluginManager;

/**
 * View Controller Manager
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class ViewControllerManager extends AbstractPluginManager
{
    public function validatePlugin($plugin)
    {
        // no-op
    }
}
