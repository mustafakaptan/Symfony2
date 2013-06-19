<?php

namespace Enuygun\FeedbackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Topic
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Topic
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    
    /**
     * @ORM\OneToMany(targetEntity="Issue", mappedBy="topic")
     */
 
    protected $issues;
    
    /**
     * @ORM\OneToMany(targetEntity="Feedback", mappedBy="topic")
     */
 
    protected $feedbacks;
    
    public function __construct() {
        $this->issues = new ArrayCollection();
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
     * @return Topic
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
    
    public function getIssues() {
        return $this->issues;
    }

    public function setIssues($issues) {
        $this->issues = $issues;
    }

    
    public function addIssue($issue) {
        if($this->issues->contains($issue) === false) {
            $this->issues->add($issue);
        }
        $issue->setTopic($this);
    }

    public function removeIssue($issue) {
        if($this->issues->contains($issue) === true) {
            $this->issues->remove($issue);
        }
        $issue->setTopic(null);
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
        $feedback->setTopic($this);
    }

    public function removeFeedback($feedback) {
        if($this->feedbacks->contains($feedback) === true) {
            $this->feedbacks->remove($feedback);
        }
        $feedback->setTopic(null);
    }

}
