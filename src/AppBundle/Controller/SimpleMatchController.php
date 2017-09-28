<?php
/**
 * Created by PhpStorm.
 * User: AsusG74S
 * Date: 27/09/2017
 * Time: 10:19
 */

namespace AppBundle\Controller;

use AppBundle\Service\DAO\MatchDAO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\TennisMatch;
use AppBundle\Form\simpleMatchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class SimpleMatchController
 * @package AppBundle\Controller
 * @Route("simpleMatch")
 */
class SimpleMatchController extends Controller
{
    /**
     * @Route("/")
     * @return Response
     */
    public function indexAction()
    {
        // create index's view of the admin area
        return $this->render('AppBundle:admin/TennisMatch:simpleMatch.html.twig');
    }

    /**
     * Creates a new TennisMatch entity.
     *
     * @Route("/add")
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request)
    {
        $simpleMatch = new TennisMatch();
        $form = $this->createForm(simpleMatchType::class, $simpleMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $matchDAO = $this->get(MatchDAO::class);
            $matchDAO->saveMatch($simpleMatch);

            return $this->redirectToRoute('app_admin_index');
        }

        return $this->render('AppBundle:admin/TennisMatch:simpleMatch.html.twig', array(
            'simpleMatch' => $simpleMatch,
            'form' => $form->createView(),
        ));
    }
}
