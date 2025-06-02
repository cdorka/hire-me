<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Salary;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Base salary currency options
 *
 * Values represent numeric currency codes according to ISO 4217
 */
enum SalaryCurrency: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * Albanian Lek
     */
    case ALL = 8;

    /**
     * Armenian Dram
     */
    case AMD = 51;

    /**
     * Azerbaijani Manat
     */
    case AZN = 944;

    /**
     * Belarusian Ruble
     */
    case BYN = 933;

    /**
     * Bosnia and Herzegovina Convertible Mark
     */
    case BAM = 977;

    /**
     * British Pound
     */
    case GBP = 826;

    /**
     * Bulgarian Lev
     */
    case BGN = 975;

    /**
     * Czech Koruna
     */
    case CZK = 203;

    /**
     * Danish Krone
     */
    case DKK = 208;

    /**
     * Euro
     */
    case EUR = 978;

    /**
     * Georgian Lari
     */
    case GEL = 981;

    /**
     * Hungarian Forint
     */
    case HUF = 348;

    /**
     * Icelandic Króna
     */
    case ISK = 352;

    /**
     * Macedonian Denar
     */
    case MKD = 807;

    /**
     * Moldovan Leu
     */
    case MDL = 498;

    /**
     * Norwegian Krone
     */
    case NOK = 578;

    /**
     * Polish Złoty
     */
    case PLN = 985;

    /**
     * Romanian Leu
     */
    case RON = 946;

    /**
     * Russian Ruble
     */
    case RUB = 643;

    /**
     * Serbian Dinar
     */
    case RSD = 941;

    /**
     * Swedish Krona
     */
    case SEK = 752;

    /**
     * Swiss Franc
     */
    case CHF = 756;

    /**
     * Turkish Lira
     */
    case TRY = 949;

    /**
     * Ukrainian Hryvnia
     */
    case UAH = 980;

    /**
     * United States Dollar
     */
    case USD = 840;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'base_salary_currency';

    /**
     * Get the ISO 4217 currency code as a string
     *
     * @return string The three-letter ISO currency code
     */
    public function getIsoCode(): string
    {
        return $this->name;
    }

    /**
     * Get the currency symbol
     *
     * @return string The currency symbol (e.g., $, €, £)
     */
    public function getSymbol(): string
    {
        return match($this) {
            self::USD => '$',
            self::EUR => '€',
            self::GBP => '£',
            self::CHF => 'CHF',
            self::PLN => 'zł',
            self::HUF => 'Ft',
            self::CZK => 'Kč',
            self::SEK, self::NOK, self::DKK => 'kr',
            default => $this->name,
        };
    }
}
