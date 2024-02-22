<?php

class BankAccount
{
    private int $accountNumber;
    private int $balance;

    public function __construct(int $accountNumber, int $balance)
    {
        $this->setAccountNumber($accountNumber);
        $this->setBalance($balance);
    }

    /**
     * @param int $accountNumber
     */
    public function setAccountNumber(int $accountNumber): void
    {
        $accountNumberLength = strlen($accountNumber);
        if ($accountNumberLength < 5 || $accountNumberLength > 13) {
            throw new Exception("Invalid account number length. Account number must be between 5 and 13 digits long.");
        }
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return int
     */
    public function getAccountNumber(): int
    {
        return $this->accountNumber;
    }

    /**
     * @param int $balance
     */
    public function setBalance(int $balance): void
    {
        if ($balance < 0) { //додала
            throw new Exception("Invalid balance amount." . PHP_EOL);
        }
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    public function deposit(int $amount): bool
    {
        $this->validateAmount($amount, 'deposit');
        $this->balance += $amount;
        return true;
    }

    public function withdraw(int $amount): bool
    {
        $this->validateAmount($amount, 'withdraw');
        if ($amount > $this->balance) {
            throw new Exception('Not enough funds in the account.' . PHP_EOL);
        }
        $this->balance -= $amount;
        return true;
    }

    private function validateAmount(int $amount, string $purpose): void
    {
        if ($amount <= 0) {
            throw new Exception("Invalid amount for $purpose." . PHP_EOL);
        }
    }

    public function showAccountInfo(): void
    {
        echo "Bank account number: {$this->getAccountNumber()}" . PHP_EOL;
        echo "Balance: {$this->getBalance()}" . PHP_EOL;
    }
}