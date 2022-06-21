<?php

interface Payment
{
    public function getPayment();
}

abstract class PayMe
{
    abstract public function PaymentMethod();

    public function sum()
    {
        $payment = $this->PaymentMethod();
        return $payment->getPayment();
    }

}

class ApplePay implements Payment
{
    public int $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function getPayment()
    {
        return $this->payment;
    }
}

class ApplePaymentMethod extends PayMe
{
    public int $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function PaymentMethod()
    {
        return new ApplePay($this->payment);
    }
}

class GooglePay implements Payment
{
    public int $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function getPayment()
    {
        return $this->payment;
    }
}

class GooglePaymentMethod extends PayMe
{
    public int $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function PaymentMethod()
    {
        return new GooglePay($this->payment);
    }
}
$pay = new ApplePaymentMethod(1111110);
print_r($pay->sum().'</br>');
$pay = new GooglePaymentMethod(40);
print_r($pay->sum().'</br>');