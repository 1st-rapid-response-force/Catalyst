<?php

return [
    /* ------------------------------------------------------------------------------------------------
     |  Log files storage path
     | ------------------------------------------------------------------------------------------------
     */
    'storage-path'  => storage_path('logs'),

    /* ------------------------------------------------------------------------------------------------
     |  Locale
     | ------------------------------------------------------------------------------------------------
     |  Supported locales :
     |    'auto', 'ar', 'de', 'en', 'es', 'fr', 'hy', 'it', 'nl', 'ro', 'ru', 'sv', 'tr', 'zh'
     */
    'locale'        => 'en',

    /* ------------------------------------------------------------------------------------------------
     |  Route settings
     | ------------------------------------------------------------------------------------------------
     */
    'route'         => [
        'enabled'    => true,

        'attributes' => [
            'prefix'     => 'admin/log-viewer',

            'middleware' => ['auth', 'admin'],
        ],
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Log entries per page
     | ------------------------------------------------------------------------------------------------
     |  This defines how many log entries are displayed per page.
     */
    'per-page'      => 30,

    /* ------------------------------------------------------------------------------------------------
     |  LogViewer's Facade
     | ------------------------------------------------------------------------------------------------
     */
    'facade'        => 'LogViewer',

    /* ------------------------------------------------------------------------------------------------
     |  Download settings
     | ------------------------------------------------------------------------------------------------
     */
    'download'      => [
        'prefix'    => '1strrf-',

        'extension' => 'log',
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Menu settings
     | ------------------------------------------------------------------------------------------------
     */
    'menu'  => [
        'filter-route'  => 'log-viewer::logs.filter',

        'icons-enabled' => true,
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Icons
     | ------------------------------------------------------------------------------------------------
     */
    'icons' =>  [
        /**
         * Font awesome >= 4.3
         * http://fontawesome.io/icons/
         */
        'all'       => 'fa fa-fw fa-list',                 // http://fontawesome.io/icon/list/
        'emergency' => 'fa fa-fw fa-bug',                  // http://fontawesome.io/icon/bug/
        'alert'     => 'fa fa-fw fa-bullhorn',             // http://fontawesome.io/icon/bullhorn/
        'critical'  => 'fa fa-fw fa-heartbeat',            // http://fontawesome.io/icon/heartbeat/
        'error'     => 'fa fa-fw fa-times-circle',         // http://fontawesome.io/icon/times-circle/
        'warning'   => 'fa fa-fw fa-exclamation-triangle', // http://fontawesome.io/icon/exclamation-triangle/
        'notice'    => 'fa fa-fw fa-exclamation-circle',   // http://fontawesome.io/icon/exclamation-circle/
        'info'      => 'fa fa-fw fa-info-circle',          // http://fontawesome.io/icon/info-circle/
        'debug'     => 'fa fa-fw fa-life-ring',            // http://fontawesome.io/icon/life-ring/
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Colors
     | ------------------------------------------------------------------------------------------------
     */
    'colors' =>  [
        'levels'    => [
            'empty'     => '#D1D1D1',
            'all'       => '#8A8A8A',
            'emergency' => '#B71C1C',
            'alert'     => '#D32F2F',
            'critical'  => '#F44336',
            'error'     => '#FF5722',
            'warning'   => '#FF9100',
            'notice'    => '#4CAF50',
            'info'      => '#1976D2',
            'debug'     => '#90CAF9',
        ],
    ],
];
