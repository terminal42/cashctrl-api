<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Terminal42\CashctrlApi\Result;

class ValidationErrorException extends RuntimeException
{
    private Result $result;

    public function __construct(Result $result, \Throwable $previous = null)
    {
        parent::__construct($this->generateMessage($result->errors()), 0, $previous);

        $this->result = $result;
    }

    public function getResult(): Result
    {
        return $this->result;
    }

    public function getErrors(): array
    {
        return $this->result->errors();
    }

    private function generateMessage(array $errors)
    {
        $lines = [];

        foreach ($errors as $error) {
            $lines[] = sprintf('%s: %s', $error['field'], $error['message']);
        }

        return implode("\n", $lines);
    }
}
