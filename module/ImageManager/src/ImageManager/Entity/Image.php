<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 7/08/14
 * Time: 9:37 PM
 */

namespace ImageManager\Entity;

class Image {

    /** @var string */
    protected $_filename;

    /** @var array */
    protected $_metadata;

    /** @var float */
    protected $longitude;

    /** @var float */
    protected $latitude;

    public function getGps()
    {
        $metadata = $this->getMetadata();

        $exif = $metadata['GPS'];

        $lon = $this->translateGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
        $this->setLongitude($lon);
        $lat = $this->translateGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
        $this->setLatitude($lat);

        return $lat.",".$lon;
    }

    public function translateGps($exifCoord, $hemi)
    {
        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);
    }

    public function gps2Num($coordPart)
    {

        $parts = explode('/', $coordPart);

        if (count($parts) <= 0)
            return 0;

        if (count($parts) == 1)
            return $parts[0];

        return floatval($parts[0]) / floatval($parts[1]);

    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->_filename = $filename;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->_filename;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->_metadata = $metadata;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

}