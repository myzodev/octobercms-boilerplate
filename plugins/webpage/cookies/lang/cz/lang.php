<?php return [
    'plugin' => [
        'name' => 'GDPR',
        'description' => 'GDPR, Cookies...',
        'settings' => [
            'cookies_settings_title' => 'Nastavení Cookies',
            'cookies_settings_description' => 'Správa a konfigurace souborů cookie, lišty souborů cookie a jejich nastavení.',
            'cookies_text_title' => 'GDPR',
            'cookies_text_content' => 'Správa obecného nařízení o ochraně údajů'
        ],
        'permissions' => [
            'label' => 'Správa souborů cookie a lišty souborů cookie.'
        ]
    ],
    'tabs' => [
        'cookies' => 'Cookies',
        'cookie_bar' => 'Lišta souborů cookie',
        'settings' => 'Nastavení',
    ],
    'cookie_title' => 'Název',
    'cookie_description' => 'Popis',
    'cookie_text_title' => 'Název',
    'cookie_text_text' => 'Text',
    'cookies' => 'Cookies',
    'required' => 'Povinný',
    'required_comments' => 'Tento soubor cookie je povinný a je zkontrolován jako výchozí, ale uživatelem nelze odznačit.',
    'enabled' => 'Povoleno',
    'enabled_comment' => 'Tento soubor cookie je zkontrolován jako výchozí, ale uživatelem může být odznačen.',
    'add_cookie' => 'Přidat cookie',
    'section_scripts' => 'Skripty',
    'scripts' => 'Skripty',
    'scripts_comment' => 'Zde můžete definovat, které skripty se mají spustit, pokud je cookie přijato.',
    'script_title' => 'Název (volitelný)',
    'script_code' => 'Kód',
    'cookie_slug' => 'Kód',
    'settings' => [
        'cookies_expiration_days' => 'Doba platnosti cookies v dnech',
        'cookies_expiration_days_comment' => 'Určuje, jak dlouho mají cookies trvat v prohlížeči uživatele.',
        'cookie_bar_mode' => 'Režim lišty souborů cookie',
        'cookie_bar_mode_comment' => 'Změnit zobrazovací režim lišty souborů cookie.',
        'cookie_bar_mode_expanded' => 'Rozšířený',
        'cookie_bar_mode_simple' => 'Jednoduchý',
        'cookies_disable' => 'Vypnout cookies',
        'cookies_disable_comment' => 'Stránka přestane používat tento plugin.',
        'cookies_disable_warning' => 'Cookies jsou zakázány',
        'cookies_disable_warning_comment' => 'Na webu nebudou zobrazeny žádné cookies. Toto nastavení můžete změnit v záložce nastavení.',
    ],
    'cookie_bar_title' => 'Název',
    'cookie_bar_description' => 'Popis',
    'cookie_bar_section_buttons' => 'Tlačítka',
    'cookie_bar_add_button' => 'Přidat tlačítko',
    'buttons' => [
        'title' => 'Název',
        'allow_all' => 'Povolit vše',
        'allow_all_comment' => 'Toto tlačítko povolí všechny cookies.',
        'deny_all' => 'Odmítnout vše',
        'deny_all_comment' => 'Toto tlačítko odmítne všechny cookies.',
        'allow_selection' => 'Povolit výběr',
        'allow_selection_comment' => 'Toto tlačítko povolí pouze cookies vybrané uživatelem.',
        'style' => 'Styl',
        'style_comment' => 'Zde můžete vybrat CSS třídu pro tlačítko.',
    ],
    'bar' => [
        'accept_all_text' => 'Přijmout vše',
        'show_options_text' => 'Zobrazit možnosti',
    ]
];
