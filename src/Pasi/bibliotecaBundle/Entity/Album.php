<?php 

namespace Pasi\bibliotecaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Album{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @ORM\Column(type="string",length=100 )
	 */
	private $titulo;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $publicacion;
	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	private $descripcion;
	
	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $foto;
	/**
	 * @ORM\Column(type="datetime")
	 */	
	private $creacion;
	/**
	 * @ORM\Column(type="datetime")
	 */
	private $modificacion;
	/**
	 * @ORM\ManyToOne(targetEntity="Artista", inversedBy="albums")
	 */
	private $artista;
	
	/**
	 * @ORM\OneToMany(targetEntity="Cancion", mappedBy="album")
	 */
	private $canciones;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="albums")
	 */
	private $categoria;
	
	public function __toString(){
		return $this->titulo." (".$this->publicacion.")";
	}
	public function __construct(){
		$this->creacion = new \DateTime();
		$this->modificacion = new \DateTime();

		$this->canciones = new ArrayCollection();
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
     * Set titulo
     *
     * @param string $titulo
     * @return Album
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set publicacion
     *
     * @param integer $publicacion
     * @return Album
     */
    public function setPublicacion($publicacion)
    {
        $this->publicacion = $publicacion;
    
        return $this;
    }

    /**
     * Get publicacion
     *
     * @return integer 
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Album
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Album
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set creacion
     *
     * @param \DateTime $creacion
     * @return Album
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
     * @return Album
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
     * Set artista
     *
     * @param \Pasi\bibliotecaBundle\Entity\Artista $artista
     * @return Album
     */
    public function setArtista(\Pasi\bibliotecaBundle\Entity\Artista $artista = null)
    {
        $this->artista = $artista;
    
        return $this;
    }

    /**
     * Get artista
     *
     * @return \Pasi\bibliotecaBundle\Entity\Artista 
     */
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * Add canciones
     *
     * @param \Pasi\bibliotecaBundle\Entity\Cancion $canciones
     * @return Album
     */
    public function addCancione(\Pasi\bibliotecaBundle\Entity\Cancion $canciones)
    {
        $this->canciones[] = $canciones;
    
        return $this;
    }

    /**
     * Remove canciones
     *
     * @param \Pasi\bibliotecaBundle\Entity\Cancion $canciones
     */
    public function removeCancione(\Pasi\bibliotecaBundle\Entity\Cancion $canciones)
    {
        $this->canciones->removeElement($canciones);
    }

    /**
     * Get canciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCanciones()
    {
        return $this->canciones;
    }

    /**
     * Set categoria
     *
     * @param \Pasi\bibliotecaBundle\Entity\Categoria $categoria
     * @return Album
     */
    public function setCategoria(\Pasi\bibliotecaBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Pasi\bibliotecaBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}