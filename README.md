# CREDE Reservas

Aplicativo de reservas de locais e equipamentos.

## Requisitos

- Debian/Ubuntu ou derivado
- NodeJS
- Docker
- Docker-Compose
- PHP Composer

## Como usar

```bash
# Baixa todas as dependencias do Node
npm i

# Copia bibliotecas necessarias
./build.sh

# Adicione o arquivo keys.json criado pela Google Cloud Platform

# Baixa todas as dependencias do PHP
composer i

# Cria containers e serviços docker
docker-compose up -d --build

# Verifique se os containers reserv-app1, adminer1 e reserv-db1 estão up
docker ps

# Acesse localhost:8080, faça login e verifique se tabela reservation está no banco

# Acesse SEU_IP_OU_HOSTNAME:8081 para ter acesso a aplicação
```

## Containers

### reserv-app (SEU_IP_OU_HOSTNAME:8081)

Aplicação CREDE Reservas em PHP. Acesse com os dados:

Login: admin

Senha: admin

### adminer (localhost:8080)

Frontend para o banco de dados em PostgreSQL.

Servidor: db

Usuário: postgres

Senha: orkideaframework

### reserv-db

Banco de dados PostgreSQL vinculado ao volume `reserv-vol`.

## Arquivos importantes

- `crede-reservation/api/Orkidea/Group.php`

Modifique a estrutura abaixo pela da sua empresa ou instituição:

```php
public static $groupSchema = [	
    'SEDUC' => [
        'CREDE' => [
            'Escola' => []
        ]
    ]
];
```

- `keys.json`

Inclua esse arquivo criado pela Google Cloud Platform para integração com Google Agenda.