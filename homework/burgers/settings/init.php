<?php
/**
 * @return PDO
 */
function getDbConnection(): PDO
{
    static $DB;
    if (!$DB) {
        try {
            $DB = new PDO('mysql:host=127.0.0.1:3307; dbname=burgers;', 'root', '');
        } catch (Exception $e) {
            die('error: ' . $e->getMessage());
        }
    }

    return $DB;
}
