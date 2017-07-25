<?php

namespace deasilworks\cef\test\Model;

use deasilworks\cef\EntityModel;
use JMS\Serializer\Annotation\Exclude;

/**
 * Class UserModel.
 */
class UserModel extends EntityModel
{
    /**
     * Overridden to supply Table Name.
     *
     * @Exclude()
     *
     * @var string
     */
    protected $tableName = 'user';

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $email;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return UserModel
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return UserModel
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
