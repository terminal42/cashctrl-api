<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

use Terminal42\CashctrlApi\Exception\RuntimeException;

class XmlHelper
{
    public static function parseValues(string $content): array
    {
        self::checkDomExtension();

        $data = [];

        $dom = new \DOMDocument();
        if (!$dom->loadXML($content)) {
            throw new RuntimeException('Failed to load XML');
        }

        $dom->normalizeDocument();
        foreach ($dom->getElementsByTagName('values') as $values) {
            foreach ($values->childNodes as $field) {
                $data[(string) $field->nodeName] = (string) $field->nodeValue;
            }
        }

        return $data;
    }

    public static function dumpValues(array $data): string
    {
        self::checkDomExtension();

        $dom = new \DOMDocument();
        $values = $dom->createElement('values');
        $dom->appendChild($values);
        foreach ($data as $k => $v) {
            $field = $dom->createElement($k, $v);
            $values->appendChild($field);
        }

        return $dom->saveXML($dom->documentElement);
    }

    private static function checkDomExtension(): void
    {
        if (!\extension_loaded('dom')) {
            throw new \LogicException('PHP DOM extension is required.');
        }
    }
}
