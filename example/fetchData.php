<?php
/**
 * Created by JetBrains PhpStorm.
 * User: francis
 * Date: 3/12/12
 * Time: 1:18 PM
 * To change this template use File | Settings | File Templates.
 */

echo "=== Init === \n" . PHP_EOL;

require "../src/Crowdpark/Net/JsonRpc/BaseHttpClient.php";
require "../src/Crowdpark/Net/JsonRpc/InterfaceJsonRpcRequest.php";
require "../src/Crowdpark/Net/JsonRpc/JsonRpcDataVo.php";
require "../src/Crowdpark/Net/JsonRpc/Client.php";

echo "after require \n" . PHP_EOL;

$rpcMethod = "Open.User.getInitialData";
$rpcParams = array();
$rpcId     = 1;

$vo = new \Crowdpark\Net\JsonRpc\JsonRpcDataVo();
$vo->setMethod($rpcMethod)
    ->setParams($rpcParams)
    ->setRpcId($rpcId);

echo "<pre>";
echo var_dump($vo->getPostData());
echo "</pre>";

$jsonRpcClient = new \Crowdpark\Net\JsonRpc\Client();
$content       = $jsonRpcClient->setGateway("http://dev.shakeonitapp.com/api/v1/open/")
    ->addRequest($vo)
    ->addRequest($vo)
    ->addRequest($vo)
    ->sendRpc($vo);

echo "<pre>";
var_dump($content);
echo "</pre>";