# PHP Clean Architecture (Em construção)

Estudo e proposta da aplicação do Clean Architecture

## Tecnologias

- [php 8.1](https://www.php.net/releases/8.1/en.php)
- [nesbot/carbon](https://packagist.org/packages/nesbot/carbon)
- [phpunit/phpunit](https://packagist.org/packages/phpunit/phpunit)
- [ramsey/uuid](https://packagist.org/packages/ramsey/uuid)
- [slim/psr7](https://packagist.org/packages/slim/psr7)
- [slim/slim](https://packagist.org/packages/slim/slim)
- [vlucas/phpdotenv](https://packagist.org/packages/vlucas/phpdotenv)
- [CycleORM](https://cycle-orm.dev/)

## Requisitos

- Docker 20+
- Docker Compose 2.5+
- Git

## Ambiente Local

1. Realize o clone do repositório em sua máquina

```bash
git clone https://github.com/marcelofabianov/php-clean-architecture
```

2. Faça a copia e modificação das variaveis de ambiente

```bash
cp .env.example .env
```

3. Subindo containers docker para ambiente local

```bash
docker compose up -d
```

4. Instalando dependências do projeto

```bash
docker exec app composer install
```

5. Tudo pronto! Acesse em seu navegador **http://localhost:8008** ou execute os testes.

```bash
docker exec app php /vendor/bin/phpunit
```