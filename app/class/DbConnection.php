<?php

class DbConnection
{
  protected static $connection;

  // function __create() {
  //
  // }

    static function getConnection() {
      if (self::$connection) {
        return self::$connection;
      }

      try {
          $dsn = 'mysql:host='.$_ENV['mzubi-msis-ds0923.clkefstulqsl.us-east-1.rds.amazonaws.com'].';dbname='.$_ENV['mzubi-msis-ds0923'].';charset=utf8';
          error_log($dsn);
          self::$connection = new PDO(
             $dsn,
             $_ENV['admin'],
             $_ENV['W1!8hFv&j!I&X7T'],
             [
                 PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                 PDO::ATTR_EMULATE_PREPARES   => false
             ]
           );
      } catch (\PDOException $e) {
          throw new \PDOException($e->getMessage(), (int)$e->getCode());
      }
      return self::$connection;
    }
}
