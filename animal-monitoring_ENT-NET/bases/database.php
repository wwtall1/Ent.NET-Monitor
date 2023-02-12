<?php
class database{
    private static $dsn = 'mysql:host=localhost;port=3308;dbname=DishMonitoring';
    private static $username = 'lk_main';
    private static $sqlPassword = 'progress';
    private static $db;
    private function _construct(){    }
    static function getDB(){
        try {
            self::$db = new PDO(self::$dsn, self::$username, self::$sqlPassword);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('database_error.php');
            exit();
        }
        return self::$db;
    }
}
?>