# MajorAdaptiveViews
ZF2 module that allows you to specify different View Controllers to render your response based on the requested Content Type

## Installation
    composer require major-caiger/major-adaptive-views

## Configuration
### Sample route config
module.php

    ...
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
    
                        // View controller config
                        'view_controller'   => [
                            // Content-Type
                            'application/json' => [
                                // Config
                                'service' => 'Json',
                            ],
                            'default' => [
                                'service' => 'CustomViewController',
                                // Options to pass to view controller
                                'options' => [
                                    'template' => 'foo-bar'
                                ]
                            ]
                        ]


                    ],
                ],
            ],
        ],
    ],
    ...

### Custom View Controller
module.php

    ...
    'view_controllers' => [
        'invokables' => [
            'CustomViewController' => 'My\Custom\ViewController',
        ]
    ],
    ...

My\Custom\ViewController.php

    <?php
    
    namespace My\Custom;
    
    use MajorAdaptiveViews\Mvc\View\AbstractViewController;
    use Zend\View\Model\ViewModel;
    
    /**
     * View Controller
     *
     * @author Rob Caiger <rob@clocal.co.uk>
     */
    class ViewController extends AbstractViewController
    {
        public function render(array $params)
        {
            $viewModel = new ViewModel($params);
            $viewModel->setTemplate($this->getOption('template'));
    
            return $viewModel;
        }
    }

### Usage
From your controller method

    ...
    public function someAction()
    {
        ...

        // "render" controller plugin takes care of passing the params to your view controller
        return $this->render($params);
    }
    
### Existing view controllers

| Service  | Function |
| ------------- | ------------- |
| Json  | Returns JsonModel (Requires json view strategy) |