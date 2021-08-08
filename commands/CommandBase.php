<?php
//
//namespace App\MyORM\commands;
//
//require dirname(__DIR__, 1) . '/vendor/autoload.php';
//
//
//class CommandBase
//{
//    public $name = '';
//
//
//    public static function run()
//    {
//        global $argc;
//        global $argv;
//
//        self::validate($argc, $argv) === true ? self::execute($argv) : self::invalidCommand();
//    }
//
//    public static function validate($argc, $argv)
//    {
//        $availableCommands = array('command', 'model', 'migration', 'controller', 'seed', 'resource', 'migrate', 'db:seed');
//        $commandType = explode(':', $argv[1]);
//
//        if ($argc < 3 || strpos($argv[1], 'make:') === false || in_array($commandType, $availableCommands) === false) {
//            return false;
//        }
//        return true;
//    }
//
//    public static function execute($argv)
//    {
//        if ($argv[1])
//
//    }
//
//    public static function invalidCommand()
//    {
//        echo "Invalid command";
//        return;
//    }
//
//}
//
//if (isset($argc)) {
//    CommandBase::run();
//} else {
//    CommandBase::invalidCommand();
//}
