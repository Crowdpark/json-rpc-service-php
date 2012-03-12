<?php
/**
 * Created by JetBrains PhpStorm.
 * User: francis
 * Date: 3/12/12
 * Time: 12:53 AM
 * To change this template use File | Settings | File Templates.
 */
namespace Crowdpark\Net\JsonRpc;
class JsonRpcDataVo implements InterfaceJsonRpcRequest
{

    /**
     * @var int
     */
    private $_rpcId;

    /**
     * @var array
     */
    private $_params;

    /**
     * @var string
     */
    private $_method;

    /**
     * @param int $id
     *
     * @return JsonRpcDataVo
     */
    public function setRpcId(int $id)
    {
        $this->_rpcId;
        return $this;
    }

    /**
     * @param array $params
     *
     * @return JsonRpcDataVo
     */
    public function setParams(array $params)
    {
        $this->_params = $params;
        return $this;
    }

    /**
     * @param string $method
     *
     * @return JsonRpcDataVo
     */
    public function setMethod(string $method)
    {
        $this->_method = $method;
        return $this;
    }

    /**
     * @return int
     */
    public function getRpcId()
    {
        return $this->_rpcId;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }
}
