<?php

namespace CliProcessManager\Controller\Service;

use CliProcessManager\Controller\ImageMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ImageMapperFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new ImageMapper();

        return $service;
    }
}