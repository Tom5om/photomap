<?php
return array(
    'router' => array(
        'routes' => array(
            // HTTP routes are here
        )
    ),

    'console' => array(
        'router' => array(
            'routes' => array(
                'process-images' => array(
                    'options' => array(
                        'route'    => 'process',
                        'defaults' => array(
                            'controller' => 'CliProcessManager\Controller\ConsoleController',
                            'action'     => 'process'
                        )
                    )
                )
            )
        )
    ),
);