<h1 align="center">API em Laravel</h1>
<br>

## Descrição do Projeto

<p align="center">Este projeto é destinado a ser um gerenciador/banco de senhas.</p>
<br>

## Comandos importantes

<br>

__LEMBRE-SE DE CONFIGURAR O ARQUIVO .env. O ARQUIVO .env.example SEGUE COM AS INFORMAÇÕES CORRETAS DE ACESSO DO BD PELO DOCKER__

<br>
Para utilizar este projeto, siga os passos abaixo:
<br>

Com o **Docker e o Docker Compose instalado e rodando**, vá até a pasta raiz do projeto e execute os seguintes comandos em ordem:


***docker-compose build***

***docker-compose up -d***

***composer install***

***php artisan install***

***php artisan migrate***

***docker-compose exec app php artisan key:generate***

Verifique se os três serviços estão rodando e, em seguida, rode as migrations com o seguinte comando:

***php artisan migrate***

Para iniciar o servidor local, utilize o comando:

***php artisan serve***

Para rodar os testes unitários, utilize o comando:

***php artisan test***
<br>
<br>
## Rotas e utilização da API
<br>
Será disponibilizado em breve.
<br>
## Como rodar códigos SQL e visualizar o BD
<br>
Para acessar o banco de dados, siga os passos abaixo:
<br>
Na pasta raiz do projeto, execute o comando:

***docker ps***

Localize a imagem de nome "mysql:5.7" e copie o CONTAINER ID.

Execute o comando abaixo, substituindo o ID_do_Contêiner_MySQL pelo ID do contêiner:

***docker exec -it <ID_do_Contêiner_MySQL> bash***

Em seguida, para acessar o MySQL, execute o comando:

***mysql -u laravel -psecret***
<br>
Você já pode rodar comandos SQL no banco de dados.
<br>
***Comandos mais usados:
<br>
SHOW DATABASES;
<br>
USE laravel;
<br>
SHOW tables;
<br>
SELECT * FROM triangles;
<br>
SELECT * FROM rectangles;***
