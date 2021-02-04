<?php

trait Database
{
    private function getConfig(): array
    {
        return [
            'database' => [
                'port' => 3306,
                'name' => 'movievenger',
                'login' => 'helixar',
                'password' => 'lab',
            ],
        ];
    }

    private function initPdo()
    {
        try {
            $config = $this->getConfig();
            $pdo = new PDO("mysql:host=localhost:" . $config['database']['port'] . ";dbname=" . $config['database']['name'], $config['database']['login'], $config['database']['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $pdo;
        } catch (PDOException $exception) {
            http_response_code(500);
            debug($exception);
        }
    }

    public function prepare(string $query, array $values = null, $fetchAll = true): bool|array|PDOStatement
    {
        $statement = $this->initPdo()->prepare($query);
        $statement->execute($values);
        if ($fetchAll) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $statement;
    }

}