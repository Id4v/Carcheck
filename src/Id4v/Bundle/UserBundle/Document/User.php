<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 07/12/15
 * Time: 12:16
 */

namespace Id4v\Bundle\UserBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as Mongo;
use FOS\UserBundle\Document\User as BaseUser;

/**
 * Class User
 * @package Id4v\Bundle\UserBundle\Document
 *
 * @Mongo\Document(collection="User")
 *
 */
class User extends BaseUser
{
    /**
     * @var
     * @Mongo\Id(strategy="auto")
     */
    protected $id;

    function __construct()
    {
        parent::__construct();
    }

}