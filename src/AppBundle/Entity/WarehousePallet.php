<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="warehouse_pallet")
 */
class WarehousePallet
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
     * @ORM\Column(name="pallet_id", type="integer")
     * @ORM\ManyToOne(targetEntity="Pallet")
     */
    private $palletId;

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

