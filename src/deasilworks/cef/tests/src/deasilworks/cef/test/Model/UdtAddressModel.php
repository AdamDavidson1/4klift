<?php

namespace deasilworks\cef\test\Model;

use deasilworks\cef\EntityModel;

/**
 * Class UdtAddressModel.
 */
class UdtAddressModel extends EntityModel
{
    /**
     * @var string
     */
    protected $street; // text,

    /**
     * @var string
     */
    protected $street2; // text,

    /**
     * @var string
     */
    protected $city; // text,

    /**
     * @var string
     */
    protected $state; // text,

    /**
     * @var string
     */
    protected $zip; // text,

    /**
     * @var string
     */
    protected $country; // text

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     *
     * @return UdtAddressModel
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @param string $street2
     *
     * @return UdtAddressModel
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return UdtAddressModel
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return UdtAddressModel
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     *
     * @return UdtAddressModel
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return UdtAddressModel
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
