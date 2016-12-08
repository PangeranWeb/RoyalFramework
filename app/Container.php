<?php

namespace Application;

Class Container 
{
    private $config;

    private $pdo;

    private $logger;

    private $query_builder;

    private $fly_system;

    private $plates;

    public function __construct()
    {
        include(__DIR__ . '/config.php');
        $this->config = $config;
        $this->setPdo();
        $this->setLogger();
        $this->setPdo();
        $this->setQueryBuilder();
        $this->setFlySystem();
        $this->setPlates();
    }

    public function setLogger()
    {
        $logger = new \Monolog\Logger('my_logger');
        $file_handler = new \Monolog\Handler\StreamHandler($this->config['logger']);
        $logger->pushHandler($file_handler);
        $this->logger =  $logger;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function setPdo()
    {
        $db = $this->config['db'];
        $pdo = new \PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
            $db['user'], $db['pass']);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $this->pdo = $pdo;
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function setQueryBuilder()
    {
        $db = $this->config['db'];
        $config = new \Doctrine\DBAL\Configuration();
        $connectionParams = array(
            'dbname' => $db['dbname'],
            'user' => $db['user'],
            'password' => $db['pass'],
            'host' => $db['host'],
            'driver' => 'pdo_mysql',
        );
        $connection = \Doctrine\DBAL\DriverManager::getConnection(
            $connectionParams,
            $config
        );
        $this->query_builder = $connection->createQueryBuilder();
    }

    public function getQueryBuilder()
    {
        return $this->query_builder;
    }

    public function setFlySystem()
    {
        $flysystem = $this->config['flysystem'];
        $adapter = new \League\Flysystem\Adapter\Local($flysystem);
        $filesystem = new \League\Flysystem\Filesystem($adapter);
        $this->fly_system = $filesystem;
    }

    public function getFlySystem()
    {
        return $this->fly_system;
    }

    public function setPlates()
    {
        $this->plates = new \League\Plates\Engine($this->config['plates']);
    }

    public function getPlates()
    {
        return $this->plates;
    }

    public function pdoExecute($query, $fetch_type = "", $debug = false)
    {
        $pdo = $this->getPdo();
        $result = $pdo->prepare($query);
        $parameter = $query->getParameters();
        
        if ($debug) {
            echo $result->debugDumpParams();
            exit();
        }

        if (!empty($parameter)) {
            $result->execute($parameter);
        } else {
            $result->execute();
        }

        if ($fetch_type == "fetch_all") {
            return $result->fetchAll();
        } else if ($fetch_type == "fetch") {
            return $result->fetch();
        } else if ($fetch_type == "insert_id") {
            return $pdo->lastInsertId();
        }
    }
}