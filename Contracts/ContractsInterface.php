<?php

namespace App\Components\NameIntegration\Contracts;

interface ContractsInterface
{

    /**
     * @param array data
     * @return Object
     */
    public function generate(
        array $data
    ): Object;
}
