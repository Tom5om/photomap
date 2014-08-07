<?php
return array(
    'controllers' => array(
        'invokables' => array(
            /*.. etc ...*/
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'ImageManager\Mapper\ImageMapper' => 'ImageManager\Mapper\Service\ImageMapperFactory',
        ),
    )
);
