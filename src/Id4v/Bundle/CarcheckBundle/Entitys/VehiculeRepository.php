<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 15/11/15
 * Time: 17:53
 */

namespace Id4v\Bundle\CarcheckBundle\Entity;


use Doctrine\ORM\EntityRepository;

class VehiculeRepository extends EntityRepository
{
    /**
     * @param $vehicule Vehicule
     */
    public function getAllEntretiensForVehicule(Vehicule $vehicule)
    {
        $qb=$this->getEntityManager()->createQueryBuilder();
        $qb->from("Id4vCarcheckBundle:Entretien","e")
            ->select("SUM(e.total) grand_total,e.kilometrage, e.date")
            ->where("e.vehicule = ".$vehicule->getId())
            ->groupBy("e.date,e.kilometrage")
        ;

        return $qb->getQuery()->execute();
    }


}