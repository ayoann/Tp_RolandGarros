<?php

namespace AppBundle\Controller;

use AppBundle\Service\DAO\MatchDAO;
use AppBundle\Service\DAO\TournamentDAO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @return Response
     */
    public function indexAction()
    {
        // get service of TennisMatch and tournament
        /** @var MatchDAO $tennisMatchDao */
        $tennisMatchDao = $this->get(MatchDAO::class);
        /** @var TournamentDAO $tournamentDao */
        $tournamentDao = $this->get(TournamentDAO::class);

        // get all the match to display
        $listeOfMatchs = $tennisMatchDao->getAllMatchsScored();

        // get liste of all tournament
        $listeOfTournament = $tournamentDao->getAllTournament();

        // create index's view of the application
        return $this->render('AppBundle:default:index.html.twig', [
            "listeOfMatchs" => $listeOfMatchs,
            "listeOfTournament" => $listeOfTournament,
        ]);
    }
}
