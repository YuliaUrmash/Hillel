<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public function getRed()
    {
        return $this->red;
    }

    private function setRed($red)
    {
        if ($red < 0 || $red > 255) {
            throw new Exception ('Диапазон от 0 до 255');
        }
        $this->red = $red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    private function setGreen($green)
    {
        if ($green < 0 || $green > 255) {
            throw new Exception('Диапазон от 0 до 255');
        }
        $this->green = $green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    private function setBlue($blue)
    {
        if ($blue < 0 || $blue > 255) {
            throw new Exception('Диапазон от 0 до 255');
        }
        $this->blue = $blue;
    }

    public function equals(ValueObject $color)
    {
        return $this->getRed() == $color->getRed() &&
            $this->getGreen() == $color->getGreen() &&
            $this->getBlue() == $color->getBlue();
    }

    public static function random(): ValueObject
    {
        return new self (rand(0, 255), rand(0, 255), rand(0, 255));
    }

    public function mix(ValueObject $mixed): ValueObject
    {

        return new ValueObject(
            (int)(($this->red + $mixed->getRed()) / 2),
            (int)(($this->green + $mixed->getGreen()) / 2),
            (int)(($this->blue + $mixed->getBlue()) / 2)
        );
    }
}

$color = new ValueObject(200, 200, 200);
$mixedColor = $color->mix(new ValueObject(100, 100, 100));
echo '<pre>';
echo 'red:' . $mixedColor->getRed();
echo '</pre>';

echo '<pre>';
echo 'green:' . $mixedColor->getGreen();
echo '</pre>';

echo '<pre>';
echo 'blue:' . $mixedColor->getBlue();
echo '</pre>';

$color1 = ValueObject:: random();
$color2 = ValueObject:: random();
$mixedColor1 = $color1->mix($color2);
echo '<pre>';
var_dump($mixedColor1);
echo '</pre>';

echo '<pre>';
var_dump($color->equals($mixedColor));
echo '</pre>';

