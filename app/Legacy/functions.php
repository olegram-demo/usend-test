<?php

/** No phpDoc! It legacy */

function getAdRecord($id)
{
    if ($id < 1 || $id > 1000) {
        return null;
    }

    faker()->seed($id);

    return [
        'id' => $id,
        'name' => faker()->company,
        'text' => faker()->realText(),
        'keywords' => faker()->words(5, true),
        'price' => faker()->randomFloat(2, 1, 99),
    ];
}

function get_deamon_ad_info($id)
{
    if ($id < 1 || $id > 1000) {
        return null;
    }

    faker()->seed($id);

    // generating same data with getAdRecord
    $name = faker()->company;
    $text = faker()->realText();
    faker()->words(5, true);
    $price = faker()->randomFloat(2, 1, 99);

    return implode("\t", [
        '{'.$id.'}',
        faker()->numberBetween(1, 100),
        faker()->numberBetween(1, 10000),
        $name,
        $text,
        $price,
    ]);
}