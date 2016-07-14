<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="master")
 */
class Master
{
    /**
     * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="master_code", type="string", length=50)
     */
    private $masterCode;

    /**
     * @var int
     * @ORM\Column(name="status_id", type="integer")
     */
    private $statusId;

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
     * Set masterCode
     *
     * @param string $masterCode
     *
     * @return Master
     */
    public function setMasterCode($masterCode)
    {
        $this->masterCode = $masterCode;

        return $this;
    }

    /**
     * Get masterCode
     *
     * @return string
     */
    public function getMasterCode()
    {
        return $this->masterCode;
    }
    
    /**
     * Set masterCode
     *
     * @param integer $status
     *
     * @return Master
     */
    public function setStatus($status)
    {
    	$this->statusId = $status;
    
    	return $this;
    }
    
    /**
     * Get Status Id
     *
     * @return integer
     */
    public function getStatus()
    {
    	return $this->statusId;
    }
    
}

