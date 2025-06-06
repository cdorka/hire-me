<?php
declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting',
        'label' => 'title',
        'descriptionColumn' => 'internal_description',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'versioningWS' => true,
        'versioningWS_alwaysAllowLiveEdit' => true,
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'hideAtCopy' => true,
        'searchFields' => 'title,job_id,teaser,intro',
        'iconfile' => 'EXT:hire_me/Resources/Public/Icons/tx_hireme_domain_model_jobposting.svg',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        // Custom fields from Content Block
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.title.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.title.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'newtime' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.newtime.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.newtime.description',
            'config' => [
                'type' => 'datetime',
                'default' => 0,

            ],
        ],
        'toptime' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.toptime.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.toptime.description',
            'config' => [
                'type' => 'datetime',
                'default' => 0,

            ],
        ],
        'types' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.types.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.types.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_type',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_type}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_type_mm',
                'MM_opposite_field' => 'job_postings',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],
        'scopes' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.scopes.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.scopes.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_scope',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_scope}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_scope_mm',
                'MM_opposite_field' => 'job_postings',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],
        'slug' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.slug.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.slug.description',
            'config' => [
                'type' => 'slug',
                'generatorOptions' => [
                    'fields' => ['title'],
                    'fieldSeparator' => '-',
                    'prefixParentPageSlug' => false,
                    'replacements' => \ChristianDorka\HireMe\UserFuncs\FormEngine\ReplacementsProcFunc::generalSlugProcFunc(),
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
                'default' => '',
                'required' => true,
            ],
        ],
        'hide_hiring_organization' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.hide_hiring_organization.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.hide_hiring_organization.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'hiring_organizations' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.hiring_organizations.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.hiring_organizations.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_organization',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_organization}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_organization_mm',
                'MM_opposite_field' => 'job_postings',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],
        'job_id' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_id.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_id.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim,unique',
            ],
        ],
        'employment_types' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.employment_types.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.employment_types.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->employmentTypeItemsProcFunc',
            ],
        ],
        'career_levels' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.career_levels.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.career_levels.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->careerLevelsItemsProcFunc',
            ],
        ],
        'employment_unit' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.employment_unit.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.employment_unit.description',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'teaser' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.teaser.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.teaser.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
            ],
        ],
        'intro' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.intro.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.intro.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 5,
                'enableRichtext' => true,
            ],
        ],
        'eligibility_to_work_requirement' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.eligibility_to_work_requirement.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.eligibility_to_work_requirement.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'responsibilities' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.responsibilities.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.responsibilities.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 5,
            ],
        ],
        'qualifications' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.qualifications.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.qualifications.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 5,
            ],
        ],
        'skills' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.skills.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.skills.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 5,
            ],
        ],
        'working_hours' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.working_hours.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.working_hours.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
            ],
        ],
        'education_requirements_text' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.education_requirements_text.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.education_requirements_text.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
            ],
        ],
        'education_requirements' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.education_requirements.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.education_requirements.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->educationRequirementsItemsProcFunc',
            ],
        ],
        'experience_requirements_type' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.experience_requirements_type.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.experience_requirements_type.description',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->experienceRequirementsTypeItemsProcFunc',
            ],
        ],
        'experience_requirements_text' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.experience_requirements_text.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.experience_requirements_text.description',
            'displayCond' => 'FIELD:experience_requirements_type:=:0' . \ChristianDorka\HireMe\Enum\Job\ExperienceRequirementsType::TEXT->value,
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
            ],
        ],
        'experience_requirements' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.experience_requirements.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.experience_requirements.description',
            'displayCond' => 'FIELD:experience_requirements_type:=:' . \ChristianDorka\HireMe\Enum\Job\ExperienceRequirementsType::MONTH->value,
            'config' => [
                'type' => 'number',
                'format' => 'integer',
                'size' => 10,
                'default' => 0,
                'range' => [
                    'lower' => 0,
                ],
            ],
        ],
        'incentives' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.incentives.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.incentives.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_incentive',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_incentive}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_incentive_mm',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],
        'benefits' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.benefits.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.benefits.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_benefit',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_benefit}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_benefit_mm',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],
        'physical_requirements' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.physical_requirements.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.physical_requirements.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_physicalrequirement',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_physicalrequirement}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_physicalrequirement_mm',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],
        'sensory_requirements' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.sensory_requirements.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.sensory_requirements.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_sensoryrequirement',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_sensoryrequirement}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_sensoryrequirement_mm',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],
        'job_location_type' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_location_type.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_location_type.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->jobLocationTypeItemsProcFunc',
            ],
        ],
        'locations' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.locations.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.locations.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_location',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_location}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_domain_model_jobposting_location_mm',
                'MM_opposite_field' => 'job_postings',
                'minitems' => 1,
                'size' => 10,
                'maxitems' => 9999,
            ],
        ],
        'applicant_location_requirements' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.applicant_location_requirements.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.applicant_location_requirements.description',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'has_base_salary' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.has_base_salary.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.has_base_salary.description',
            'onChange' => 'reload',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'base_salary_type' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_type.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_type.description',
            'displayCond' => 'FIELD:has_base_salary:=:1',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->salaryTypeItemsProcFunc',
            ],
        ],
        'base_salary' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary.description',
            'displayCond' => 'FIELD:base_salary_type:=:0',
            'config' => [
                'type' => 'number',
                'format' => 'decimal',
                'size' => 10,
                'default' => 0,
                'range' => [
                    'lower' => 0,
                ],
            ],
        ],
        'base_salary_min' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_min.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_min.description',
            'displayCond' => 'FIELD:base_salary_type:=:1',
            'config' => [
                'type' => 'number',
                'format' => 'decimal',
                'size' => 10,
                'default' => 0,
                'range' => [
                    'lower' => 0,
                ],
            ],
        ],
        'base_salary_max' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_max.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_max.description',
            'displayCond' => 'FIELD:base_salary_type:=:1',
            'config' => [
                'type' => 'number',
                'format' => 'decimal',
                'size' => 10,
                'default' => 0,
                'range' => [
                    'lower' => 0,
                ],
            ],
        ],
        'base_salary_unit' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_unit.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_unit.description',
            'displayCond' => 'FIELD:has_base_salary:=:1',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->salaryUnitItemsProcFunc',
            ],
        ],
        'base_salary_currency' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_currency.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.base_salary_currency.description',
            'displayCond' => 'FIELD:has_base_salary:=:1',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc::class . '->salaryCurrencyItemsProcFunc',
            ],
        ],
        'valid_through' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.valid_through.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.valid_through.description',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
            ],
        ],
        'job_immediate_start' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_immediate_start.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_immediate_start.description',
            'onChange' => 'reload',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'job_start_date' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_start_date.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.job_start_date.description',
            'displayCond' => 'FIELD:job_immediate_start:=:0',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
            ],
        ],
        'has_direct_apply' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.has_direct_apply.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.has_direct_apply.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'special_commitments' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.special_commitments.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.special_commitments.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_hireme_domain_model_specialrequirement',
                'foreign_field' => 'parent_uid',
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'levelLinksPosition' => 'top',
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => true,
                        'sort' => true,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true,
                    ],
                ],
            ],
        ],
        'security_clearance_requirement' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.security_clearance_requirement.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.security_clearance_requirement.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'categories' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.categories.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.categories.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_domain_model_category',
                'multiple' => false,
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_category}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_jobposting_category_mm',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ],

        // System fields
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,

            ],
        ],
        'fe_group' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        'value' => -1,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        'value' => -2,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        'value' => '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
            ],
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_hireme_domain_model_physicalrequirement',
                'foreign_table_where' => 'AND {#tx_hireme_domain_model_physicalrequirement}.{#pid}=###CURRENT_PID### AND {#tx_hireme_domain_model_physicalrequirement}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],
        'crdate' => [
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'tstamp' => [
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ]
        ],
    ],
    'palettes' => [
        'hidden' => [
            'showitem' => 'hidden',
        ],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.starttime,endtime;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime,--linebreak--,fe_group;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
        ],
        'language' => [
            'showitem' => 'sys_language_uid,l10n_parent',
        ],
        'salary' => [
            'showitem' => 'has_base_salary,--linebreak--,base_salary_type,--linebreak--,base_salary,base_salary_min,base_salary_max,--linebreak--,base_salary_unit,base_salary_currency',
        ],
        'application' => [
            'showitem' => 'valid_through,--linebreak--,job_immediate_start,job_start_date,--linebreak--,has_direct_apply',
        ],
        'experience' => [
            'showitem' => 'experience_requirements_type,--linebreak--,experience_requirements_text,--linebreak--,experience_requirements',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.general,
                    title,newtime,toptime,types,scopes,slug,hide_hiring_organization,hiring_organizations,job_id,employment_types,career_levels,employment_unit,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.information,
                    teaser,intro,eligibility_to_work_requirement,responsibilities,qualifications,skills,working_hours,education_requirements_text,education_requirements,--palette--;;experience,incentives,benefits,physical_requirements,sensory_requirements,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.location,
                    job_location_type,locations,applicant_location_requirements,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.salary,
                    --palette--;;salary,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.application,
                    --palette--;;application,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.special,
                    special_commitments,security_clearance_requirement,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.seo,
                    --palette--;;palette_seo,
                    --palette--;;palette_robots,
                    --palette--;;palette_canonical,
                    --palette--;;palette_sitemap,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.social_media,
                    --palette--;;palette_open_graph_facebook,
                    --palette--;;palette_open_graph_twitter,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_domain_model_jobposting.tab.categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.access,
                    --palette--;;hidden,
                    --palette--;;access,
            ',
            'columnsOverrides' => [
                'starttime' => [
                    'config' => [
                        'required' => true,
                    ],
                ],
            ],
        ],
    ],
];
