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
    public function setRpcId(int $id);

    public function getRpcId();

    public function setParams(array $params);

    public function getParams();

    public function setMethod(string $method);

    public function getMethod();
}
