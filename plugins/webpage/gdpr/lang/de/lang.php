<?php return [
    'plugin' => [
        'name' => 'GDPR',
        'description' => 'GDPR, Cookies...',
        'settings' => [
            'cookies_settings_title' => 'Cookies',
            'cookies_settings_description' => 'Cookies verwalten und konfigurieren, Cookie-Leiste und ihre Einstellungen.',
            'cookies_text_title' => 'GDPR',
            'cookies_text_content' => 'Allgemeine Datenschutzverordnung verwalten'
        ],
        'permissions' => [
            'label' => 'Cookies und Cookie-Leiste verwalten.'
        ]
    ],
    'tabs' => [
        'cookies' => 'Cookies',
        'cookie_bar' => 'Cookie-Leiste',
        'settings' => 'Einstellungen',
    ],
    'cookie_title' => 'Titel',
    'cookie_description' => 'Beschreibung',
    'cookie_text_title' => 'Titel',
    'cookie_text_text' => 'Text',
    'cookies' => 'Cookies',
    'required' => 'Erforderlich',
    'required_comments' => 'Dieses Cookie ist erforderlich und standardmäßig aktiviert, kann jedoch vom Benutzer nicht deaktiviert werden.',
    'enabled' => 'Aktiviert',
    'enabled_comment' => 'Dieses Cookie ist standardmäßig aktiviert, kann jedoch vom Benutzer deaktiviert werden.',
    'add_cookie' => 'Cookie hinzufügen',
    'section_scripts' => 'Skripte',
    'scripts' => 'Skripte',
    'scripts_comment' => 'Hier können Sie festlegen, welche Skripte ausgeführt werden sollen, wenn das Cookie akzeptiert wird.',
    'script_title' => 'Titel (optional)',
    'script_code' => 'Code',
    'cookie_slug' => 'Code',
    'settings' => [
        'cookies_expiration_days' => 'Ablaufdauer der Cookies in Tagen',
        'cookies_expiration_days_comment' => 'Legt fest, wie lange Cookies im Browser des Benutzers gespeichert werden.',
        'cookie_bar_mode' => 'Modus der Cookie-Leiste',
        'cookie_bar_mode_comment' => 'Ändert den Anzeigemodus der Cookie-Leiste.',
        'cookie_bar_mode_expanded' => 'Erweitert',
        'cookie_bar_mode_simple' => 'Einfach',
        'cookies_disable' => 'Cookies deaktivieren',
        'cookies_disable_comment' => 'Deaktivieren Sie dieses Plugin vollständig.',
        'cookies_disable_warning' => 'Cookies sind deaktiviert',
        'cookies_disable_warning_comment' => 'Cookies werden auf der Website nicht angezeigt. Sie können diese Einstellung im Einstellungs-Tab ändern.',
    ],
    'cookie_bar_title' => 'Titel',
    'cookie_bar_description' => 'Beschreibung',
    'cookie_bar_section_buttons' => 'Schaltflächen',
    'cookie_bar_add_button' => 'Schaltfläche hinzufügen',
    'buttons' => [
        'title' => 'Titel',
        'allow_all' => 'Alle erlauben',
        'allow_all_comment' => 'Diese Schaltfläche erlaubt alle Cookies.',
        'deny_all' => 'Alle ablehnen',
        'deny_all_comment' => 'Diese Schaltfläche lehnt alle Cookies ab.',
        'allow_selection' => 'Auswahl erlauben',
        'allow_selection_comment' => 'Diese Schaltfläche erlaubt nur vom Benutzer ausgewählte Cookies.',
        'style' => 'Stil',
        'style_comment' => 'Hier können Sie die CSS-Klasse für die Schaltfläche auswählen.',
    ],
    'bar' => [
        'accept_all_text' => 'Alle akzeptieren',
        'show_options_text' => 'Optionen anzeigen',
    ]
];
