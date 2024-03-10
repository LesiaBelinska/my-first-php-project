<?php

class Repository
{
    protected static string $table = '';

    protected static string $primaryKey = 'id';

    public function __construct(
        private PDO             $connector,
        private SQLQueryBuilder $builder)
    {
    }

    public function find(int|string $id): false|object
    {
        if (empty(static::$table)) {
            throw new Exception('Table is empty');
        }

        $sql = $this->builder->select(static::$table)->where(static::$primaryKey, $id)->getSQL();
        $connector = $this->connector;
        $stmt = $connector->prepare($sql);
        $stmt->execute($this->builder->getValues());

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function insert(array $data): void
    {
        $sql = $this->builder->insert(static::$table, $data)->getSQL();
        $stmt = $this->connector->prepare($sql);
        $stmt->execute($this->builder->getValues());
    }

    public function insertMany(array $data): void
    {
        foreach ($data as $item) {
            $this->insert($item);
        }
    }

    public function delete(int|string $id): void
    {
        $sql = $this->builder->delete(static::$table)->where(static::$primaryKey, $id)->getSQL();
        $stmt = $this->connector->prepare($sql);
        $stmt->execute($this->builder->getValues());
    }

    public function findByEmail(string $email): false|object
    {
        if (empty(static::$table)) {
            throw new Exception('Table is empty');
        }

        $sql = $this->builder->select(static::$table)->where('email', $email)->getSQL();
        $connector = $this->connector;
        $stmt = $connector->prepare($sql);
        $stmt->execute($this->builder->getValues());

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user === false) {
            return false;
        }

        return $user;
    }

    public function findAll(): array
    {
        $sql = $this->builder->select(static::$table)->getSQL();
        $connector = $this->connector;
        $stmt = $connector->prepare($sql);
        $stmt->execute($this->builder->getValues());
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}