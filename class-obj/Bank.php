<?php

class Bank {
  public $accno;
  public $name;
  private $balance;

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