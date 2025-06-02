<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Hire me',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'fluid_styled_content' => '13.4.0-13.4.99',
            'rte_ckeditor' => '13.4.0-13.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'ChristianDorka\\HireMe\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'author' => 'Christian Dorka',
    'author_email' => 'mail@christiandorka.de',
    'author_company' => 'Christian Dorka',
    'version' => '1.0.0',
];
