<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="warehouse_imei")
 */
class WarehouseIMEI
{
    /**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    private $id;

    /**
     * @ORM\Column(name="warehouse_source_id", type="integer")
     * @ORM\ManyToOne(targetEntity="Warehouse")
     */
    private $warehouseSourceId;

    /**
     * @ORM\Column(name="warehouse_dest_id", type="integer")
     * @ORM\ManyToOne(targetEntity="Warehouse")
     */
    private $warehouseDestId;    
    
    /**
     * @ORM\Column(name="imei_id", type="integer")
     * @ORM\ManyToOne(targetEntity="IMEI")
     */
    private $imeiId;

    /**
     * @ORM\Column(name="transport_id", type="integer")
     * @ORM\ManyToOne(targetEntity="Transporter")
     */
    private $transportId;
    
    /**
     * @ORM\Column(name="initial_date", type="datetime")
     */
    private $initialDate;

    /**
     * @ORM\Column(name="final_date", type="datetime")
     */
    private $endDate;


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
     * Set warehouseId
     *
     * @param integer $warehouseId
     *
     * @return WarehouseIMEI
     */
    public function setWarehouseSourceId($warehouseId)
    {
        $this->warehouseSourceId = $warehouseId;

        return $this;
    }

    /**
     * Get warehouseId
     *
     * @return int
     */
    public function getWarehouseSourceId()
    {
        return $this->warehouseSourceId;
    }

    /**
     * Set warehouseId
     *
     * @param integer $warehouseId
     *
     * @return WarehouseIMEI
     */
    public function setWarehouseDestId($warehouseId)
    {
    	$this->warehouseDestId = $warehouseId;
    
    	return $this;
    }
    
    /**
     * Get warehouseId
     *
     * @return int
     */
    public function getWarehouseDestId()
    {
    	return $this->warehouseDestId;
    }
    
    /**
     * Set imeiId
     *
     * @param integer $imeiId
     *
     * @return WarehouseIMEI
     */
    public function setImeiId($imeiId)
    {
        $this->imeiId = $imeiId;

        return $this;
    }

    /**
     * Get imeiId
     *
     * @return int
     */
    public function getImeiId()
    {
        return $this->imeiId;
    }

    /**
     * Set transportId
     *
     * @param integer $transportId
     *
     * @return WarehouseIMEI
     */
    public function setTransportId($transportId)
    {
    	$this->transportId = $transportId;
    
    	return $this;
    }
    
    /**
     * Get transportId
     *
     * @return int
     */
    public function getTransportId()
    {
    	return $this->transportId;
    }
    
    
    
    /**
     * Set initialDate
     *
     * @param \DateTime $initialDate
     *
     * @return WarehouseIMEI
     */
    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;

        return $this;
    }

    /**
     * Get initialDate
     *
     * @return \DateTime
     */
    public function getInitialDate()
    {
        return $this->initialDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return WarehouseIMEI
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}

