<?php

class MySqlQueryBuilder implements SQLQueryBuilder
{

    private stdClass $query;

    private function reset(): void
    {
        $this->query = new stdClass();
    }

    public function select(string $table, array|string $fields = '*'): SQLQueryBuilder
    {
        $fields = $fields === '*' ? '*' : implode(', ', $fields);
        $this->reset();
        $this->query->base = "SELECT $fields FROM $table";
        $this->query->type = 'select';

        return $this;
    }

    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }

        $this->query->where[] = "$field $operator :$field";
        $this->query->values[$field] = $value;

        return $this;
    }

    public function limit(int $start, ?int $offset = null): SQLQueryBuilder // додати перевірку, через enum?
    {
        if ($this->query->type !== 'select') {
            throw new Exception('LIMIT can only be added to Select');
        }

        $limit = " LIMIT $start";
        if (isset($offset)) {
            $limit .= ", $offset";
        }
        $this->query->limit = $limit;

        return $this;
    }

    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->base;

        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }

        if (isset($query->limit)) {
            $sql .= $query->limit;
        }

        $sql .= ";";

        return $sql;
    }

    public function getValues(): array
    {
        if(!isset($this->query->values)) {
            return [];
        }
        return $this->query->values;
    }

    // додаю
    public function insert(string $table, array $data): SQLQueryBuilder
    {
        $fields = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $this->reset();
        $this->query->base = "INSERT INTO $table ($fields) VALUES ($values)";
        $this->query->type = 'insert';
        $this->query->values = array_values($data);

        return $this;
    }

    public function insertMany(string $table, array $data): SQLQueryBuilder
    {
        foreach ($data as $item) {
            $fields = implode(', ', array_keys($item));
            $values = implode(', ', array_fill(0, count($item), '?'));

            $this->reset();
            $this->query->base = "INSERT INTO $table ($fields) VALUES ($values)";
            $this->query->type = 'insert';
            $this->query->values = array_values($item);
        }

        return $this;
    }

    public function delete(string $table): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base = "DELETE FROM $table";
        $this->query->type = 'delete';

        return $this;
    }



}