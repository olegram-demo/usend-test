<?php

namespace App\Repositories;

use App\Exceptions\ModelNotFoundException;
use App\Models\Ad;
use Money\Money;

class DbRepository implements RepositoryInterface
{
    protected const LEGACY_FUNCTION_NAME = 'getAdRecord';

    /**
     * @param int $id
     * @return Ad
     * @throws ModelNotFoundException
     */
    public function find(int $id): Ad
    {
        log_send(static::LEGACY_FUNCTION_NAME . "(ID=$id)");

        $data = (static::LEGACY_FUNCTION_NAME)($id);

        if (is_null($data)) {
            throw new ModelNotFoundException();
        }

        return (new Ad())
            ->setId($data['id'])
            ->setName($data['name'])
            ->setText($data['text'])
            ->setPrice(Money::USD($data['price']*100));
    }
}