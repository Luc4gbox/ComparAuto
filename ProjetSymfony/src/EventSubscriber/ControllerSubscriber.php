<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Repository\ConstructeurRepository;
use App\Repository\CategorieRepository;

class ControllerSubscriber implements EventSubscriberInterface
{
    private $constructeurRepository;
    private $categorieRepository;

    public function __construct(ConstructeurRepository $constructeurRepository, CategorieRepository $categorieRepository)
    {
        $this->constructeurRepository = $constructeurRepository;
        $this->categorieRepository = $categorieRepository;
    }

    public function onControllerEvent(ControllerEvent $event)
    {
        $controller = $event->getController();
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        if (method_exists($controller, 'setConstructeurs')) {
            $constructeurs = $this->constructeurRepository->findAll();
            $controller->setConstructeurs($constructeurs);
        }

        if (method_exists($controller, 'setCategories')) {
            $categories = $this->categorieRepository->findAll();
            $controller->setCategories($categories);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onControllerEvent',
        ];
    }
}