<?php
/*
 * This file (ActionEvent.php) is part of the monolog-sf project.
 *
 * 2014 (c) jjbier@gmail.com.
 * Created by Xabier Fernández Rodríguez <jjbier@gmail.com>
 * Date: 25/11/2015 - 22:07
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace AppBundle\Events;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
class ActionEvent extends Event
{
    /**
     * @var UserInterface
     */
    private $user;
    /**
     * @var Request
     */
    private $request;

    /**
     * ActionEvent constructor.
     * @param UserInterface $user
     * @param Request $request
     */
    public function __construct(UserInterface $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }


}