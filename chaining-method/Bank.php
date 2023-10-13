<?php

class Bank {
  public int | string $accno;
  public string $name;
  private mixed $balance;

  public File $file;

  public function __construct($accno, $name)
  {
      $this->accno = $accno;
      $this->name = $name;
  }

  public function getBalance()
  {
      return $this->balance;
  }
  public function setBalance($balance): void
  {
      $this->balance = $balance;
  }

  public function depositeAmount($amt): void
  {
      $this->balance += $amt;
  }

  public function deductAmount($amt) : void
  {
      if ($this->balance > $amt) {
          $this->balance -= $amt;
      } else {
          echo "Insufficient Balance";
      }
  }









}