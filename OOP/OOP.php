<?php

class BankAccount {

    public $accountnumber;

    public $accountbalance;

    public function checkbalance(){
        return $this->accountbalance;
    }

    public function transfer($amount,$receiver){
        if ($amount < $this->accountbalance){
            return 'transfer to $receiver successful';
        } else{
            return 'Insufficient balance';
        }
    }
    public function withdraw($amount){
        if ($amount < $this->accountbalance){
            return 'Withdraw successful !';
        } else{
            return 'Insufficient balance';
        }
    }
    
}


$account = new BankAccount() ;
$account -> accountnumber = 2017434015;
$account -> accountbalance = 6000;


echo $account -> withdraw(400);



?>