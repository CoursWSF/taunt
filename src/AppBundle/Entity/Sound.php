<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Sound
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SoundRepository")
 */
class Sound
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set movie
     *
     * @param string $movie
     *
     * @return Sound
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return string
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Sound
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set soundUrl
     *
     * @param string $soundUrl
     *
     * @return Sound
     */
    public function setSoundUrl($soundUrl)
    {
        $this->soundUrl = $soundUrl;

        return $this;
    }

    /**
     * Get soundUrl
     *
     * @return string
     */
    public function getSoundUrl()
    {
        return $this->soundUrl;
    }

    /**
     * Get tags
     *
     * @return integer
     */
    public function getTags()
    {
        return $this->tags;
    }

}
