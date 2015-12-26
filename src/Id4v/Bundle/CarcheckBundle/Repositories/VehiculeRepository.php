<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 14/12/15
 * Time: 22:27
 */

namespace Id4v\Bundle\CarcheckBundle\Repositories;

use Doctrine\ORM\EntityRepository;
use Id4v\Bundle\CarcheckBundle\Entity\Vehicule;

class VehiculeRepository extends EntityRepository
{
    public function getAllEntretiensForVehicule(Vehicule $vehicule)
    {
        $table=$this->getEntityManager()->createQueryBuilder();
        $table
            ->select("e.date")
            ->addSelect("e.kilometrage")
            ->addSelect("SUM(e.total) as totals")
            ->from("Id4vCarcheckBundle:Entretien","e")
            ->where("e.vehicule = :vehicule")
            ->groupBy("e.date")
            ->addGroupBy("e.kilometrage")
            ->setParameter("vehicule",$vehicule);
        return $table->getQuery()->execute();
    }

    public function getRepartitionForVehicule(Vehicule $vehicule)
    {
        $table=$this->getEntityManager()->createQueryBuilder();
        $table
            ->select("t.name")
            ->addSelect("SUM(e.total) as totals")
            ->from("Id4vCarcheckBundle:Entretien","e")
            ->leftJoin('e.type','t')
            ->where("e.vehicule = :vehicule")
            ->groupBy("e.type")
            ->orderBy("t.name","asc")
            ->setParameter("vehicule",$vehicule);
        return $table->getQuery()->execute();
    }
}