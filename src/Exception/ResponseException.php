<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Psr\Http\Message\ResponseInterface;

class ResponseException extends RuntimeException
{
    private ?ResponseInterface $response;

    public function __construct(string $message = '', int $code = 0, \Throwable $previous = null, ResponseInterface $response = null)
    {
        if (null !== $response) {
            if ($message) {
                $message .= "\n\n";
            }

            $message .= $response->getBody()->getContents();
        }

        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
