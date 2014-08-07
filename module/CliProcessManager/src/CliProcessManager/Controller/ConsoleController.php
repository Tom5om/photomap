<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace CliProcessManager\Controller;

use ImageManager\Mapper\Feature\ImageMapperAwareTrait;
use Zend\Console\Console;
use Zend\Mvc\Controller\AbstractActionController;
use ImageManager\Entity\Image;

class ConsoleController extends AbstractActionController
{
    use ImageMapperAwareTrait;

    public function processAction()
    {
        $console = Console::getInstance();
        $console->writeLine('Processing image');

        /** @var Image[] $photos */
        $photos = $this->getImageMapper()->getPhotos();

        foreach($photos as $photo)
        {
            var_dump($photo->getGps());
            $gps = $photo->getGps();
            echo "http://maps.googleapis.com/maps/api/staticmap?center=".$gps."&size=600x300&maptype=roadmap
&markers=color:blue%7Clabel:S%7C".$gps."";
        }
    }


}
