<?php
    class DataBase{
        #  Conexión Local
        public static function connection(){

            ## Conexión Local
            $hostname = "localhost";
            $port = "3306";
            $database = "db_2900606";
            $username = "root";
            $password = "";
			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    return $pdo;
            }
            
            ## Conexión Azure
            // $hostname = "db-server-app-clean.mysql.database.azure.com";
            // $port = "3306";
            // $database = "db_2900606";
            // $username = "admin_db";
            // $password = "database123.";
            // $options = array(
            //     PDO::MYSQL_ATTR_SSL_CA => 'assets/_docs_/DigiCertGlobalRootCA.crt.pem'
            // );
            // $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password,$options);
            //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //     return $pdo;
            // }            
		}
?>