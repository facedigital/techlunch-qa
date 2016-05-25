# QA: Garantindo qualidade nos projetos de software #

Este material é um conjunto de estudos utilizando a aplicação das técnicas e processos indicados no material de apresentação.

## DalekJS ##

Pré-requisitos: nodejs e npm (node package manager) instalado.

1. npm install dalek-cli -g 
2. npm install dalekjs --save-dev
3. npm install dalek-browser-chrome --save-dev (caso queira utilizar o chrome ao invés do phantonjs)
4. npm install dalek-reporter-html --save-dev

## Composer

Para instalar o composer, basta utilizar no prompt de comando: 

1. php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
2. php -r "if (hash_file('SHA384', 'composer-setup.php') === '92102166af5abdb03f49ce52a40591073a7b859a86e8ff13338cf7db58a19f7844fbc0bb79b2773bf30791e935dbd938') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
3. php composer-setup.php
4. php -r "unlink('composer-setup.php');"

## Como proceder

1. Utilizar o comando: composer install

2. O sistema utiliza o composer.json da pasta do projeto, e instala as dependencias como phpunit, e outras necessidades para os testes.

3. Para rodar os tests, utilizar o comando: ./phpunit/vendor/bin/phpunit --colors phpunit/tests

... em andamento