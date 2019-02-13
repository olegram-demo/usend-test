<?php

namespace App\Models;

use Money\Money;

class Ad
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var Money */
    protected $price;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Ad
     */
    public function setId(int $id): Ad
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Ad
     */
    public function setName(string $name): Ad
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Ad
     */
    public function setText(string $text): Ad
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return Money
     */
    public function getPrice(): Money
    {
        return $this->price;
    }

    /**
     * @param Money $price
     * @return Ad
     */
    public function setPrice(Money $price): Ad
    {
        $this->price = $price;
        return $this;
    }
}