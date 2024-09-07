<?php return [
    'plugin' => [
        'name' => 'GDPR',
        'description' => 'GDPR, Cookies...',
        'settings' => [
            'cookies_settings_title' => 'Nastavenia Cookies',
            'cookies_settings_description' => 'Nastavenia pre cookies.',
            'cookies_text_title' => 'GDPR',
            'cookies_text_content' => 'Nastavenia pre vyhlásenie o ochrane osobných údajov.'
        ],
        'permissions' => [
            'label' => 'Správa súborov cookies a cookie panela.'
        ]
    ],
    'tabs' => [
        'cookies' => 'Súbory cookie',
        'cookie_bar' => 'Panel súborov cookie',
        'settings' => 'Nastavenia',
    ],
    'cookie_title' => 'Názov',
    'cookie_description' => 'Popis',
    'cookies' => 'Súbory cookie',
    'required' => 'Povinné',
    'required_comments' => 'Tento súbor cookie je povinný a je predvolene zaškrtnutý, ale užívateľ ho nemôže odznačiť.',
    'enabled' => 'Povolené',
    'enabled_comment' => 'Tento súbor cookie je predvolene zaškrtnutý, ale užívateľ ho môže odznačiť.',
    'add_cookie' => 'Pridať súbor cookie',
    'section_scripts' => 'Skripty',
    'scripts' => 'Skripty',
    'scripts_comment' => 'Tu môžete definovať, ktoré skripty sa majú spustiť, ak je súbor cookie akceptovaný.',
    'script_title' => 'Názov (voliteľné)',
    'script_code' => 'Kód',
    'cookie_slug' => 'Kód',
    'settings' => [
        'cookies_expiration_days' => 'Dni platnosti súborov cookie',
        'cookies_expiration_days_comment' => 'Určuje, ako dlho majú súbory cookie trvať v prehliadači užívateľa.',
        'cookie_bar_mode' => 'Režim panelu súborov cookie',
        'cookie_bar_mode_comment' => 'Zmeniť režim zobrazenia panelu súborov cookie.',
        'cookie_bar_mode_expanded' => 'Rozšírený',
        'cookie_bar_mode_simple' => 'Jednoduchý',
        'cookies_disable' => 'Vypnúť cookies',
        'cookies_disable_comment' => 'Stránka prestane používať tento plugin.',
        'cookies_disable_warning' => 'Tento plugin je vypnutý',
        'cookies_disable_warning_comment' => 'Cookies sa neukážu na stránke, lebo sú vypnuté. Toto nastavenie môžete zmeniť v záložke nastavenia.',
    ],
    'cookie_bar_title' => 'Názov',
    'cookie_bar_description' => 'Popis',
    'cookie_bar_section_buttons' => 'Tlačidlá',
    'cookie_bar_add_button' => 'Pridať tlačidlo',
    'buttons' => [
        'title' => 'Názov',
        'allow_all' => 'Povoliť všetky',
        'allow_all_comment' => 'Toto tlačidlo povolí všetky súbory cookie.',
        'deny_all' => 'Odmietnuť všetky',
        'deny_all_comment' => 'Toto tlačidlo odmietne všetky súbory cookie.',
        'allow_selection' => 'Povoliť výber',
        'allow_selection_comment' => 'Toto tlačidlo povolí len súbory cookie vybrané užívateľom.',
        'style' => 'Štýl',
        'style_comment' => 'Tu môžete vybrať CSS triedu pre tlačidlo.',
    ],
    'bar' => [
        'accept_all_text' => 'Prijať všetko',
        'show_options_text' => 'Zobraziť nastavenia',
    ]
];
