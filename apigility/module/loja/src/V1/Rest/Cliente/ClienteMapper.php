<?php
/**
 * Created by PhpStorm.
 * User: Phanton II
 * Date: 28/12/2016
 * Time: 00:22
 */

namespace loja\V1\Rest\Cliente;


use Zend\Db\TableGateway\TableGateway;

class ClienteMapper
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    //traz todas as informações do banco de dados

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function fetchOne($id)
    {
        $id = (int) $id;
        $rowset = $this
            ->tableGateway
            ->select(array('id' => $id));

        $row = $rowset->current();

        if (!$row){
            throw new Exception("Cliente com o id {$id} não pode ser localizado");
        }

        return $row;
    }

    public function save(ClienteEntity $cliente)
    {
        $data = [
          'nome' => $cliente->nome,
            'email' => $cliente->email
        ];

        $id = (int) $cliente->id;

        if ($id == 0){
            $res = $this->tableGateway->insert($data);
            $cliente->id = $this->tableGateway->lastInsertValue;
            return $cliente;
        }else{
           if ($this->fetchOne($id)){
               $this->tableGateway->update($data, array('id' => $id));

               return $cliente;
           }
        }

    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' =>(int) $id));
    }
}