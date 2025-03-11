<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Terminal42\CashctrlApi\Result;

class ValidationErrorException extends RuntimeException
{
    public function __construct(
        private readonly Result $result,
        \Throwable|null $previous = null,
    ) {
        parent::__construct($this->generateMessage(), 0, $previous);
    }

    public function getResult(): Result
    {
        return $this->result;
    }

    public function getErrors(): array
    {
        return $this->result->errors();
    }

    private function generateMessage()
    {
        $lines = [];
        $errors = $this->getErrors();

        if (empty($errors)) {
            return json_encode($this->result->getArrayCopy(), JSON_THROW_ON_ERROR);
        }

        foreach ($errors as $error) {
            if (!\is_array($error)) {
                $lines[] = $error;
            } else {
                $lines[] = \sprintf('%s: %s', $error['field'], $error['message']);
            }
        }

        return implode("\n", $lines);
    }
}
