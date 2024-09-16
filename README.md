# Projeto PHP com Docker e Nginx

Este projeto é uma aplicação simples em PHP que utiliza Docker e Nginx como servidor web. A aplicação contém links para acessar APIs de Pokémon e Star Wars.

## Índice

- [Tecnologias](#tecnologias)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Uso](#uso)
- [Contribuição](#contribuição)

## Tecnologias

- PHP 8.1
- Nginx
- Docker
- Docker Compose

## Estrutura do Projeto

A estrutura de diretórios do projeto é a seguinte:
```bash
/seu-projeto
├── app
│   └── index.php
├── nginx
│   └── nginx.conf
├── Dockerfile
└── docker-compose.yml
```

## Estrutura do Projeto

- Docker instalado na sua máquina.
- Docker Compose instalado.

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/Arantees/FATEC_2024_2SEM_DW2-avaliacao-1.git
   ```

2. Navegue até o diretório do projeto:
   ```bash
   cd nome-do-repositorio
   ```

3. Inicie os containers Docker:
   ```bash
   docker-compose up -d
   ```

4. Verifique se os containers estão em execução:
   ```bash
   docker-compose ps
   ```

## Uso

Acesse a aplicação em [http://localhost:8080](http://localhost:8080) no seu navegador.
Clique nos links disponíveis para acessar as APIs:
- Acessar API de Pokémon: `/API/pokemon.php`
- Acessar API de Star Wars: `/API/starwars.php`

## Contribuição

Se você quiser contribuir, siga estas etapas:

1. [Faça um fork do projeto.](https://github.com/Arantees/FATEC_2024_2SEM_DW2-avaliacao-1.git)
2. Crie uma nova branch:
   ```bash
   git checkout -b minha-feature
   ```

3. Faça suas alterações e faça o commit:
   ```bash
   git commit -m "Adicionando uma nova feature"
   ```

4. Envie para o seu repositório:
   ```bash
   git push origin minha-feature
   ```

5. [Abra um pull request.](https://github.com/Arantees/FATEC_2024_2SEM_DW2-avaliacao-1/pulls)
