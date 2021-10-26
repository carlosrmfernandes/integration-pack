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
Cria um arquivo que vai contem o endpoint base da integração 

```php
config/example.php

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
