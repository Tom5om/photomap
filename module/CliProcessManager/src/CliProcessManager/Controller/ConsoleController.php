<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace CliProcessManager\Controller;

use Zend\Console\Console;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ConsoleController extends AbstractActionController
{
    public function processAction()
    {
        $console = Console::getInstance();
        $console->writeLine('Processing image');

        $img = './test.jpg';

        $exif = exif_read_data($img, 0, true);

        $exif = $exif['GPS'];

        $lon = $this->getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
        $lat = $this->getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);


        echo "http://maps.googleapis.com/maps/api/staticmap?center=".$lat.",".$lon."&size=600x300&maptype=roadmap
&markers=color:blue%7Clabel:S%7C".$lat.",".$lon.""; die();
    }

    public function getGps($exifCoord, $hemi) {

        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

    }

    public function gps2Num($coordPart) {

        $parts = explode('/', $coordPart);

        if (count($parts) <= 0)
            return 0;

        if (count($parts) == 1)
            return $parts[0];

        return floatval($parts[0]) / floatval($parts[1]);
    }
}
