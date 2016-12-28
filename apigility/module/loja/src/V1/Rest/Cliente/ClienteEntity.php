<?php
namespace loja\V1\Rest\Cliente;

class ClienteEntity
{
    public $id;
    public $nome;
    public $email;

    public function getArrayCopy()
    {
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'emai' => $this->email
        );
    }

    public function exchangeArray(array $array)
    {
        $this->id = $array['id'];
        $this->nome = $array['nome'];
        $this->email = $array['email'];
    }
}
