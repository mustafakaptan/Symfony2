<?php

namespace Enuygun\FeedbackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Enuygun\FeedbackBundle\Entity\Feedback;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="feedback_index")
     * @Template()
     */
    public function indexAction()
    {
        $feedback = new Feedback();
        
       
    
            
              $form = $this->createFormBuilder($feedback)
           ->add('rating', 'choice', array("choices" => array('1', '2', '3', '4', '5')))
          ->add('topic', 'choice')
           ->add('issue', 'choice')
           ->add('message', 'text')
            ->getForm();
        
       return $this->render('EnuygunFeedbackBundle::feedbackform.html.twig',array('form'=> $form->createView()));
        
//        
//        $form = $this->createFormBuilder($feedback)
//            ->add('firstName', 'text')
//            ->add('lastname', 'text')
//            ->add('email', 'text')
//            ->add('emailListCheck', 'checkbox', array('label'     => 'E-posta listesine ekle') )
//            ->getForm();
//        
//        return $this->render('EnuygunFeedbackBundle::feedbackform.html.twig',array('form'=> $form->createView()));
        
    }
}
