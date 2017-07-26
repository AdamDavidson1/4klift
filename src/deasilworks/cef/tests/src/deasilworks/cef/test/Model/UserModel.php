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
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var UdtAddressModel
     */
    protected $address;

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return UserModel
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return UserModel
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

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

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return UserModel
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return \deasilworks\cef\test\Model\UdtAddressModel
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \deasilworks\cef\test\Model\UdtAddressModel $address
     *
     * @return UserModel
     */
    public function setAddress(UdtAddressModel $address)
    {
        $this->address = $address;

        return $this;
    }
}
