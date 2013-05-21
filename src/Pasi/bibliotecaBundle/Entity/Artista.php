<?php 

namespace Pasi\bibliotecaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Assetic\Cache\ArrayCache;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */

class Artista{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $nombre;
	/**
	 * @ORM\Column(type="datetime")
	 */	
	private $creacion;
	/**
	 * @ORM\Column(type="datetime")
	 */
	private $modificacion;
	/**
	 * @ORM\OneToMany(targetEntity="Album", mappedBy="artista")
	 */
	private $albums;
	
	public function __toString(){
		return $this->nombre;
	}
	public function __construct(){
		$this->creacion = new \DateTime();
		$this->modificacion = new \DateTime();
		$this->albums = new ArrayCollection();
	}

   

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
     * Set nombre
     *
     * @param string $nombre
     * @return Artista
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set creacion
     *
     * @param \DateTime $creacion
     * @return Artista
     */
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;
    
        return $this;
    }

    /**
     * Get creacion
     *
     * @return \DateTime 
     */
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * Set modificacion
     *
     * @param \DateTime $modificacion
     * @return Artista
     */
    public function setModificacion($modificacion)
    {
        $this->modificacion = $modificacion;
    
        return $this;
    }

    /**
     * Get modificacion
     *
     * @return \DateTime 
     */
    public function getModificacion()
    {
        return $this->modificacion;
    }

    /**
     * Add albums
     *
     * @param \Pasi\bibliotecaBundle\Entity\Album $albums
     * @return Artista
     */
    public function addAlbum(\Pasi\bibliotecaBundle\Entity\Album $albums)
    {
        $this->albums[] = $albums;
    
        return $this;
    }

    /**
     * Remove albums
     *
     * @param \Pasi\bibliotecaBundle\Entity\Album $albums
     */
    public function removeAlbum(\Pasi\bibliotecaBundle\Entity\Album $albums)
    {
        $this->albums->removeElement($albums);
    }

    /**
     * Get albums
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlbums()
    {
        return $this->albums;
    }
}