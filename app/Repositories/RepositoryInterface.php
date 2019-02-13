<?php

namespace App\Repositories;

use App\Models\Ad;

interface RepositoryInterface
{
    /**
     * @param int $id
     * @return Ad
     */
    public function find(int $id): Ad;
}