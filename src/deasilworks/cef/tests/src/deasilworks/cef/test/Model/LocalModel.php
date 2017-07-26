<?php

namespace deasilworks\cef\test\Model;

use deasilworks\cef\EntityModel;
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
    protected $hostId; // uuid,

    /**
     * @var string
     */
    protected $listenAddress; // inet,

    /**
     * @var string
     */
    protected $nativeProtocolVersion; // text,

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
    protected $schemaVersion; // uuid,

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
        return $this->data_center;
    }

    /**
     * @param string $data_center
     *
     * @return LocalModel
     */
    public function setDataCenter($data_center)
    {
        $this->data_center = $data_center;

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
    public function getHostId()
    {
        return $this->hostId;
    }

    /**
     * @param $hostId
     * @return LocalModel
     */
    public function setHostId($hostId)
    {
        $this->hostId = $hostId;

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
     * @return LocalModel
     * @internal param string $listen_address
     *
     */
    public function setListenAddress($listenAddress)
    {
        $this->listenAddress = $listenAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getNativeProtocolVersion()
    {
        return $this->nativeProtocolVersion;
    }

    /**
     * @param $nativeProtocolVersion
     * @return LocalModel
     * @internal param string $native_protocol_version
     *
     */
    public function setNativeProtocolVersion($nativeProtocolVersion)
    {
        $this->nativeProtocolVersion = $nativeProtocolVersion;

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
    public function getSchemaVersion()
    {
        return $this->schemaVersion;
    }

    /**
     * @param string $schemaVersion
     *
     * @return LocalModel
     */
    public function setSchemaVersion($schemaVersion)
    {
        $this->schemaVersion = $schemaVersion;

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
