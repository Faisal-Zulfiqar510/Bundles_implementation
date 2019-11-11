<?php


namespace AppBundle\Twig;


use AppBundle\Entity\User;

class EasyAdminExtension extends \Twig_Extension
{
    public function getFilters()
    {

        return [
            new \Twig_SimpleFilter(
                'filter_admin_actions',
                [$this, 'filterActions']
            )
        ];
    }

    public function filterActions(array $itemAction, $item)
    {
        if ($item instanceof User && $item->IsEnabled()) {
            unset($itemAction['delete']);
        }

        return $itemAction;

    }


}