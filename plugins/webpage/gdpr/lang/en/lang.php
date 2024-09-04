<?php return [
    'plugin' => [
        'name' => 'GDPR',
        'description' => 'GDPR, Cookies...',
        'settings' => [
            'cookies_settings_title' => 'Cookies',
            'cookies_settings_description' => 'Manage and configure cookies, cookies bar and its settings.',
            'cookies_text_title' => 'GDPR',
            'cookies_text_content' => 'Manage General Data Protection Regulation'
        ],
        'permissions' => [
            'label' => 'Manage cookies and cookies bar.'
        ]
    ],
    'tabs' => [
        'cookies' => 'Cookies',
        'cookie_bar' => 'Cookies Bar',
        'settings' => 'Settings',
    ],
    'cookie_title' => 'Title',
    'cookie_description' => 'Description',
    'cookie_text_title' => 'Title',
    'cookie_text_text' => 'Text',
    'cookies' => 'Cookies',
    'required' => 'Required',
    'required_comments' => 'This cookie is required and checked by default but cannot be unchecked by a user.',
    'enabled' => 'Enabled',
    'enabled_comment' => 'This cookie is checked by default but can be unchecked by a user.',
    'add_cookie' => 'Add cookie',
    'section_scripts' => 'Scripts',
    'scripts' => 'Scripts',
    'scripts_comment' => 'Here, you can define which scripts should be run if the cookie is accepted.',
    'script_title' => 'Title (optional)',
    'script_code' => 'Code',
    'cookie_slug' => 'Code',
    'components' => [
        'cookie_bar_name' => 'Cookies Bar',
        'cookie_bar_description' => 'Display cookies bar on frontend.',
    ],
    'settings' => [
        'cookies_expiration_days' => 'Expiration Days',
        'cookies_expiration_days_comment' => 'Defines how long should cookies last in users browser.',
        'cookie_bar_mode' => 'Cookie Bar Mode',
        'cookie_bar_mode_comment' => 'Change display mode of cookie bar.',
        'cookie_bar_mode_expanded' => 'Expanded',
        'cookie_bar_mode_collapsed' => 'Collapsed',
        'cookies_disable' => 'Disable cookies',
        'cookies_disable_comment' => 'Completely disable this plugin.',
        'cookies_disable_warning' => 'Cookies are disabled',
        'cookies_disable_warning_comment' => 'Cookies will not show on the website. You can change this setting in the settings tab.',
    ],
    'cookie_bar_title' => 'Title',
    'cookie_bar_description' => 'Description',
    'cookie_bar_section_buttons' => 'Buttons',
    'cookie_bar_add_button' => 'Add button',
    'buttons' => [
        'title' => 'Title',
        'allow_all' => 'Allow all',
        'allow_all_comment' => 'This button will allow all cookies.',
        'deny_all' => 'Deny all',
        'deny_all_comment' => 'This button will deny all cookies.',
        'allow_selection' => 'Allow selection',
        'allow_selection_comment' => 'This button will allow only cookies selected by a user.',
        'style' => 'Style',
        'style_comment' => 'Here you can choose CSS class for the button.',
    ],
    'bar' => [
        'accept_all_text' => 'Accept all',
        'show_options_text' => 'Show options',
    ]
];
