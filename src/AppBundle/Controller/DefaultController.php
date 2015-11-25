<?php

namespace AppBundle\Controller;

use AppBundle\Events\ActionEvent;
use AppBundle\Events\DefaultEvents;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\User\User;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $this->container->get('event_dispatcher')->dispatch(DefaultEvents::default_pre_index, new ActionEvent(new User('pepe','pepe'),$request));
        // replace this example code with whatever you need
        $response = $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
        $this->container->get('event_dispatcher')->dispatch(DefaultEvents::default_pre_index, new ActionEvent(new User('pepe','pepe'), $request));
        return $response;
    }
}
