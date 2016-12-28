<?php
namespace loja;

use loja\V1\Rest\Cliente\ClienteEntity;
use loja\V1\Rest\Cliente\ClienteMapper;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                //sm = service manager
                'LojaClienteTableGateway' => function($sm){
                    $dbAdapter = $sm->get('DB\Cliente');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ClienteEntity());
                    return new TableGateway('cliente', $dbAdapter, null, $resultSetPrototype);
                },
                'Loja\V1\Rest\Cliente\ClienteMapper' => function($sm){
                    $tableGateway = $sm->get('LojaClienteTableGateway');
                    return new ClienteMapper($tableGateway);
                }
            )
        );
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }


}
