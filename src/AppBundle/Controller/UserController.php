<?php


namespace AppBundle\Controller;


use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Route("user/enable", name="user_enable")
     */
    public function feedAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->query->get('id');
        $user =
            $em->getRepository(User::class)->find($id);

        $menu = ['Mutton', 'Chicken', 'IceCream', 'Fish'];
        $meal = $menu[random_int(0,3)];

        $this->addFlash('info',$user->feed([$meal]));

        return $this->redirectToRoute('easyadmin', [
            'action' => 'show',
            'entity' => $request->query->get('entity'),
            'id' => $id,
        ]);

    }
}