# Projeto PHP com Docker e Nginx

Este projeto é uma aplicação simples em PHP que utiliza Docker e Nginx como servidor web. A aplicação contém links para acessar APIs de Pokémon e Star Wars.

## Índice

- Tecnologias
- Estrutura do Projeto
- Pré-requisitos
- Instalação
- Uso
- Contribuição

## Tecnologias

- PHP 8.1
- Nginx
- Docker
- Docker Compose

## Estrutura do Projeto

A estrutura de diretórios do projeto é a seguinte:

/seu-projeto
├── app
│   └── index.php
├── nginx
│   └── nginx.conf
├── Dockerfile
└── docker-compose.yml

## Pré-requisitos

- Docker instalado na sua máquina.
- Docker Compose instalado.

## Instalação

1. Clone o repositório:
   git clone https://github.com/seu-usuario/nome-do-repositorio.git

2. Navegue até o diretório do projeto:
   cd nome-do-repositorio

3. Inicie os containers Docker:
   docker-compose up -d

4. Verifique se os containers estão em execução:
   docker-compose ps

## Uso

Acesse a aplicação em http://localhost:8080 no seu navegador.
Clique nos links disponíveis para acessar as APIs:
- Acessar API de Pokémon: /API/pokemon.php
- Acessar API de Star Wars: /API/starwars.php

## Contribuição

Se você quiser contribuir, siga estas etapas:

1. Faça um fork do projeto.
2. Crie uma nova branch:
   git checkout -b minha-feature

3. Faça suas alterações e faça o commit:
   git commit -m "Adicionando uma nova feature"

4. Envie para o seu repositório:
   git push origin minha-feature

5. Abra um pull request.
