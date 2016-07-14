<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="warehouse_master")
 */
class WarehouseMaster
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
     * @ORM\Column(name="master_id", type="integer")
     * @ORM\ManyToOne(targetEntity="Master")
	 */
    private $masterId;

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
     * @return WarehouseMaster
     */
    public function setWarehouseId($warehouseId)
    {
        $this->warehouseId = $warehouseId;

        return $this;
    }

    /**
     * Get warehouseId
     *
     * @return int
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * Set masterId
     *
     * @param integer $masterId
     *
     * @return WarehouseMaster
     */
    public function setMasterId($masterId)
    {
        $this->masterId = $masterId;

        return $this;
    }

    /**
     * Get masterId
     *
     * @return int
     */
    public function getMasterId()
    {
        return $this->masterId;
    }

    /**
     * Set initialDate
     *
     * @param \DateTime $initialDate
     *
     * @return WarehouseMaster
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
     * @return WarehouseMaster
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

