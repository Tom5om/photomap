<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 7/08/14
 * Time: 8:48 PM
 */

namespace ImageManager\Mapper;

use ImageManager\Entity\Image;

class ImageMapper
{
    const IMAGE_DIR = '/home/tom/Pictures';

    protected $_photos = array();
    protected $_photosDone;

    public function __construct()
    {
        $files = glob(self::IMAGE_DIR.'/*.{jpg}', GLOB_BRACE);

        $photos = array();
        foreach($files as $file)
        {
            $image = new Image();
            $exif = exif_read_data($file, 0, true);

            $image->setMetadata($exif);
            $image->setFilename($file);

            $photos[] = $image;
        }

        $this->setPhotos($photos);
    }

    public function getPhoto()
    {

    }

    /**
     * @param mixed $photosDone
     */
    public function setPhotosDone($photosDone)
    {
        $this->_photosDone = $photosDone;
    }

    /**
     * @return mixed
     */
    public function getPhotosDone()
    {
        return $this->_photosDone;
    }

    /**
     * @param mixed $photos
     */
    public function setPhotos($photos)
    {
        $this->_photos = $photos;
    }

    /**
     * @return mixed
     */
    public function getPhotos()
    {
        return $this->_photos;
    }
}