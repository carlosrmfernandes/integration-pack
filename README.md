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


Destro do diretório ``` APP ``` do projecto criar um diretório com o nome de ```Components```


A seguir

Coloque o projecto baixado dentro do diretório ```Components```
Renomea o diretório ```NameIntegration``` com nome da sua integração

Criar um Service Providers 

Para mais informações clique [aqui](https://laravel.com/docs/6.x/providers)  

```php
php artisan make:provider ExampleProvider
```
```php
class ExampleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            $config = config(/*key*/);
            $client = new GuzzleClient([
                'base_uri' => $config['base_uri'],
            ]);
            return new Client(new Strategy($client));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
```
```php
<?php

return [
    'base_uri' => env('Example_BASE_URI'),
    'name' => ''
];

```
Registrar o Service Providers 

```php
App/config/app

'providers' => [

        /*
         * Package Service Providers...
         */
        \App\Providers\ExampleProvider::class,
        /*
         * Application Service Providers...
         */       
    ],
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


