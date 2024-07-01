<?php

class Database extends PDO {
    public function __construct(string $dsn, string $user_name, string $password, array $options = []){
        $default = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        // array_replace wird verwendet um die Default werte zu überschrieben,wenn daten übermittelt werden
        parent::__construct($dsn, $user_name, $password, array_replace($default, $options));
    }

    public function sql_execute(string $sql, array $bindings = []): PDOStatement {
        if(! $bindings ) {
            return $this->query($sql);
        }


        $stmt = $this->prepare($sql);
        $stmt->execute($bindings);

        return $stmt;
    }
}