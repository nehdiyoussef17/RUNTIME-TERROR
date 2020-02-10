<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Utilisateurs\UtilisateursBundle\Entity\reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reservation controller.
 *
 * @Route("annotation")
 */
class reservationController extends Controller
{
    /**
     * Lists all reservation entities.
     *
     * @Route("/", name="annotation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('UtilisateursUtilisateursBundle:reservation')->findAll();

        return $this->render('reservation/index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new reservation entity.
     *
     * @Route("/new", name="annotation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm('Utilisateurs\UtilisateursBundle\Form\reservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('annotation_show', array('id' => $reservation->getId()));
        }

        return $this->render('@UtilisateursUtilisateurs/reservations/createReservation.html.twig', array(
            'reservation' => $reservation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     * @Route("/{id}", name="annotation_show")
     * @Method("GET")
     */
    public function showAction(reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('@UtilisateursUtilisateurs/reservations/showReservation.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservation entity.
     *
     * @Route("/{id}/edit", name="annotation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('Utilisateurs\UtilisateursBundle\Form\reservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('annotation_edit', array('id' => $reservation->getId()));
        }

        return $this->render('@UtilisateursUtilisateurs/reservations/showReservation.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservation entity.
     *
     * @Route("/{id}", name="annotation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, reservation $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('@UtilisateursUtilisateurs/reservations/showReservation.html.twig');
    }

    /**
     * Creates a form to delete a reservation entity.
     *
     * @param reservation $reservation The reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('annotation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
