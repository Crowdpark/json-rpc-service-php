<?php
/**
 * Created by JetBrains PhpStorm.
 * User: francis
 * Date: 3/12/12
 * Time: 12:56 AM
 * To change this template use File | Settings | File Templates.
 */
namespace Crowdpark\Net\JsonRpc;
interface InterfaceJsonRpcRequest
{
    /**
     * @abstract
     * @param int $id
     */
    public function setRpcId(\int $id);

    /**
     * @abstract
     * @return int
     */
    public function getRpcId();

    /**
     * @abstract
     * @param array $params
     */
    public function setParams(array $params);

    /**
     * @abstract
     * @return array
     */
    public function getParams();

    /**
     * @abstract
     * @param string $method
     */
    public function setMethod(\string $method);

    /**
     * @abstract
     * @return string
     */
    public function getMethod();

    /**
     * @abstract
     * @return array
     */
    public function getPostData();
}
