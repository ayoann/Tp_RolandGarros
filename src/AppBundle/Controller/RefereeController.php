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
     * @Route("/get")
     * @Method({"GET", "POST"})
     */
    public function getAction()
    {
        $em = $this->getDoctrine()->getManager();
        $referees = $em->getRepository(Referee::class)->getAllReferee();

        return $this->render('AppBundle:admin/referee:delete.html.twig', array(
            'referees' =>$referees));
    }

    /**
     * Creates a new Referee entity.
     *
     * @Route("/add")
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
     * @Route("/delete/{id}")
     * @return Response
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $referee = $em->getRepository('AppBundle:Referee')->findOneBy(array('id' => $id));

        if (!$referee) {
            throw $this->createNotFoundException('No referee found for id '.$id);
        }

        $em->remove($referee);
        $em->flush();


        return $this->redirectToRoute('app_referee_get');
    }

}