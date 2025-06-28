<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use PDO;
use PDOException;

class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Create the configured MySQL database if it does not exist';

    public function handle(): int
    {
        $dbName = Config::get('database.connections.mysql.database');
        $host = Config::get('database.connections.mysql.host');
        $port = Config::get('database.connections.mysql.port');
        $user = Config::get('database.connections.mysql.username');
        $pass = Config::get('database.connections.mysql.password');

        try {
            $pdo = new PDO("mysql:host=$host;port=$port", $user, $pass);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
            $this->info("Database '$dbName' created or already exists.");
        } catch (PDOException $e) {
            $this->error("Database creation failed: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
