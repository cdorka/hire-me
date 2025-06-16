<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\UserFuncs\FormEngine;

use ChristianDorka\HireMe\Enum\Job\EducationRequirements;
use ChristianDorka\HireMe\Enum\Job\EmploymentType;
use ChristianDorka\HireMe\Enum\Job\JobLocationType;
use ChristianDorka\HireMe\Enum\Salary\SalaryCurrency;
use ChristianDorka\HireMe\Enum\Salary\SalaryType;
use ChristianDorka\HireMe\Enum\Salary\SalaryUnit;

class ReplacementsProcFunc
{
    static function generalSlugProcFunc() : array {
        return [
            // Slashes and separators
            '/' => '-',
            '\\' => '-',
            '|' => '-',

            // Gender notations
            'd-f-m' => '',
            'd-w-m' => '',
            'm-f-d' => '',
            'm-f-x' => '',
            'm-w-d' => '',
            'm-w-x' => '',

            // Trademark and copyright symbols
            '®' => '',
            '™' => '',
            '©' => '',
            '℗' => '',
            '℠' => '',

            // Company suffixes (German)
           'gmbh' => '',
           'GmbH' => '',
           'AG' => '',
           'kg' => '',
           'KG' => '',
           'e.V.' => '',
           'e.v.' => '',
           'ohg' => '',
           'OHG' => '',
           'gbr' => '',
           'GbR' => '',
           'ug' => '',
           'UG' => '',
           'gmbh & co. kg' => '',
           'GmbH & Co. KG' => '',

            // Company suffixes (International)
            'inc' => '',
            'Inc.' => '',
            'ltd' => '',
            'Ltd.' => '',
            'llc' => '',
            'LLC' => '',
            'corp' => '',
            'Corp.' => '',
            'plc' => '',
            'PLC' => '',
            's.a.' => '',
            'S.A.' => '',
            'b.v.' => '',
            'B.V.' => '',

            // Special characters and punctuation
            '&' => 'and',
            '+' => 'plus',
            '@' => 'at',
            '#' => '',
            '$' => '',
            '%' => 'percent',
            '^' => '',
            '*' => '',
            '=' => '',
            '~' => '',
            '`' => '',
            '"' => '',
            "'" => '',
            '!' => '',
            '?' => '',
            '.' => '',
            ',' => '',
            ';' => '',
            ':' => '',
            '(' => '',
            ')' => '',
            '[' => '',
            ']' => '',
            '{' => '',
            '}' => '',
            '<' => '',
            '>' => '',

            // Multiple spaces to single dash
            '  ' => '-',
            '   ' => '-',
            '    ' => '-',
        ];
    }
}
