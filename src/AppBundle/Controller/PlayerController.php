<?php
/**
 * Created by PhpStorm.
 * User: Marie
 * Date: 27/09/2017
 * Time: 09:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use AppBundle\Form\PlayerType;
use AppBundle\Service\DAO\PlayerDAO;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class PlayerController
 * @package AppBundle\Controller
 * @Route("admin")
 */
class PlayerController extends Controller {

    /**
     * Create a new player
     * @Route("/addPlayer")
     * @Method({"GET", "POST"})
     */
    public function addPlayerAction(Request $request) {
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $playerDAO = new PlayerDAO($em);
            $playerDAO->savePlayer($player);

            return $this->redirectToRoute('app_admin_index');
        }
        return $this->render('AppBundle:admin/player:addPlayer.html.twig', array(
            'player' => $player,
            'form' => $form->createView(),
        ));
    }

}