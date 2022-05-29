<?php
trait Trait1
{
    public function method()
    {
        return 1;
    }
}

trait Trait2
{
    public function method()
    {
        return 2;
    }
}

trait Trait3
{
    public function method()
    {
        return 3;
    }
}

class Test
{
    use Trait1, Trait2, Trait3 {
        Trait1::method insteadof Trait2;
        Trait2::method as method2;
        Trait2::method insteadof Trait3;
        Trait3::method as method3;
    }

    public function getSum(): int
    {
        return $this->method() + $this->method2() + $this->method3();
    }
}

$sum = new Test();
echo $sum->getSum();

