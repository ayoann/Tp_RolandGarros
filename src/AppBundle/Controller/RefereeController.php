<?php

namespace AppBundle\Controller;

use AppBundle\Service\DAO\RefereeDAO;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Referee;
use AppBundle\Form\RefereeType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Class RefereeController
 * @package AppBundle\Controller
 * @Route("referee")
 */
class RefereeController extends Controller
{

    /**
     * Creates a new Referee entity.
     *
     * @Route("/")
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request)
    {
        $referee = new Referee();
        $form = $this->createForm(RefereeType::class, $referee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $refereeDAO = new RefereeDAO($em);
            $refereeDAO->saveReferee($referee);

            return $this->render('AppBundle:admin:index.html.twig');
        }

        return $this->render('AppBundle:admin/referee:new.html.twig', array(
            'referee' => $referee,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/")
     * @return Response
     */
    public function deleteAction()
    {
        return $this->render('AppBundle:admin/referee:new.html.twig');
    }

}