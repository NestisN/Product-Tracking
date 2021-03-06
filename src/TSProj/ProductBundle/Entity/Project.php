<?php

namespace TSProj\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="TSProj\ProductBundle\Entity\ProjectRepository")
 */
class Project
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
     * @ORM\Column(name="project_name", type="string", length=255)
     */
    private $projectName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="project_barcode", type="string", length=255)
     */
    private $projectBarcode;

    /**
     * @var float
     * 
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;
    
    /**
     * @var string
     *
     * @ORM\Column(name="project_delivery_address", type="string", length=255)
     */
    private $projectDeliveryAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="project_contact_phone_no", type="string", length=45)
     */
    private $projectContactPhoneNo;
 
    /**
     * @var \Date
     *
     * @ORM\Column(name="order_date", type="date")
     */
    private $orderDate;
    
    /**
     * @var \Date
     *
     * @ORM\Column(name="expected_delivery_date", type="date")
     */
    private $expectedDeliveryDate;
    
    /**
     * @var \Date
     *
     * @ORM\Column(name="project_start_date", type="date")
     */
    private $projectStartDate;

    /**
     * @var \Date
     *
     * @ORM\Column(name="project_end_date", type="date")
     */
    private $projectEndDate;

    /**
     * @var float
     *
     * @ORM\Column(name="project_time_consuming", type="float",nullable=true)
     */
    private $projectTimeConsuming;

    /**
     * @ORM\ManyToOne(targetEntity="TSProj\PeopleBundle\Entity\Client",inversedBy="project")
     **/
    private $client;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Product", mappedBy="project")
     **/
    private $product;
    
    /** 
     * @var boolean
     * 
     * @ORM\Column(name="delete_flag",type="boolean")
     */
    private $deleteFlag=0;
    
    /** 
     * @var boolean
     * 
     * @ORM\Column(name="finished_flag",type="boolean")
     */
    private $finishedFlag=0;
    
    /** 
     * @var datetime
     * 
     * @ORM\Column(name="last_maint_dt_time",type="datetime",nullable=true)
     */
    private $lastMaintDateTime;
    
    /**
     * @ORM\ManyToOne(targetEntity="WorkStatus",inversedBy="project")
     **/
    private $projectStatus;
    
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
     * Set projectName
     *
     * @param string $projectName
     * @return Project
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set projectDeliveryAddress
     *
     * @param string $projectDeliveryAddress
     * @return Project
     */
    public function setProjectDeliveryAddress($projectDeliveryAddress)
    {
        $this->projectDeliveryAddress = $projectDeliveryAddress;

        return $this;
    }

    /**
     * Get projectDeliveryAddress
     *
     * @return string 
     */
    public function getProjectDeliveryAddress()
    {
        return $this->projectDeliveryAddress;
    }

    /**
     * Set projectContactPhoneNo
     *
     * @param string $projectContactPhoneNo
     * @return Project
     */
    public function setProjectContactPhoneNo($projectContactPhoneNo)
    {
        $this->projectContactPhoneNo = $projectContactPhoneNo;

        return $this;
    }

    /**
     * Get projectContactPhoneNo
     *
     * @return string 
     */
    public function getProjectContactPhoneNo()
    {
        return $this->projectContactPhoneNo;
    }

    /**
     * Set projectStartDate
     *
     * @param \DateTime $projectStartDate
     * @return Project
     */
    public function setProjectStartDate($projectStartDate)
    {
        $this->projectStartDate = $projectStartDate;

        return $this;
    }

    /**
     * Get projectStartDate
     *
     * @return \DateTime 
     */
    public function getProjectStartDate()
    {
        return $this->projectStartDate;
    }

    /**
     * Set projectEndDate
     *
     * @param \DateTime $projectEndDate
     * @return Project
     */
    public function setProjectEndDate($projectEndDate)
    {
        $this->projectEndDate = $projectEndDate;

        return $this;
    }

    /**
     * Get projectEndDate
     *
     * @return \DateTime 
     */
    public function getProjectEndDate()
    {
        return $this->projectEndDate;
    }

    /**
     * Set projectTimeConsuming
     *
     * @param float $projectTimeConsuming
     * @return Project
     */
    public function setProjectTimeConsuming($projectTimeConsuming)
    {
        $this->projectTimeConsuming = $projectTimeConsuming;

        return $this;
    }

    /**
     * Get projectTimeConsuming
     *
     * @return float 
     */
    public function getProjectTimeConsuming()
    {
        return $this->projectTimeConsuming;
    }

    /**
     * Set client
     *
     * @param \TSProj\PeopleBundle\Entity\Client $client
     * @return Project
     */
    public function setClient(\TSProj\PeopleBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \TSProj\PeopleBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \TSProj\ProductBundle\Entity\Product $product
     * @return Project
     */
    public function addProduct(\TSProj\ProductBundle\Entity\Product $product)
    {
        $this->product[] = $product;
        $product->setProject($this);
        return $this;
    }

    /**
     * Remove product
     *
     * @param \TSProj\ProductBundle\Entity\Product $product
     */
    public function removeProduct(\TSProj\ProductBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Project
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set orderDate
     *
     * @param \DateTime $orderDate
     * @return Project
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime 
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set deleteFlag
     *
     * @param boolean $deleteFlag
     * @return Project
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Get deleteFlag
     *
     * @return boolean 
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Set finishedFlag
     *
     * @param boolean $finishedFlag
     * @return Project
     */
    public function setFinishedFlag($finishedFlag)
    {
        $this->finishedFlag = $finishedFlag;

        return $this;
    }

    /**
     * Get finishedFlag
     *
     * @return boolean 
     */
    public function getFinishedFlag()
    {
        return $this->finishedFlag;
    }

    /**
     * Set lastMaintDateTime
     *
     * @param \DateTime $lastMaintDateTime
     * @return Project
     */
    public function setLastMaintDateTime($lastMaintDateTime)
    {
        $dateTime = new \DateTime();
        if($lastMaintDateTime){
            $this->lastMaintDateTime = $lastMaintDateTime;
        }else{
            $this->lastMaintDateTime = $dateTime;
        }

        return $this;
    }

    /**
     * Get lastMaintDateTime
     *
     * @return \DateTime 
     */
    public function getLastMaintDateTime()
    {
        return $this->lastMaintDateTime;
    }

    /**
     * Set projectBarcode
     *
     * @param string $projectBarcode
     * @return Project
     */
    public function setProjectBarcode($projectBarcode)
    {
        $this->projectBarcode = $projectBarcode;

        return $this;
    }

    /**
     * Get projectBarcode
     *
     * @return string 
     */
    public function getProjectBarcode()
    {
        return $this->projectBarcode;
    }

    /**
     * Set projectStatus
     *
     * @param \TSProj\ProductBundle\Entity\WorkStatus $projectStatus
     * @return Project
     */
    public function setProjectStatus(\TSProj\ProductBundle\Entity\WorkStatus $projectStatus = null)
    {
        $this->projectStatus = $projectStatus;

        return $this;
    }

    /**
     * Get projectStatus
     *
     * @return \TSProj\ProductBundle\Entity\WorkStatus 
     */
    public function getProjectStatus()
    {
        return $this->projectStatus;
    }

    /**
     * Set expectedDeliveryDate
     *
     * @param \DateTime $expectedDeliveryDate
     * @return Project
     */
    public function setExpectedDeliveryDate($expectedDeliveryDate)
    {
        $this->expectedDeliveryDate = $expectedDeliveryDate;

        return $this;
    }

    /**
     * Get expectedDeliveryDate
     *
     * @return \DateTime 
     */
    public function getExpectedDeliveryDate()
    {
        return $this->expectedDeliveryDate;
    }
}
