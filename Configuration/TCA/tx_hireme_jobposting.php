<?php
declare(strict_types=1);

use ChristianDorka\HireMe\Enum\Job\ApplicationType;
use ChristianDorka\HireMe\Enum\Job\EducationRequirementsType;
use ChristianDorka\HireMe\UserFuncs\FormEngine\JobPostingItemsProcFunc;

return [
    "ctrl" => [
        "title" =>
            "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting",
        "label" => "title",
        "descriptionColumn" => "internal_description",
        "sortby" => "sorting",
        "tstamp" => "tstamp",
        "crdate" => "crdate",
        "delete" => "deleted",
        "versioningWS" => true,
        "versioningWS_alwaysAllowLiveEdit" => true,
        "enablecolumns" => [
            "disabled" => "hidden",
            "starttime" => "starttime",
            "endtime" => "endtime",
            "fe_group" => "fe_group",
        ],
        "hideAtCopy" => true,
        "searchFields" => "title,job_id,teaser,intro",
        "iconfile" =>
            "EXT:hire_me/Resources/Public/Icons/tx_hireme_jobposting.svg",
        "languageField" => "sys_language_uid",
        "transOrigPointerField" => "l10n_parent",
        "transOrigDiffSourceField" => "l10n_diffsource",
        "translationSource" => "l10n_source",
        "security" => [
            "ignorePageTypeRestriction" => true,
        ],
    ],
    "columns" => [
        // Custom fields from Content Block
        "title" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.title.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.title.description",
            "config" => [
                "type" => "input",
                "size" => 50,
                "max" => 255,
                "eval" => "trim",
                "required" => true,
            ],
        ],
        "newtime" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.newtime.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.newtime.description",
            "config" => [
                "type" => "datetime",
                "default" => 0,
            ],
        ],
        "toptime" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.toptime.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.toptime.description",
            "config" => [
                "type" => "datetime",
                "default" => 0,
            ],
        ],
        "types" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.types.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.types.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_type",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_type}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_type_mm",
                "MM_opposite_field" => "job_postings",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "scopes" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.scopes.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.scopes.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_scope",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_scope}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_scope_mm",
                "MM_opposite_field" => "job_postings",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "slug" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.slug.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.slug.description",
            "config" => [
                "type" => "slug",
                "generatorOptions" => [
                    "fields" => ["title"],
                    "fieldSeparator" => "-",
                    "prefixParentPageSlug" => false,
                    "replacements" => \ChristianDorka\HireMe\UserFuncs\FormEngine\ReplacementsProcFunc::generalSlugProcFunc(),
                ],
                "fallbackCharacter" => "-",
                "eval" => "unique",
                "default" => "",
                "required" => true,
            ],
        ],
        "hide_hiring_organization" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.hide_hiring_organization.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.hide_hiring_organization.description",
            "config" => [
                "type" => "check",
                "renderType" => "checkboxToggle",
                "default" => 0,
            ],
        ],
        "hiring_organizations" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.hiring_organizations.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.hiring_organizations.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_organization",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_organization}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_organization_mm",
                "MM_opposite_field" => "job_postings",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "job_id" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_id.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_id.description",
            "config" => [
                "type" => "input",
                "size" => 30,
                "max" => 255,
                "eval" => "trim,unique",
            ],
        ],
        "employment_types" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.employment_types.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.employment_types.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectCheckBox",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->employmentTypeItemsProcFunc",
            ],
        ],
        "career_levels" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.career_levels.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.career_levels.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectCheckBox",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->careerLevelsItemsProcFunc",
            ],
        ],
        "employment_unit" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.employment_unit.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.employment_unit.description",
            "config" => [
                "type" => "passthrough",
            ],
        ],
        "teaser" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.teaser.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.teaser.description",
            "config" => [
                "type" => "text",
                "cols" => 50,
                "rows" => 3,
            ],
        ],
        "intro" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.intro.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.intro.description",
            "config" => [
                "type" => "text",
                "cols" => 50,
                "rows" => 5,
                "enableRichtext" => true,
            ],
        ],
        "eligibility_to_work_requirement" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.eligibility_to_work_requirement.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.eligibility_to_work_requirement.description",
            "config" => [
                "type" => "input",
                "size" => 50,
                "max" => 255,
                "eval" => "trim",
            ],
        ],
        "responsibilities" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.responsibilities.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.responsibilities.description",
            "config" => [
                "type" => "text",
                "enableRichtext" => true,
            ],
        ],
        "qualifications" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.qualifications.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.qualifications.description",
            "config" => [
                "type" => "text",
                "enableRichtext" => true,
            ],
        ],
        "skills" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.skills.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.skills.description",
            "config" => [
                "type" => "text",
                "enableRichtext" => true,
            ],
        ],
        "working_hours" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.working_hours.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.working_hours.description",
            "config" => [
                "type" => "text",
                "enableRichtext" => true,
            ],
        ],

        // Education
        "education_requirements_type" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.education_requirements_type.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.education_requirements_type.description",
            "onChange" => "reload",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->educationRequirementsTypeItemsProcFunc",
                "default" => EducationRequirementsType::FREE_TEXT->value,
            ],
        ],
        "education_requirements_text" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.education_requirements_text.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.education_requirements_text.description",
            "displayCond" =>
                "FIELD:education_requirements_type:=:" .
                EducationRequirementsType::FREE_TEXT->value,
            "config" => [
                "type" => "text",
                "cols" => 50,
                "rows" => 3,
            ],
        ],
        "education_requirements" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.education_requirements.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.education_requirements.description",
            "displayCond" =>
                "FIELD:education_requirements_type:=:" .
                EducationRequirementsType::SELECTION->value,
            "config" => [
                "type" => "select",
                "renderType" => "selectCheckBox",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->educationRequirementsItemsProcFunc",
            ],
        ],

        // Experience
        "experience_requirements" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.experience_requirements.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.experience_requirements.description",
            "config" => [
                "type" => "text",
                "enableRichtext" => true,
            ],
        ],
        "experience_requirements_month" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.experience_requirements_month.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.experience_requirements_month.description",
            "config" => [
                "type" => "number",
                "format" => "integer",
                "size" => 10,
                "default" => null,
                "nullable" => true,
                "range" => [
                    "lower" => 0,
                ],
            ],
        ],
        "accepts_education_or_experience" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.accepts_education_or_experience.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.accepts_education_or_experience.description",
            "config" => [
                "type" => "check",
                "renderType" => "checkboxToggle",
                "default" => 0,
            ],
        ],

        // benefits
        "incentives" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.incentives.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.incentives.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_incentive",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_incentive}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_incentive_mm",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "benefits" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.benefits.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.benefits.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_benefit",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_benefit}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_benefit_mm",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],

        // Cognitive requirements
        "physical_requirements" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.physical_requirements.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.physical_requirements.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_physicalrequirement",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_physicalrequirement}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_physicalrequirement_mm",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "sensory_requirements" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.sensory_requirements.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.sensory_requirements.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_sensoryrequirement",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_sensoryrequirement}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_sensoryrequirement_mm",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],

        // Location
        "job_location_type" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_location_type.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_location_type.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->jobLocationTypeItemsProcFunc",
            ],
        ],
        "locations" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.locations.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.locations.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_location",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_location}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_location_mm",
                "MM_opposite_field" => "job_postings",
                "minitems" => 1,
                "size" => 10,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "applicant_location_requirements" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.applicant_location_requirements.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.applicant_location_requirements.description",
            "config" => [
                "type" => "passthrough",
            ],
        ],
        "has_base_salary" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.has_base_salary.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.has_base_salary.description",
            "onChange" => "reload",
            "config" => [
                "type" => "check",
                "renderType" => "checkboxToggle",
                "default" => 0,
            ],
        ],
        "base_salary_type" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_type.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_type.description",
            "displayCond" => "FIELD:has_base_salary:=:1",
            "onChange" => "reload",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->salaryTypeItemsProcFunc",
            ],
        ],
        "base_salary" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary.description",
            "displayCond" => "FIELD:base_salary_type:=:0",
            "config" => [
                "type" => "number",
                "format" => "decimal",
                "size" => 10,
                "default" => 0,
                "range" => [
                    "lower" => 0,
                ],
            ],
        ],
        "base_salary_min" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_min.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_min.description",
            "displayCond" => "FIELD:base_salary_type:=:1",
            "config" => [
                "type" => "number",
                "format" => "decimal",
                "size" => 10,
                "default" => 0,
                "range" => [
                    "lower" => 0,
                ],
            ],
        ],
        "base_salary_max" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_max.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_max.description",
            "displayCond" => "FIELD:base_salary_type:=:1",
            "config" => [
                "type" => "number",
                "format" => "decimal",
                "size" => 10,
                "default" => 0,
                "range" => [
                    "lower" => 0,
                ],
            ],
        ],
        "base_salary_unit" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_unit.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_unit.description",
            "displayCond" => "FIELD:has_base_salary:=:1",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->salaryUnitItemsProcFunc",
            ],
        ],
        "base_salary_currency" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_currency.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.base_salary_currency.description",
            "displayCond" => "FIELD:has_base_salary:=:1",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->salaryCurrencyItemsProcFunc",
            ],
        ],
        "valid_through" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.valid_through.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.valid_through.description",
            "config" => [
                "type" => "datetime",
                "default" => 0,
            ],
        ],
        "job_immediate_start" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_immediate_start.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_immediate_start.description",
            "onChange" => "reload",
            "config" => [
                "type" => "check",
                "renderType" => "checkboxToggle",
                "default" => 0,
            ],
        ],
        "job_start_date" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_start_date.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.job_start_date.description",
            "displayCond" => "FIELD:job_immediate_start:=:0",
            "config" => [
                "type" => "datetime",
                "default" => 0,
            ],
        ],

        // Application options
        "application_type" => [
            "exclude" => false,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_type.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_type.description",
            "onChange" => "reload",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->applicationTypeItemsProcFunc",
                "default" => ApplicationType::NONE->value,
            ],
        ],
        "application_email" => [
            "exclude" => false,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_email.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_email.description",
            // "displayCond" => "FIELD:application_type:=:" . ApplicationType::EMAIL->value,
            "config" => [
                "required" => true,
                "type" => "email",
            ],
        ],
        "application_link" => [
            "exclude" => false,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_link.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_link.description",
            // "displayCond" => "FIELD:application_type:=:" . ApplicationType::EXTERNAL_LINK->value,
            "config" => [
                "required" => true,
                "type" => "link",
            ],
        ],
        "application_form" => [
            "exclude" => false,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_form.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.application_form.description",
            // "displayCond" => "FIELD:application_type:=:" . ApplicationType::TYPO3_FORM->value,
            "config" => [
                "required" => true,
                "type" => "select",
                "renderType" => "selectSingle",
                "itemsProcFunc" =>
                    JobPostingItemsProcFunc::class .
                    "->applicationFormsItemsProcFunc",
                "items" => [
                    [
                        "label" => "-- Bitte wählen --",
                        "value" => null,
                    ],
                ],
                "default" => null,
            ],
        ],

        // Journey
        "journey" => [
            "exclude" => false,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.journey.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.journey.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "foreign_table" => "tx_hireme_journey",
                "foreign_table_where" =>
                    "AND {#tx_hireme_journey}.{#sys_language_uid} IN (-1,0)",
                "items" => [
                    [
                        "label" => "-- TODO empty --",
                        "value" => null,
                    ],
                ],
            ],
        ],

        // Faq
        "faqs" => [
            "exclude" => false,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.faqs.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.faqs.description",
            "config" => [
                "type" => "group",
                "allowed" => "tx_hireme_faq,tx_hireme_faqgroup",
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "categories" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.categories.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.categories.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "foreign_table" => "tx_hireme_category",
                "multiple" => false,
                "foreign_table_where" =>
                    "AND {#tx_hireme_category}.{#sys_language_uid} IN (-1,0)",
                "MM" => "tx_hireme_jobposting_category_mm",
                "minitems" => 0,
                "maxitems" => 9999,
                "fieldControl" => [
                    "editPopup" => [
                        "disabled" => false,
                    ],
                    "addRecord" => [
                        "disabled" => false,
                    ],
                    "listModule" => [
                        "disabled" => false,
                    ],
                ],
            ],
        ],
        "sys_categories" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.sys_categories.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.sys_categories.description",
            "config" => [
                'type' => 'category',
            ],
        ],

        // System fields
        "hidden" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.hidden.description",
            "config" => [
                "type" => "check",
                "renderType" => "checkboxToggle",
                "items" => [
                    [
                        "label" => "",
                        "invertStateDisplay" => true,
                    ],
                ],
            ],
        ],
        "starttime" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.starttime.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.starttime.description",
            "config" => [
                "type" => "datetime",
                "default" => 0,
            ],
        ],
        "endtime" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.endtime.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.endtime.description",
            "config" => [
                "type" => "datetime",
                "default" => 0,
            ],
        ],
        "fe_group" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.fe_group.description",
            "config" => [
                "type" => "select",
                "renderType" => "selectMultipleSideBySide",
                "size" => 5,
                "maxitems" => 20,
                "items" => [
                    [
                        "label" =>
                            "LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login",
                        "value" => -1,
                    ],
                    [
                        "label" =>
                            "LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login",
                        "value" => -2,
                    ],
                    [
                        "label" =>
                            "LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups",
                        "value" => "--div--",
                    ],
                ],
                "exclusiveKeys" => "-1,-2",
                "foreign_table" => "fe_groups",
            ],
        ],
        "sys_language_uid" => [
            "exclude" => true,
            "label" =>
                "LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language",
            "config" => [
                "type" => "language",
            ],
        ],
        "l10n_parent" => [
            "displayCond" => "FIELD:sys_language_uid:>:0",
            "label" =>
                "LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent",
            "config" => [
                "type" => "select",
                "renderType" => "selectSingle",
                "items" => [
                    [
                        "label" => "",
                        "value" => 0,
                    ],
                ],
                "foreign_table" => "tx_hireme_physicalrequirement",
                "foreign_table_where" =>
                    "AND {#tx_hireme_physicalrequirement}.{#pid}=###CURRENT_PID### AND {#tx_hireme_physicalrequirement}.{#sys_language_uid} IN (-1,0)",
                "default" => 0,
            ],
        ],
        "l10n_source" => [
            "config" => [
                "type" => "passthrough",
            ],
        ],
        "l10n_diffsource" => [
            "config" => [
                "type" => "passthrough",
                "default" => "",
            ],
        ],
        "crdate" => [
            "config" => [
                "type" => "passthrough",
            ],
        ],
        "tstamp" => [
            "config" => [
                "type" => "passthrough",
            ],
        ],
        "sorting" => [
            "config" => [
                "type" => "passthrough",
            ],
        ],
    ],
    "palettes" => [
        "hidden" => [
            "showitem" => "hidden",
        ],
        "access" => [
            "showitem" =>
                "starttime,endtime,--linebreak--,fe_group;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group",
        ],
        "language" => [
            "showitem" => "sys_language_uid,l10n_parent",
        ],
        "salary" => [
            "showitem" =>
                "has_base_salary,--linebreak--,base_salary_type,--linebreak--,base_salary,base_salary_min,base_salary_max,--linebreak--,base_salary_unit,base_salary_currency",
        ],
        "application" => [
            "showitem" => 'valid_through,--linebreak--,job_immediate_start,job_start_date,--linebreak--,

                application_type,--linebreak--,
                application_email,--linebreak--,
                application_link,--linebreak--,
                application_form,

',
        ],
        "benefits" => [
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.benefits.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.benefits.description",
            "showitem" => "
                incentives,--linebreak--,
                benefits,",
        ],
        "cognitive_requirements" => [
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.cognitive_requirements.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.cognitive_requirements.description",
            "showitem" => "
                physical_requirements,--linebreak--,
                sensory_requirements,",
        ],
        "education" => [
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.education.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.education.description",
            "showitem" => "
                education_requirements_type,--linebreak--,
                education_requirements_text,--linebreak--,
                education_requirements,",
        ],
        "experience" => [
            "label" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.experience.label",
            "description" =>
                "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.palette.experience.description",
            "showitem" => "
                experience_requirements,--linebreak--,
                experience_requirements_month,--linebreak--,
                accepts_education_or_experience,",
        ],
    ],
    "types" => [
        "0" => [
            "showitem" => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title,newtime,toptime,types,scopes,slug,hide_hiring_organization,hiring_organizations,job_id,employment_types,career_levels,employment_unit,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.information,
                    teaser,intro,eligibility_to_work_requirement,responsibilities,qualifications,skills,working_hours,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.benefits,
                    --palette--;;benefits,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.cognitive_requirements,
                    --palette--;;cognitive_requirements,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.education,
                    --palette--;;education,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.experience,
                    --palette--;;experience,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.location,
                    job_location_type,locations,applicant_location_requirements,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.salary,
                    --palette--;;salary,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.application,
                    --palette--;;application,journey,faqs,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.seo,
                    --palette--;;palette_seo,
                    --palette--;;palette_robots,
                    --palette--;;palette_canonical,
                    --palette--;;palette_sitemap,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.social_media,
                    --palette--;;palette_open_graph_facebook,
                    --palette--;;palette_open_graph_twitter,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.categories,
                    categories,sys_categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_jobposting.tab.access,
                    --palette--;;hidden,
                    --palette--;;access,
            ',
            "columnsOverrides" => [
                "starttime" => [
                    "config" => [
                        "required" => true,
                    ],
                ],
            ],
        ],
    ],
];
