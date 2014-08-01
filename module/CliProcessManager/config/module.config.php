<?php
return array(
    'controllers' => array(
        'invokables' => array(
            /*.. etc ...*/
        ),
        'factories' => array(
            'CliProcessManager\Controller\ConsoleController' => 'CliProcessManager\Controller\Service\ConsoleControllerFactory',
        ),
    ),
);
