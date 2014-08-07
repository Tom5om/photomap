<?php

namespace ImageManager\Mapper\Service;

use ImageManager\Mapper\ImageMapper;
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