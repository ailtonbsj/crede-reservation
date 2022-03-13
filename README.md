# CREDE Reservas

Aplicativo de reservas de locais e equipamentos.

## Requisitos

- Debian/Ubuntu ou derivado
- NodeJS
- Docker
- Docker-Composer

## Como usar

```bash
# Baixa todas as dependencias do node
npm i

# Copia bibliotecas necessarias
./build.sh

# Cria containers e serviços docker
docker-compose up -d --build
```

## Containers

### reserv-app (localhost:8081)

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