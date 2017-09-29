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
     * Get players
     *
     * @Route("/getPlayers")
     * @Method({"GET", "POST"})
     */
    public function getAction(Request $request) {

        //Get playerDAO
        $playerDAO = $this->get(PlayerDAO::class);
        $players = $playerDAO->getAllPlayersWithTeams();

        //Render view with players list and delete action
        return $this->render('AppBundle:admin/player:deletePlayer.html.twig', array(
            'players' =>$players));
    }

    /**
     * Create a new player
     *
     * @Route("/addPlayer")
     * @Method({"GET", "POST"})
     */
    public function addPlayerAction(Request $request) {
        //Form creation
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        //If form is submitted, redirect to admin page
        if ($form->isSubmitted() && $form->isValid()) {
            //Get playerDAO
            $playerDAO = $this->get(PlayerDAO::class);
            $playerDAO->savePlayer($player);

            // Redirect to admin page
            return $this->redirectToRoute('app_admin_index');
        }
        //Render form player to add it in database
        return $this->render('AppBundle:admin/player:addPlayer.html.twig', array(
            'player' => $player,
            'form' => $form->createView(),
        ));
    }

    /**
     * Delete a player
     *
     * @Route("/deletePlayer/{id}")
     * @param $id
     * @return Response
     */
    public function deletePlayerAction($id) {

        //Get playerDAO
        $playerDAO = $this->get(PlayerDAO::class);
        $player = $playerDAO->getPlayerById($id);

        if (!$player) {
            throw $this->createNotFoundException('No player found for this id '.$id);
        }
        //if player exist, remove player with specific id
        else {
            $playerDAO->removePlayer($player);
            return $this->redirectToRoute('app_player_get');
        }

    }

}