<?php
namespace DesignPattern\AntiPattern;

class Singleton
{
 private static $instance;

        /**
* Evita que a classe seja instanciada publicamente.
*
* @return void
* /
        private function __construct()
        {
        }

        /**
* Evita que a classe seja clonada.
*
* @return void
* /
        private function __clone()
        {
        }

        /**
* Método unserialize do tipo privado para prevenir a
* desserialização da instância dessa classe.
*
* @return void
* /
        private function __wakeup()
        {
        }

        /**
* Testa se há instância definida na propriedade,
* caso sim, a classe não será instanciada novamente.
*
* @return DesignPattern\AntiPattern\Singleton
* /
 public static function getInstance()
 {
 if (!isset(self::$instance)) {
 self::$instance = new self;
 }

 return self::$instance;
 }
}