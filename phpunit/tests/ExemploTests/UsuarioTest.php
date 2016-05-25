<?php

/*
 * run tests with: ./vendor/bin/phpunit --colors tests
 */

namespace ExemploTests;

use PHPUnit_Framework_TestCase;
use Exemplo\Usuario;
use Exemplo\InvalidArgumentException;

/*
 * Main assert methods:
 *  assertEquals
 *  assertTrue
 *  assertFalse
 *  assertFileExists
 *  assertEmpty
 *  assertCount
 *  assertContains
 *  assertInstanceOf
 *  assertNull
 *  assertLessThan
 *  assertThat
 *  assertClassHasAttribute
 */

class UsuarioTest extends PHPUnit_Framework_TestCase 
{
    /**
     * @test
    */
    public function testarNomeCompleto() 
    {
        $user = new Usuario("João", "Amorim");
        $expected = "João Amorino";
        $actual = $user->getNomeCompleto();
        $this->assertEquals($expected, $actual);
    }
    /**
     * @test
     */
    public function testarIdadeDoSeuSilvio()
    {
        $user = new Usuario("Silvio", "Santos", 86);
        $expected = 85;
        $actual = $user->getIdade();
        $this->assertEquals($expected, $actual);
    }
}