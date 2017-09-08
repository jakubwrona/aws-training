<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 07.09.17
 * Time: 11:07
 */

namespace App;

class Billing implements \JsonSerializable
{
    protected $title;
    protected $amount;
    protected $currency;
    protected $payed_at;

    public function __construct(array $data)
    {
        foreach ($this as $prop => $val) {
            if (array_key_exists($prop, $data)) {
                $this->{$prop} = $data[$prop];
            }
        }
    }

    public function __toString(): string
    {
        return $this->title.'@@@'.$this->amount.'@@@'.$this->currency.'@@@'.$this->payed_at;
    }

    public function jsonSerialize()
    {
        return (object)[
            'title' => $this->title,
            'amount'=> $this->amount,
            'currency' => $this->currency,
            'payed_at' => $this->payed_at,
        ];
    }
}