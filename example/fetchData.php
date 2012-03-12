<?php
/**
 * Created by JetBrains PhpStorm.
 * User: francis
 * Date: 3/12/12
 * Time: 1:18 PM
 * To change this template use File | Settings | File Templates.
 */

require "../src/Crowdpark/Net/JsonRpc/BaseHttpClient.php";
require "../src/Crowdpark/Net/JsonRpc/InterfaceJsonRpcRequest.php";
require "../src/Crowdpark/Net/JsonRpc/JsonRpcDataVo.php";
require "../src/Crowdpark/Net/JsonRpc/Client.php";

$vo = new \Crowdpark\Net\JsonRpc\JsonRpcDataVo();
$vo->setMethod("Open.User.getInitialData")
    ->setParams(array())
    ->setRpcId(1);

var_dump($vo);
die();

$jsonRpcClient = new Crowdpark\Net\JsonRpc\Client();
$content       = $jsonRpcClient->setGateway("http://dev.shakeonitapp.com/api/v1/open/")
    ->addRequest($vo)
    ->addRequest($vo)
    ->addRequest($vo)
    ->sendRpc($vo);

echo "<pre>";
var_dump($content);
echo "</pre>";