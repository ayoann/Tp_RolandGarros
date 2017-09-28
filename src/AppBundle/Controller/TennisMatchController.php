<?php


namespace AppBundle\Controller;
use AppBundle\Entity\TennisMatch;
use AppBundle\Form\MatchSimpleType;
use AppBundle\Service\DAO\MatchDAO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class RefereeController
 * @package AppBundle\Controller
 * @Route("tennisMatch")
 */
class TennisMatchController extends Controller
{
    /**
     * Creates a new Referee entity.
     *
     * @Route("/add")
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request)
    {
        $matchDuo = new TennisMatch();
        $form = $this->createForm(MatchSimpleType::class, $matchDuo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $refereeDAO = $this->get(MatchDAO::class);
            $refereeDAO->saveDuoMatch($matchDuo);

            return $this->render('AppBundle:admin:index.html.twig');
        }

        return $this->render('AppBundle:admin/tennisMatch:new.html.twig', array(
            'matchDuo' => $matchDuo,
            'form' => $form->createView(),
        ));
    }

}