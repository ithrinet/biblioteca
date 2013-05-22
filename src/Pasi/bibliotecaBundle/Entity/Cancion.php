<?php

namespace Pasi\bibliotecaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Cancion
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Cancion
{
    /**
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
     * @ORM\Column(name="titulo", type="string", length=100)
     */
    private $titulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer")
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="letra", type="text")
     */
    private $letra;
    /**
     * @var string
     *
     * @ORM\Column(name="duracion", type="string", length=100)
     */
    private $duracion;

    /**
     * @var string
     *
     * @ORM\Column(name="cancion", type="string", length=255)
     * 
     */
    private $cancion;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creacion", type="datetime")
     */
    private $creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modificacion", type="datetime")
     */
    private $modificacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="canciones")
     */
    
    private $album;
    /**
     * 
     * @var unknown
     */
    private $file;
    /**
     * 
     * @return \Pasi\bibliotecaBundle\Entity\unknown
     */
    public function getFile(){
    	return $this->file;
    }
    /**
     * 
     * @param UploadedFile $file
     * @return UploadedFile
     */
    public function setFile(UploadedFile $file){
    	return $this->file = $file;
    }
    
    public function getAbsolutePath(){
    	if ($this->cancion == null) {
    		return null;
    	}
    	return $this->getUploadDir().'/'.$this->cancion;
    }
    public function getWebPath()
    {
    	if ($this->cancion ==null) {
    		return null;
    	}
    	return $this->getUploadDir().$this->cancion;
    }
    public function getUploadRootDir()
    {
    	return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    public function getUploadDir()
    {
    	return 'upload/canciones';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate
     */
    public function preUpload(){
    	if($this->file != null){
    		$this->cancion = $this->file->getClientOriginalName();
    	}
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload(){
    	if($this->file != null){
    			
    		$this->file->move($this->getUploadRootDir(),$this->cancion);
    
    		$this->file=null;
    	}
    }
    
    /**
     * @ORM\PostRemove()
     */
    public function remove(){
    	if($this->cancion != null){
    		unlink($this->getAbsolutePath());
    	}
    
    }
    public function __toString(){
    	return $this->titulo;
    }
    /**
     * this Construct
     */
    public function __construct(){
    	$this->creacion = new \DateTime();
    	$this->modificacion = new \DateTime();
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
     * @return Cancion
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
     * Set orden
     *
     * @param integer $orden
     * @return Cancion
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    
        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Cancion
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
     * Set letra
     *
     * @param string $letra
     * @return Cancion
     */
    public function setLetra($letra)
    {
        $this->letra = $letra;
    
        return $this;
    }

    /**
     * Get letra
     *
     * @return string 
     */
    public function getLetra()
    {
        return $this->letra;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     * @return Cancion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    
        return $this;
    }

    /**
     * Get duracion
     *
     * @return string 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set cancion
     *
     * @param string $cancion
     * @return Cancion
     */
    public function setCancion($cancion)
    {
        $this->cancion = $cancion;
    
        return $this;
    }

    /**
     * Get cancion
     *
     * @return string 
     */
    public function getCancion()
    {
        return $this->cancion;
    }

    /**
     * Set creacion
     *
     * @param \DateTime $creacion
     * @return Cancion
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
     * @return Cancion
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
     * Set album
     *
     * @param \Pasi\bibliotecaBundle\Entity\Album $album
     * @return Cancion
     */
    public function setAlbum(\Pasi\bibliotecaBundle\Entity\Album $album = null)
    {
        $this->album = $album;
    
        return $this;
    }

    /**
     * Get album
     *
     * @return \Pasi\bibliotecaBundle\Entity\Album 
     */
    public function getAlbum()
    {
        return $this->album;
    }
}