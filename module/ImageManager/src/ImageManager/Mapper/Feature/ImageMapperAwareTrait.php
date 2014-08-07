<?php

namespace ImageManager\Mapper\Feature;

use ImageManager\Mapper\ImageMapper;

trait ImageMapperAwareTrait 
{
    /**
    * @var imageMapper
    */
    protected $imageMapper;

    /**
    * @param $imageMapper
    */
    public function setImageMapper($imageMapper)
    {
        $this->imageMapper = $imageMapper;
    }

    /**
     * @return ImageMapper
     * @throws \Exception
     */
    public function getImageMapper()
    {
        if(null === $this->imageMapper) {
            throw new \Exception('Image mapper must be defined');
        }
        return $this->imageMapper;
    }
}