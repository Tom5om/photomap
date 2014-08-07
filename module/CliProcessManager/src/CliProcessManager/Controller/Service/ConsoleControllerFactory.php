<?php

namespace CliProcessManager\Controller\Service;

use CliProcessManager\Controller\ConsoleController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ConsoleControllerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new ConsoleController();

        $imageMapper = $serviceLocator->getServiceLocator()->get('ImageManager\Mapper\ImageMapper');
        $service->setImageMapper($imageMapper);

        return $service;
    }
}