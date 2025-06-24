<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Utility;

class IntegerUtility
{

    /**
     * Explodes a string into an array of integers with strict validation
     *
     * @param string $delimiter The delimiter to split on
     * @param string $string The string to explode
     * @param bool $removeEmptyValues Whether to remove empty values before processing
     * @param bool $allowLeadingZeros Whether to allow leading zeros (e.g., "007")
     * @param bool $allowSigns Whether to allow + and - signs
     *
     * @return array<int, int>
     * @throws InvalidIntegerException When invalid integer values are found
     * @throws \InvalidArgumentException When delimiter is empty
     */
    public static function strictIntExplode(
        string $delimiter,
        string $string,
        bool $removeEmptyValues = false,
        bool $allowLeadingZeros = false,
        bool $allowSigns = true
    ): array {
        self::validateDelimiter($delimiter);

        $result = explode($delimiter, $string);
        $integers = [];
        $position = 0;

        foreach ($result as $value) {
            $trimmedValue = trim($value);

            if ($removeEmptyValues && $trimmedValue === '') {
                continue;
            }

            if ($trimmedValue === '') {
                throw new InvalidIntegerException($value, $position);
            }

            if (!self::isValidInteger($trimmedValue, $allowLeadingZeros, $allowSigns)) {
                throw new InvalidIntegerException($value, $position);
            }

            $intValue = (int) $trimmedValue;

            // Additional check for integer overflow
            if ((string) $intValue !== $trimmedValue && !($allowLeadingZeros && ltrim($trimmedValue, '0+-') === ltrim((string) $intValue, '0+-'))) {
                throw new InvalidIntegerException($value, $position);
            }

            $integers[] = $intValue;
            $position++;
        }

        return $integers;
    }


    /**
     * Validates if a string represents a valid integer
     */
    public static function isValidInteger(
        string $value,
        bool $allowLeadingZeros = false,
        bool $allowSigns = true
    ): bool {
        if ($value === '') {
            return false;
        }

        $pattern = '/^';

        if ($allowSigns) {
            $pattern .= '[+-]?';
        }

        if ($allowLeadingZeros) {
            $pattern .= '\d+';
        } else {
            $pattern .= '(?:0|[1-9]\d*)';
        }

        $pattern .= '$/';

        return preg_match($pattern, $value) === 1;
    }


    /**
     * Validates delimiter parameter
     *
     * @throws \InvalidArgumentException When delimiter is empty
     */
    private static function validateDelimiter(string $delimiter): void
    {
        if ($delimiter === '') {
            throw new \InvalidArgumentException('Delimiter cannot be empty');
        }
    }
}
