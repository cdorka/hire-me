Site Package for the project "Hire me"
==============================================================

Add some explanation here.

Add first the records where created via content blocks.
But to avoid any additional package requirements that lead to delayed upadtes or security / errors ricks i have removed it and created plain tcas.
also not every option or config from the tca is present in the content block.



# Forms
Es gibt 2 Standardformular für die Bewerbungen welche in dieser Extension vordefiniert sind. Dieser werden über eine Singleton registry registriiert.
So kann via php einfach neue Formularauswahloptionen hinzugefügt oder entfernt werden. Das geht über die ApplicationFormRegistry.php Klasse:
Beispiel:
```php
$applicationFormRegistry = GeneralUtility::makeInstance(ApplicationFormRegistry::class);
$applicationFormRegistry->registerForm(
    identifier: 'basicApplicationForm',
    path: "EXT:hire_me/Resources/Private/Forms/BasicApplicationForm.form.yaml",
    label: "Basic application form",
);
```
