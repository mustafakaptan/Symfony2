<?php

namespace Enuygun\FeedbackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Issue
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Issue
{
   
    /**
     * @ORM\ManyToOne(targetEntity="Topic", inversedBy="issues")
     * @ORM\JoinColumn(name="topic_id", referencedColumnName="id")
     * 
     */
    protected $topic;
    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Feedback", mappedBy="issue")
     */
 
    protected $feedbacks;
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    public function __construct() {
        $this->feedbacks = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Issue
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    public function getTopic() {
        return $this->topic;
    }

    public function setTopic($topic) {
        $this->topic = $topic;
    }

    public function getFeedbacks() {
        return $this->feedbacks;
    }

    public function setFeedbacks($feedbacks) {
        $this->feedbacks = $feedbacks;
    }

    public function addFeedback($feedback) {
        if($this->feedbacks->contains($feedback) === false) {
            $this->feedbacks->add($feedback);
        }
        $feedback->setIssue($this);
    }

    public function removeFeedback($feedback) {
        if($this->feedbacks->contains($feedback) === true) {
            $this->feedbacks->remove($feedback);
        }
        $feedback->setIssue(null);
    }

    
}
