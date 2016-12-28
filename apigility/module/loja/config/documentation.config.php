<?php
return [
    'loja\\V1\\Rest\\Cliente\\Controller' => [
        'description' => 'API de serviços responsaveis pela administração de clientes',
        'collection' => [
            'description' => 'Coleção de dados de clientes',
            'GET' => [
                'description' => 'traz a listagem de clientes',
                'response' => '{
   "_links": {
       "self": {
           "href": "/cliente"
       },
       "first": {
           "href": "/cliente?page={page}"
       },
       "prev": {
           "href": "/cliente?page={page}"
       },
       "next": {
           "href": "/cliente?page={page}"
       },
       "last": {
           "href": "/cliente?page={page}"
       }
   }
   "_embedded": {
       "cliente": [
           {
               "_links": {
                   "self": {
                       "href": "/cliente[/:cliente_id]"
                   }
               }
              "nome": "Nome do cliente",
              "email": "Email do cliente"
           }
       ]
   }
}',
            ],
            'POST' => [
                'description' => 'Insere novo cliente',
                'request' => '{
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/cliente[/:cliente_id]"
       }
   }
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
            ],
        ],
        'entity' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/cliente[/:cliente_id]"
       }
   }
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
                'description' => 'traz um cliente especifico do sistema',
            ],
            'PATCH' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/cliente[/:cliente_id]"
       }
   }
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
                'request' => '{
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
            ],
            'PUT' => [
                'request' => '{
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/cliente[/:cliente_id]"
       }
   }
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
            ],
            'DELETE' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/cliente[/:cliente_id]"
       }
   }
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
                'request' => '{
   "nome": "Nome do cliente",
   "email": "Email do cliente"
}',
                'description' => 'remove um cliente especifico do sistema',
            ],
            'description' => 'Cliente do sistema',
        ],
    ],
];
