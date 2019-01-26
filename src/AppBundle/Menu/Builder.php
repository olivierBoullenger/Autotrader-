<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 24/01/19
 * Time: 10:40
 */

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class','nav navbar-nav');
        $menu->addChild('Home', ['route' => 'homepage']);
        $menu->addChild('Offer',['route' => 'offer']);
        $menu->addChild('Manage Cars', ['route' => 'car_index']);
        return $menu;
    }
}