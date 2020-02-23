<?php

namespace Utilisateurs\UtilisateursBundle\Repository;

/**
 * reservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class reservationRepository extends \Doctrine\ORM\EntityRepository
{

    public function myfindAll()
    {
        $query=$this->getEntityManager()->createQuery("SELECT i FROM UtilisateursUtilisateursBundle:Reservation i 
WHERE i.etat='non traite'");
        return $query->getResult();
    }
    public function myfindAllarchive()
    {
        $query=$this->getEntityManager()->createQuery("SELECT i FROM UtilisateursUtilisateursBundle:Reservation i 
WHERE i.etat!='non traite'");
        return $query->getResult();
    }
}
