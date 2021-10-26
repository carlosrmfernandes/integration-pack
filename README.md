![alt text](https://portaldoponto.pagfacil.com.br/skins/pagfacil/im/logo.gif)
## Pack Integration


## Começando
Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Veja a implantação de notas sobre como implantar o projeto em um sistema ativo.

## Tecnologia

```php
Guzzle PHP
```
Para mais informações clique [aqui](https://docs.guzzlephp.org/en/stable/) 


## Framework

```php
Laravel
```

## Pré-requisitos

```php
Baixar o projecto
```


Destro do pasta ``` APP ``` do projecto criar um arquivo .evn coloca os dados que estarão no arquivo .env_docker.example;


A seguir, execute o seguinte:

Todos esses comandos que citarei a seguir, devem ser executados na linha de comando da sua máquina. Portanto, navegue até a pasta do projeto para poder executar os comandos abaixo especificados.
logo após clona-ló, na pasta raíz do projeto execute os seguintes comandos. 

Criar uma network docker

```php
docker network create -d bridge payment
```

Executar o docker compuser
```php
docker-compose up 
```

Acessar o container onde esta à aplicacão 
```php
docker exec -i -t php-fpm_payment /bin/bash
```

Pra quem vem do JavaScript, esse comando funcionaria como o npm, o "composer install" vai instalar todas as dependências do Laravel necessárias para executar o projeto em sua máquina

```php
composer install
```
## Banco de dados
Configura o seu banco de dados 

Acesse o container pgadmin_payment via browser

```php
localhost:5050

EMAIL=user@domain.com
PASSWORD=SuperSecret    
```
Criar novo server no pgadmin_payment

```php
DB_HOST=postgresql_payment
DB_PORT=5432
DB_DATABASE=payment_dev
DB_USERNAME=postgres
DB_PASSWORD=root 
```

Acessar o container onde esta à aplicacão e executar os seguinte comando

```php
docker exec -i -t php-fpm_payment /bin/bash
```

```php
php artisan config:clear
```

```php
composer dump-autoload
```

```php
php artisan migrate
```


## execução das queue 

Acessar o container onde esta à aplicacão e executar os seguinte comando

```php
docker exec -i -t php-fpm_payment /bin/bash
```

Execute o seguinte comando 

```php
php artisan queue:work
```


## Teste Unintário  

Nessa aplicão tem os test para:

```php
- Criação de usuário (testa o fluxo de criação de usuário completo)
- Criação da carteira do usuário
- Login
- Tranferência de valor (testa o fluxo de tranferencia completo)
- Relacionamento de usuário e carteira 
```

Execute o seguinte comando para executar os testes

```php
vendor/bin/phpunit
```

## Link da documentação 

https://drive.google.com/file/d/1W3QJoCq4H5hklBJM_k-22PpRfsYEYWGj/view?usp=sharing

## Link da collections 

https://www.getpostman.com/collections/0efb6c5fcb157a78ba5c


