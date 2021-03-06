# QA: Garantindo qualidade nos projetos de software

Este material é um conjunto de estudos utilizando a aplicação das técnicas e processos indicados no material de apresentação.

## Table of Contents

- [Composer](#composer)
- [DalekJS](#dalekjs)
- [Codeigniter 2](#codeigniter-2)
- [Codeigniter 3](#codeigniter-3)
- [Como Proceder](#como-proceder)

## Composer

Para instalar o composer, basta utilizar no prompt de comando:

```shell
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('SHA384', 'composer-setup.php') === '92102166af5abdb03f49ce52a40591073a7b859a86e8ff13338cf7db58a19f7844fbc0bb79b2773bf30791e935dbd938') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"
```

## DalekJS

Pré-requisitos:

- NodeJS
- NPM

```shell
$ npm install dalek-cli -g
$ npm install dalekjs --save-dev
$ npm install dalek-reporter-html --save-dev
```

Caso queira utilizar o Chrome ao invés do PhantonJS

```shell
$ npm install dalek-browser-chrome --save-dev
```

## Codeigniter 2

Para utilizar testes unitários com phpunit no CI2 é necessário fazer hack em 2 arquivos do core.

São eles: `system/core/Utf8.php` e `/system/Codeigniter.php`.

### Hacks

#### `system/core/Utf8.php`:

Linha 48

```php
AND ((!empty($CFG) AND $CFG->item('charset') == 'UTF-8') OR (defined('PHPUNIT_TEST') AND PHPUNIT_CHARSET == 'UTF-8'))
```

A variável `$CFG` é utilizada com global do PHP e não chega a ser instanciada até que o `CI_Controller` seja ativado. Neste caso não estamos utilizando nenhum controller, apenas o phpunit como backend para ativação dos testes.

#### `system/Codeigniter.php`:

Linha 379

```php
if ($EXT->_call_hook('display_override') === FALSE && !defined('PHPUNIT_TEST'))
```

Neste caso como não vamos utilizar os controllers do CI, existem algumas chamadas da classe de benchmark que causam alguns problemas, aí basicamente adicionamos uma checagem se a variável de ambiente `PHPUNIT` não está definida.

## Codeigniter 3

Para utilizar testes unitários com phpunit no CI3 é necessário hack nos arquivos: `/system/Codeigniter.php` e `core/URI.php`.

### Hacks

#### `system/Codeigniter.php`:

Linha 531

```php
if ($EXT->_call_hook('display_override') === FALSE && !defined('PHPUNIT_TEST'))
```

Assim como no CI2 este hack ainda é necessário para que o output do controller default não seja enviado para o console.

#### `core/URI.php`:

Linha 109

```php
if (defined('PHPUNIT_TEST')) {
    $uri = '';
} else if (is_cli()) {
```

Se for um teste unitário, ignoramos todos os argumentos.

## Como Proceder

1. Utilizar o comando: `composer install`

2. O sistema utiliza o `composer.json` da pasta do projeto, e instala as dependências como, por exemplo, o PHPUnit, e outras necessidades para os testes.

3. Para rodar os testes, utilizar o comando:

```shell
$ cd phpunit-ci2 ou cd phpunit-ci3
$ ./vendor/bin/phpunit
```

... em andamento