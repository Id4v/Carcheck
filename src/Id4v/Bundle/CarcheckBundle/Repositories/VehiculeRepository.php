<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 14/12/15
 * Time: 22:27
 */

namespace Id4v\Bundle\CarcheckBundle\Repositories;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Id4v\Bundle\CarcheckBundle\Document\Vehicule;

class VehiculeRepository extends DocumentRepository
{
    public function getAllEntretiensForVehicule(Vehicule $vehicule)
    {

    }
}