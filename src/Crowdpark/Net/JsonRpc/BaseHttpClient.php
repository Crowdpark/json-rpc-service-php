<?php
/**
 * Created by JetBrains PhpStorm.
 * User: francis
 * Date: 3/6/12
 * Time: 10:14 AM
 * To change this template use File | Settings | File Templates.
 */
namespace Crowdpark\Net\JsonRpc;
abstract class BaseHttpClient
{

    /**
     * @var array
     */
    private $_requestList;

    /**
     * @var string
     */
    private $_gateway;

    /**
     * @param string $gateway
     *
     * @return BaseHttpClient
     */
    public function setGateway(string $gateway)
    {
        $this->_gateway = $gateway;
        return $this;
    }

    /**
     * @return string
     */
    public function getGateway()
    {
        return $this->_gateway;
    }

    /**
     * @return string
     */
    protected function _contentType()
    {
        return "application/json";
    }

    protected function _getMultiCurl()
    {

    }

    protected function _getSingleCurl()
    {

    }

    /**
     * @return array
     */
    public function getRequestList()
    {
        return $this->_requestList;
    }

    /**
     * @param InterfaceJsonRpcRequest $rpcRequest
     *
     * @return BaseHttpClient
     */
    public function addRequest(InterfaceJsonRpcRequest $rpcRequest)
    {
        $this->_requestList[] = $rpcRequest;
        return $this;
    }

    /**
     * @param InterfaceJsonRpcRequest $rpcRequest
     */
    public function sendRpc(InterfaceJsonRpcRequest $rpcRequest)
    {

    }

}
