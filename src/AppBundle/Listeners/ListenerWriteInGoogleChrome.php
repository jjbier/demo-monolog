<?php
/*
 * This file (ListenerWriteInGoogleChrome.php) is part of the monolog-sf project.
 *
 * 2014 (c) jjbier@gmail.com.
 * Created by Xabier Fernández Rodríguez <jjbier@gmail.com>
 * Date: 25/11/2015 - 22:20
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace AppBundle\Listeners;


use AppBundle\Events\ActionEvent;
use AppBundle\Events\DefaultEvents;
use AppBundle\Events\OtherEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;

class ListenerWriteInGoogleChrome implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ListenerWriteInStdOut constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            DefaultEvents::default_pre_index => 'onCustomListener',
            DefaultEvents::default_pre_index => 'onCustomListener',
            OtherEvents::other_pre_index => 'onCustomListener',
            OtherEvents::other_pox_index => 'onCustomListener'
        );
    }

    public function onCustomListener(ActionEvent $event)
    {
        $user = $event->getUser();
        $request = $event->getRequest();

        $this->logger->info('--------------------------------- > The user with name: '.$user->getUsername() .' goint to '.$request->getUri(). '--------------------------------->');
        $this->logger->debug(json_encode($request->headers->all()));
    }

}