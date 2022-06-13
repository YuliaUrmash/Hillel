<?php

interface Format
{
    public function setFormat(string $logger);
}

interface Deliver
{
    public function setDeliver(Format $deliver);
}

class FormatRaw implements Format
{
    public function setFormat(string $string)
    {
        return $string;
    }
}

class FormatWithDate implements Format
{

    public function setFormat(string $string)
    {
        return date('Y-m-d H:i:s') . $string;
    }
}

class FormatDateAndDetails implements Format
{
    public function setFormat(string $string)
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}

class DeliverEmail implements Deliver
{
    public function setDeliver($format)
    {
        echo "Format output ({$format}) by email";
    }
}

class DeliverSms implements Deliver
{
    public function setDeliver($format)
    {
        echo "Format output ({$format}) in SMS";
    }
}

class DeliverConsole implements Deliver
{
    public function setDeliver($format)
    {
        echo "Format output ({$format}) in console";
    }
}


class Logger
{
    private $format;
    private $delivery;

    public function __construct(Format $format, Deliver $delivery)
    {
        $this->format = $format;
        $this->delivery = $delivery;
    }

    public function log($string)
    {
        $this->deliver($this->format($string));
    }

    public function format($string)
    {
        return $this->format->setFormat($string);
    }

    public function deliver($format)
    {
        $this->delivery->setDeliver($format);
    }

}

$logger = new Logger(new FormatWithDate(), new DeliverSms);
$logger->log('Fixed by SOLID!');
