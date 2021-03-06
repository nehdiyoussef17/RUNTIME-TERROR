<?php

namespace FeedBackBundle\Repository;

/**
 * ReclammationsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReclammationsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByEtat($etat){
        $Query=$this->getEntityManager()->createQuery(
            "select A from FeedBackBundle:Reclammations A where A.etat like :etat"
        )
            ->setParameter('etat',$etat);
        return $Query->getResult();
    }
}
