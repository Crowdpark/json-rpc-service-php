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
     * @var resource
     */
    private $_multiCurl;

    /**
     * @var array
     */
    private $_curlList;

    /**
     * @param string $gateway
     *
     * @return BaseHttpClient
     */
    public function setGateway(\string $gateway)
    {
        $this->_gateway = $gateway;
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getGateway()
    {
        if (!$this->_gateway) {
            throw new \Exception("Gateway not set!");
        }
        return $this->_gateway;
    }

    /**
     * @return string
     */
    protected function _contentType()
    {
        return "application/json";
    }

    /**
     * @return BaseHttpClient
     */
    protected function _initMultiCurl()
    {
        if (!$this->_multiCurl) {
            $this->_multiCurl = curl_multi_init();
        }

        return $this;
    }

    protected function _getMultiCurl()
    {
        if(!$this->_multiCurl)
        {
            $this->_multiCurl = $this->_initMultiCurl();
        }

        return $this->_multiCurl;
    }

    /**
     * @param $resource
     *
     * @return BaseHttpClient
     */
    protected function _addResourceToMultiCurl($resource)
    {
        if (!$this->_multiCurl) {
            $this->_initMultiCurl();
        }
        curl_multi_add_handle($this->_multiCurl, $resource);
        $this->_curlList[] = $resource;
        return $this;
    }

    /**
     * @param $curlResource
     *
     * @return BaseHttpClient
     */
    protected function _removeMultihandler($curlResource)
    {
        curl_multi_remove_handle($this->_multiCurl, $curlResource);
        return $this;
    }

    /**
     * @param InterfaceJsonRpcRequest $rpcRequest
     *
     * @return resource
     */
    protected function _getSingleCurl(\Processus\Lib\JsonRpc\InterfaceJsonRpcRequest $rpcRequest)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->getGateway());
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json",
                                           'Content-Length: ' . strlen($rpcRequest->getPostData()))
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $rpcRequest->getPostData());
        return $ch;
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
    public function addRequest(\Processus\Lib\JsonRpc\InterfaceJsonRpcRequest $rpcRequest)
    {
        $this->_requestList[] = $rpcRequest;
        return $this;
    }

    /**
     * @param InterfaceJsonRpcRequest $rpcRequest
     *
     * @return array
     */
    public function sendRpc(\Processus\Lib\JsonRpc\InterfaceJsonRpcRequest $rpcRequest)
    {
        if ($rpcRequest) {
            $this->_requestList[] = $rpcRequest;
        }

        /** @var $request InterfaceJsonRpcRequest */
        foreach ($this->_requestList as $request)
        {
            $curlRequest = $this->_getSingleCurl($request);
            $this->_addResourceToMultiCurl($curlRequest);
        }

        $active = null;
        do {
            curl_multi_exec($this->_multiCurl, $active);
        } while ($active > 0);

        $curlContent = array();
        foreach ($this->_getCurlList() as $h)
        {
            $curlContent[] = curl_multi_getcontent($h);
            $this->_removeMultihandler($h);
        }

        curl_multi_close($this->_getMultiCurl());

        return $curlContent;
    }

    /**
     * @return array
     */
    protected function _getCurlList()
    {
        if (!$this->_curlList) {
            $this->_curlList = array();
        }

        return $this->_curlList;
    }

}
