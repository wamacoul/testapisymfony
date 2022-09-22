<?php
namespace App\Events;

use App\Entity\User;
use App\Service\DateServiceUtils;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DateUser implements EventSubscriberInterface{
    private $security;
    private $repositoty;
    public function __construct(Security $security, UserRepository $repositoty)
    {
        $this->security=$security;
        $this->repositoty=$repositoty;
    }
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setDate', EventPriorities::PRE_VALIDATE]
            
        ];
    }
    public function setDate(ViewEvent $event){
       $user =$event->getControllerResult();
       $method = $event->getRequest()->getMethod();
       if($user instanceof User && $method ==="POST"){
            $user->setCreatedAt(DateServiceUtils::getCurrentDate());
       }
    }

}