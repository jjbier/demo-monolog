<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Events\OtherEvents;
use AppBundle\Events\ActionEvent;
use Symfony\Component\Security\Core\User\User;

class DefaultController extends Controller
{
    /**
     * @Route("/other", name="homepage_other")
     */
    public function indexAction(Request $request)
    {
        $this->container->get('event_dispatcher')->dispatch(OtherEvents::other_pre_index, new ActionEvent(new User('pepe','paco'),$request));
        // replace this example code with whatever you need
        $response =  $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
        $this->container->get('event_dispatcher')->dispatch(OtherEvents::other_pox_index, new ActionEvent(new User('foo','bar'),$request));

        return $response;
    }
}
