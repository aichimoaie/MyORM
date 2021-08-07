<?php


namespace App\MyORM\Adapter;


// General singleton class.
class Config
{

    // Hold the class instance.
    private static $instance = null;
    private static $driver;
    private static $host;
    private static $user;
    private static $password;
    private static $dbname;


    // The constructor is private
    // to prevent initiation with outer code.
    private function __construct()
    {
        self::setDriver($_ENV['driver']);
        self::setHost($_ENV['host']);
        self::setUser($_ENV['user']);
        self::setPassword($_ENV['password']);
        self::setDbname($_ENV['dbname']);
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * @return mixed
     */
    public static function getHost()
    {
        return self::$host;
    }

    /**
     * @param mixed $host
     */
    public static function setHost($host): void
    {
        self::$host = $host;
    }

    /**
     * @return mixed
     */
    public static function getUser()
    {
        return self::$user;
    }

    /**
     * @param mixed $user
     */
    public static function setUser($user): void
    {
        self::$user = $user;
    }

    /**
     * @return mixed
     */
    public static function getPassword()
    {
        return self::$password;
    }

    /**
     * @param mixed $password
     */
    public static function setPassword($password): void
    {
        self::$password = $password;
    }

    /**
     * @return mixed
     */
    public static function getDbname()
    {
        return self::$dbname;
    }

    /**
     * @param mixed $dbname
     */
    public static function setDbname($dbname): void
    {
        self::$dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public static function getDriver()
    {
        return self::$driver;
    }

    /**
     * @param mixed $driver
     */
    public static function setDriver($driver): void
    {
        self::$driver = $driver;
    }
}