<?php
/**
 * Created by JetBrains PhpStorm.
 * User: francis
 * Date: 3/6/12
 * Time: 10:17 AM
 * To change this template use File | Settings | File Templates.
 */
namespace Crowdpark\Net\JsonRpc;
interface InterfaceJsonRpcClient
{
    /**
     * @abstract
     * @return object | mixed
     */
    public function send();

    /**
     * @abstract
     *
     * @param array $rpcParams
     *
     * @return InterfaceJsonRpcClient
     */
    public function setParams(array $rpcParams);

    /**
     * @abstract
     *
     * @param string $gateway
     *
     * @return InterfaceJsonRpcClient
     */
    public function setGateway(\string $gateway);

    /**
     * @abstract
     *
     * @param int $rpcId
     *
     * @return InterfaceJsonRpcClient
     */
    public function setJsonRpcId(\int $rpcId);

    /**
     * @abstract
     *
     * @param string $rpcMethod
     *
     * @return InterfaceJsonRpcClient
     */
    public function setMethod(\string $rpcMethod);
}
