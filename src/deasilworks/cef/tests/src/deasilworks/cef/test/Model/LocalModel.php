<?php

/*
 * MIT License
 *
 * Copyright (c) 2017 Deasil Works, Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace deasilworks\cef\test\Model;

use deasilworks\CEF\EntityModel;
use JMS\Serializer\Annotation\Exclude;

/**
 * Class LocalModel.
 */
class LocalModel extends EntityModel
{
    /**
     * Overridden to supply Table Name.
     *
     * @Exclude()
     *
     * @var string
     */
    protected $tableName = 'local';

    /**
     * @var string
     */
    protected $key; // text,

    /**
     * @var string
     */
    protected $bootstrapped; // text,

    /**
     * @var string
     */
    protected $broadcastAddress; // inet,

    /**
     * @var string
     */
    protected $clusterName; // text,

    /**
     * @var string
     */
    protected $cqlVersion; // text,

    /**
     * @var string
     */
    protected $dataCenter; // text,

    /**
     * @var int
     */
    protected $gossipGeneration; // int,

    /**
     * @var string
     */
    protected $listenAddress; // inet,

    /**
     * @var string
     */
    protected $partitioner; // text,

    /**
     * @var string
     */
    protected $rack; // text,

    /**
     * @var string
     */
    protected $releaseVersion; // text,

    /**
     * @var string
     */
    protected $rpcAddress; // inet,

    /**
     * @var string
     */
    protected $thriftVersion;  // text,

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     *
     * @return LocalModel
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getBootstrapped()
    {
        return $this->bootstrapped;
    }

    /**
     * @param string $bootstrapped
     *
     * @return LocalModel
     */
    public function setBootstrapped($bootstrapped)
    {
        $this->bootstrapped = $bootstrapped;

        return $this;
    }

    /**
     * @return string
     */
    public function getBroadcastAddress()
    {
        return $this->broadcastAddress;
    }

    /**
     * @param string $broadcastAddress
     *
     * @return LocalModel
     */
    public function setBroadcastAddress($broadcastAddress)
    {
        $this->broadcastAddress = $broadcastAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getClusterName()
    {
        return $this->clusterName;
    }

    /**
     * @param string $clusterName
     *
     * @return LocalModel
     */
    public function setClusterName($clusterName)
    {
        $this->clusterName = $clusterName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCqlVersion()
    {
        return $this->cqlVersion;
    }

    /**
     * @param string $cqlVersion
     *
     * @return LocalModel
     */
    public function setCqlVersion($cqlVersion)
    {
        $this->cqlVersion = $cqlVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataCenter()
    {
        return $this->dataCenter;
    }

    /**
     * @param string $dataCenter
     *
     * @return LocalModel
     */
    public function setDataCenter($dataCenter)
    {
        $this->dataCenter = $dataCenter;

        return $this;
    }

    /**
     * @return int
     */
    public function getGossipGeneration()
    {
        return $this->gossipGeneration;
    }

    /**
     * @param int $gossipGeneration
     *
     * @return LocalModel
     */
    public function setGossipGeneration($gossipGeneration)
    {
        $this->gossipGeneration = $gossipGeneration;

        return $this;
    }

    /**
     * @return string
     */
    public function getListenAddress()
    {
        return $this->listenAddress;
    }

    /**
     * @param $listenAddress
     *
     * @return LocalModel
     */
    public function setListenAddress($listenAddress)
    {
        $this->listenAddress = $listenAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getPartitioner()
    {
        return $this->partitioner;
    }

    /**
     * @param string $partitioner
     *
     * @return LocalModel
     */
    public function setPartitioner($partitioner)
    {
        $this->partitioner = $partitioner;

        return $this;
    }

    /**
     * @return string
     */
    public function getRack()
    {
        return $this->rack;
    }

    /**
     * @param string $rack
     *
     * @return LocalModel
     */
    public function setRack($rack)
    {
        $this->rack = $rack;

        return $this;
    }

    /**
     * @return string
     */
    public function getReleaseVersion()
    {
        return $this->releaseVersion;
    }

    /**
     * @param $releaseVersion
     *
     * @return LocalModel
     */
    public function setReleaseVersion($releaseVersion)
    {
        $this->releaseVersion = $releaseVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getRpcAddress()
    {
        return $this->rpcAddress;
    }

    /**
     * @param string $rpcAddress
     *
     * @return LocalModel
     */
    public function setRpcAddress($rpcAddress)
    {
        $this->rpcAddress = $rpcAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getThriftVersion()
    {
        return $this->thriftVersion;
    }

    /**
     * @param string $thriftVersion
     *
     * @return LocalModel
     */
    public function setThriftVersion($thriftVersion)
    {
        $this->thriftVersion = $thriftVersion;

        return $this;
    }
}
