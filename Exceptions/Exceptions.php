<?php

namespace App\Components\NameIntegration\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;

class Exceptions extends Exception
{
    /**
     * Exceptions constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        $message = '',
        $code = 500,
        Throwable $previous = null
    ) {
        Log::error('Weather Error: ' . $message);
        parent::__construct($message, $code, $previous);
    }
}
