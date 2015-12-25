<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 07/12/15
 * Time: 12:16
 */

namespace Id4v\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 *
 * @ORM\Entity()
 * @ORM\Table()
 */
class User extends BaseUser
{
    /**
     * @var
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    function __construct()
    {
        parent::__construct();
    }

}