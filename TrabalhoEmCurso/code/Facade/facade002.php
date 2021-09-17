?php

class AccountNumberCheck
{
  private $accountNumber = 12345678;

  public function getAccountNumber()
  {
    return $this→accountNumber;
  }

  public function accountActive($accountNumber)
  {
    return $accountNumber === $this→accountNumber;
  }
}

class SecurityCodeCheck
{
  private $securityCode = 1234;

  private function getSecurityCode()
  {
    return $this→securityCode;
  }

  private function isCodeCorrect($securityCode)
  {
    return $securityCode === $this→securityCode;
  }
}

class FundsCheck
{
  private $cashInAccount = 1000.00;

  public function getCashInAccount()
  {
    return $this→cashInAccount;
  }

  public function increaseCashInAccount($cashInWithdraw)
  {
    $this→cashInAccount += $cashInWithdraw;
  }

  public function decreaseCashInAccount($cashInWithdraw)
  {
    $this→cashInAccount -= $cashInWithdraw;
  }

  public function haveEnoughMoney($withdrawal)
  {
    if ($withdrawal > $this→getCashInAccount()) {
      echo 'Não há fundos suficientes<br />', PHP_EOL;
      echo 'Saldo atual: ', $this→getCashInAccount(), '<br />', PHP_EOL;
      return false;
    }

    $this→decreaseCashInAccount($withdrawal);
    echo 'O saldo atual é de: ', $this→getCashInAccount(), '<br />', PHP_EOL;
    return true;
  }

  public function makeDeposit($cashToDepoisit)
  {
    $this→increaseCashInAccount($cashToDepoisit);
    echo 'Depósito efetuado: o saldo atual é de: ', $this→getCashInAccount(), '<br />' . PHP_EOL;
  }
}

/*
* Facade
* /
class BankAccountFacade
{
  private $accountNumber;
  private $securityCode;
  public $acctChecker;
  public $codeChecker;
  public $fundsChecker;
  public $bankWelcome;

  public function __construct($newAccNum, $newSecCode)
  {
    $this→accountNumber = $newAccNum;
    $this→securityCode = $newSecCode;

    $this→acctChecker = new AccountNumberCheck();
    $this→codeChecker = new SecurityCodeCheck();
    $this→fundsChecker = new FundsCheck();
  }

  public function getAccountNumber()
  {
    return $this→accountNumber;
  }

  public function getSecurityCode()
  {
    return $this→securityCode;
  }

  public function withdrawCash($cashToGet)
  {
    $isActive = $this→acctChecker→accountActive($this→getAccountNumber());
    $isCodeCorrect = $this→codeChecker→isCodeCorrect($this→getSecurityCode());
    $hasEnoughMoney = $this→fundsChecker→haveEnoughMoney($cashToGet);

    if ($isActive && $isCodeCorrect && $hasEnoughMoney) {
      echo 'Saque: transação efetuada<br />', PHP_EOL;
      return;
    }

    echo 'Saque: transação não realizada<br />' . PHP_EOL;
  }

  public function depositCash($cashToDeposit)
  {
    $isActive = $this→acctChecker→accountActive($this→getAccountNumber());
    $isCodeCorrect = $this→codeChecker→isCodeCorrect($this→getSecurityCode());

    if ($isActive && $isCodeCorrect) {
      $this→fundsChecker→makeDeposit($cashToDeposit);
      echo 'Depósito: transação concluída<br />' . PHP_EOL;
      return;
    }

    echo 'Depósito: transação não realizada<br />', PHP_EOL;
  }
}

$accessingBank = new BankAccountFacade(12345678, 1234);
$accessingBank→withdrawCash(200.00);
$accessingBank→depositCash(200.00);
$accessingBank→depositCash(1000.00);
$accessingBank→withdrawCash(350.00);