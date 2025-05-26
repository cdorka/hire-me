<?php

declare(strict_types=1);

defined('TYPO3') or die();

// Override TCA for tx_hireme_jobposting table
(function () {
    $table = 'tx_hireme_jobposting';

    // Common palettes that might contain starttime
    $commonTimePalettes = ['access', 'timeRestriction', 'hiddenTime', 'visibility'];

    foreach ($commonTimePalettes as $paletteName) {
        if (isset($GLOBALS['TCA'][$table]['palettes'][$paletteName]['showitem'])) {
            $showItem = $GLOBALS['TCA'][$table]['palettes'][$paletteName]['showitem'];

            // Only modify if this palette has starttime
            if (strpos($showItem, 'starttime') !== false) {
                // Split the showitem string into an array of fields
                $fields = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $showItem, true);
                $newFields = [];

                // Keep all fields except starttime
                foreach ($fields as $field) {
                    // Check if field is starttime (exact match or with configuration)
                    // This handles cases like 'starttime' or 'starttime;LLL:EXT:core/...'
                    if (!preg_match('/^starttime(;.*)?$/', trim($field))) {
                        $newFields[] = $field;
                    }
                }

                // Only update if we have fields left
                if (!empty($newFields)) {
                    $GLOBALS['TCA'][$table]['palettes'][$paletteName]['showitem'] = implode(',', $newFields);
                } else {
                    // If the palette would be empty, use hidden field as fallback
                    $GLOBALS['TCA'][$table]['palettes'][$paletteName]['showitem'] = 'hidden';
                }
            }
        }
    }
})();
