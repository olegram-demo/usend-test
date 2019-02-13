<?php

namespace App\Repositories;

use App\Exceptions\ModelNotFoundException;
use App\Models\Ad;
use Money\Money;

class CacheRepository implements RepositoryInterface
{
    protected const LEGACY_FUNCTION_NAME = 'get_deamon_ad_info';

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

        $parts = explode("\t", $data);

        return (new Ad())
            ->setId((int) trim($parts[0], '{}'))
            ->setName($parts[3])
            ->setText($parts[4])
            ->setPrice(Money::USD($parts[5]*100));
    }
}