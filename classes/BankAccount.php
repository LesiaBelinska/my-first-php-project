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
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    public function deposit(int $amount): void
    {
//        if ($amount > 0) {
//            $this->balance += $amount;
//            echo "Account has been credited with $amount USD. New balance: {$this->balance}" . PHP_EOL;
//        } else {
//            echo "Invalid amount for deposit" . PHP_EOL;
//        }
        $this->validateAmount($amount, 'deposit');
        $this->balance += $amount;
        $this->showMessage("Account has been credited with $amount USD. New balance: {$this->balance}");
    }

    public function withdraw(int $amount): void
    {
//        if ($amount > 0) {
//            if ($amount <= $this->balance) {
//                $this->balance -= $amount;
//                echo "Withdrew $amount USD. New balance: {$this->balance} USD." . PHP_EOL;
//            } else {
//                echo "Not enough funds in the account." . PHP_EOL;
//            }
//        } else {
//            echo "Invalid amount for withdrawal." . PHP_EOL;
//        }
        $this->validateAmount($amount, 'withdraw');
        if ($amount > $this->balance) {
            throw new Exception('Not enough funds in the account.' . PHP_EOL);
        }
        $this->balance -= $amount;
        $this->showMessage("Withdrew $amount USD. New balance: {$this->balance} USD.");
    }

    private function validateAmount(int $amount, string $purpose): void
    {
        if ($amount <= 0) {
            throw new Exception("Invalid amount for $purpose." . PHP_EOL);
        }
    }

    private function showMessage(string $message): void
    {
        echo $message . PHP_EOL;
    }

    public function showAccountInfo(): void
    {
        echo "Bank account number: {$this->getAccountNumber()}" . PHP_EOL;
        echo "Balance: {$this->getBalance()}" . PHP_EOL;
    }
}