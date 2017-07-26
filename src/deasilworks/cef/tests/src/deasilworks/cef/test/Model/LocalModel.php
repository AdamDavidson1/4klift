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
        return $this->broadcast_address;
    }

    /**
     * @param string $broadcast_address
     *
     * @return LocalModel
     */
    public function setBroadcastAddress($broadcast_address)
    {
        $this->broadcast_address = $broadcast_address;

        return $this;
    }

    /**
     * @return string
     */
    public function getClusterName()
    {
        return $this->cluster_name;
    }

    /**
     * @param string $cluster_name
     *
     * @return LocalModel
     */
    public function setClusterName($cluster_name)
    {
        $this->cluster_name = $cluster_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCqlVersion()
    {
        return $this->cql_version;
    }

    /**
     * @param string $cql_version
     *
     * @return LocalModel
     */
    public function setCqlVersion($cql_version)
    {
        $this->cql_version = $cql_version;

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
        return $this->gossip_generation;
    }

    /**
     * @param int $gossip_generation
     *
     * @return LocalModel
     */
    public function setGossipGeneration($gossip_generation)
    {
        $this->gossip_generation = $gossip_generation;

        return $this;
    }

    /**
     * @return string
     */
    public function getHostId()
    {
        return $this->host_id;
    }

    /**
     * @param string $host_id
     *
     * @return LocalModel
     */
    public function setHostId($host_id)
    {
        $this->host_id = $host_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getListenAddress()
    {
        return $this->listen_address;
    }

    /**
     * @param string $listen_address
     *
     * @return LocalModel
     */
    public function setListenAddress($listen_address)
    {
        $this->listen_address = $listen_address;

        return $this;
    }

    /**
     * @return string
     */
    public function getNativeProtocolVersion()
    {
        return $this->native_protocol_version;
    }

    /**
     * @param string $native_protocol_version
     *
     * @return LocalModel
     */
    public function setNativeProtocolVersion($native_protocol_version)
    {
        $this->native_protocol_version = $native_protocol_version;

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
        return $this->release_version;
    }

    /**
     * @param string $release_version
     *
     * @return LocalModel
     */
    public function setReleaseVersion($release_version)
    {
        $this->release_version = $release_version;

        return $this;
    }

    /**
     * @return string
     */
    public function getRpcAddress()
    {
        return $this->rpc_address;
    }

    /**
     * @param string $rpc_address
     *
     * @return LocalModel
     */
    public function setRpcAddress($rpc_address)
    {
        $this->rpc_address = $rpc_address;

        return $this;
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return $this->schema_version;
    }

    /**
     * @param string $schema_version
     *
     * @return LocalModel
     */
    public function setSchemaVersion($schema_version)
    {
        $this->schema_version = $schema_version;

        return $this;
    }

    /**
     * @return string
     */
    public function getThriftVersion()
    {
        return $this->thrift_version;
    }

    /**
     * @param string $thrift_version
     *
     * @return LocalModel
     */
    public function setThriftVersion($thrift_version)
    {
        $this->thrift_version = $thrift_version;

        return $this;
    }
}
