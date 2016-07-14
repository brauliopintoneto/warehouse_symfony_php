<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="imei")
 */
class IMEI
{
    /**
     * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="cod_imei", type="string", length=50)
     */
    private $codImei;

    /**
     * @ORM\Column(name="product_id", type="integer")
     * @ORM\ManyToOne(targetEntity="Product")
     */    
    private $productId;

    /**
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\Column(name="master_id", type="integer")
     * @ORM\ManyToOne(targetEntity="Master")
     */
    private $masterId;
    
    /**
     * Product instance
     */
	private $product;
	
	/**
	 * Master instance
	 */
	private $master;
	
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codImei
     *
     * @param string $codImei
     *
     * @return IMEI
     */
    public function setCodImei($codImei)
    {
        $this->codImei = $codImei;

        return $this;
    }

    /**
     * Get codImei
     *
     * @return string
     */
    public function getCodImei()
    {
        return $this->codImei;
    }

    /**
     * Set productId
     * 
     * @param integer $productId
     *
     * @return IMEI
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return IMEI
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Set master id 
     * 
     * @param integer $masterId
     */
    public function setMasterId($masterId) {
    	$this->masterId = $masterId;
    	
    	return $this;
    }
    
    /**
     * Get master id
     */
    public function getMasterId() {
    	return $this->masterId;
    }
    
    /**
     * Set master instance
     * @param Master $master
     */
    public function setMaster($master) {
    	$this->master =  $master;
    }
    
    /**
     * Get Master instance
     */
    public function getMaster() {
    	return $this->master;
    }
    
    /**
     * Set the product 
     * 
     * @param Product $product
     */
    public function setProduct($product) {
    	$this->product = $product;
    }
    
    /**
     * Get the product
     * 
     * @return Product
     */
    public function getProduct() {
    	return $this->product;
    }
}

