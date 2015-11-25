<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
=======

/**
 * Sound
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SoundRepository")
>>>>>>> 966d71a0a18f468570db9bfde75b1bb76133abed
 */
class Sound
{
    /**
<<<<<<< HEAD
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;
=======
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="movie", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $movie;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="soundUrl", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $soundUrl;
>>>>>>> 966d71a0a18f468570db9bfde75b1bb76133abed

    /**
    * @ORM\OneToMany(targetEntity="Tag", mappedBy="sound")
    **/
    private $tags;

<<<<<<< HEAD
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
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

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/sounds';
    }

    public function upload()
    {
    // the file property can be empty if the field is not required
      if (null === $this->getFile()) {
          return;
      }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
      $this->getFile()->move(
          $this->getUploadRootDir(),
          $this->getFile()->getClientOriginalName()
      );

      // set the path property to the filename where you've saved the file
      $this->path = $this->getFile()->getClientOriginalName();

      // clean up the file property as you won't need it anymore
      $this->file = null;
    }
=======

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

>>>>>>> 966d71a0a18f468570db9bfde75b1bb76133abed
}
