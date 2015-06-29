<?php

return array(
    'controller_plugins' => array(
        'invokables' => array(
            'render' => 'MajorAdaptiveViews\Mvc\Controller\Plugin\Render',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'ViewControllerManager' => 'MajorAdaptiveViews\Service\ViewControllerManagerFactory',
        ),
    ),
    'view_controllers' => array(
        'invokables' => array(
            'Json' => 'MajorAdaptiveViews\Mvc\View\JsonViewController',
        ),
    ),
);
