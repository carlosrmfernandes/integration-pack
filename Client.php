<?php
namespace App\Components\NameIntegration;
use Exception;
use App\Components\NameIntegration\Contracts\ContractsInterface;
use App\Components\NameIntegration\Exceptions\Exceptions;

class Client
{
    /**
     * @var ContractsInterface
     */
    protected $exampleWeatherInterface;

    /**
     * Client constructor.
     * @param ContractsInterface $contractsInterface
     */
    public function __construct(ContractsInterface $contractsInterface)
    {
        $this->contractsInterface = $contractsInterface;
    }

    /**
     * @param array data
     * @return Object
     * @throws Exception
     */
    public function generate(
        array $data
    ): Object {
        try {
            return $this->contractsInterface->generate(
                $data
            );
        } catch (Exception $exception) {
            throw new Exceptions(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
