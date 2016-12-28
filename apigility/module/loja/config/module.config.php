<?php
return [
    'service_manager' => [
        'factories' => [
            \loja\V1\Rest\Cliente\ClienteResource::class => \loja\V1\Rest\Cliente\ClienteResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'loja.rest.cliente' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/cliente[/:cliente_id]',
                    'defaults' => [
                        'controller' => 'loja\\V1\\Rest\\Cliente\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'loja.rest.cliente',
        ],
    ],
    'zf-rest' => [
        'loja\\V1\\Rest\\Cliente\\Controller' => [
            'listener' => \loja\V1\Rest\Cliente\ClienteResource::class,
            'route_name' => 'loja.rest.cliente',
            'route_identifier_name' => 'cliente_id',
            'collection_name' => 'cliente',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \loja\V1\Rest\Cliente\ClienteEntity::class,
            'collection_class' => \loja\V1\Rest\Cliente\ClienteCollection::class,
            'service_name' => 'Cliente',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'loja\\V1\\Rest\\Cliente\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'loja\\V1\\Rest\\Cliente\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'loja\\V1\\Rest\\Cliente\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \loja\V1\Rest\Cliente\ClienteEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.cliente',
                'route_identifier_name' => 'cliente_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \loja\V1\Rest\Cliente\ClienteCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.cliente',
                'route_identifier_name' => 'cliente_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'loja\\V1\\Rest\\Cliente\\Controller' => [
            'input_filter' => 'loja\\V1\\Rest\\Cliente\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'loja\\V1\\Rest\\Cliente\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\NotEmpty::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'nome',
                'description' => 'Nome do cliente',
                'field_type' => 'text',
                'error_message' => 'O nome do cliente é obrigatorio',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\NotEmpty::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Validator\EmailAddress::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'email',
                'description' => 'Email do cliente',
                'field_type' => 'email',
                'error_message' => 'O email é requerido',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'loja\\V1\\Rest\\Cliente\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
