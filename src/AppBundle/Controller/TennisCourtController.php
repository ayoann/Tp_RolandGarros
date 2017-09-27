<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 27/09/2017
 * Time: 10:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\TennisCourt;
use AppBundle\Form\TennisCourtType;
use AppBundle\Service\DAO\TennisCourtDAO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TennisCourtController extends Controller
{
    /**
     * @Route("/addTennisCourt")
     * @return Response
     */
    public function addAction(Request $request)
    {
        // create index's view of the admin area
        //return $this->render('AppBundle:admin/tennisCourt:addTennisCourt.html.twig');


        //=====================================================
        //=====================================================

        $tennisCourt = new TennisCourt();
        $form = $this->createForm(TennisCourtType::class, $tennisCourt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$em = $this->getDoctrine()->getManager();

            $tennisCourtDAO = $this->get(TennisCourtDAO::class);
            $tennisCourtDAO->saveTennisCourt($tennisCourt);

            return $this->redirectToRoute( 'app_admin_index');
        }

        return $this->render('AppBundle:admin/tennisCourt:addTennisCourt.html.twig', array(
            'tennisCourt' => $tennisCourt,
            'form' => $form->createView(),
        ));
    }
}