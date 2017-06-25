# README #

Este repositório contém o sistema de gestão para o cliente Kandangos.

## Siga os passos abaixo para iniciar ##

#### Clone o repositório ####
`git clone https://link-do-repositorio Kandangos`

#### Crie o bando de dados kandangos_laravel ####
`create database kandangos_laravel;`

Renomeie o arquivo .env.example para .env e configure a conexão com seu banco de dados e envio de email.

### Execute os seguintes comandos no terminal ###
`composer install`
`php artisan key:generate`
`php artisan migrate`

### Instalação das dependências Front-End ###
Navegue até a pasta "public"
`cd public`
`bower install`

## Configuração do Analytics ##
Adicione o trecho abaixo no `.env`
`ANALYTICS_SITE_ID=ga:101381381`
`ANALYTICS_CLIENT_ID=689505558864-u3q66engh2nglav23vn2d86eiknf596p.apps.googleusercontent.com`
`ANALYTICS_SERVICE_EMAIL=analytics-nace-producoes@appspot.gserviceaccount.com`
`ANALYTICS_P12=analytics-nace-producoes-56e952512339.p12`


## Atualizar no servidor  ##
Conecte-se ao servidor via ssh
Navegue até a pasta do projeto
Dentro da pasta `httpdocs` execute:
`git fetch --all`
`git reset --hard origin/master`


## Responsável pelo projeto ##

* TGOO World Wide

## Participantes ##

* Ramires Gomes
* Wallef Borges