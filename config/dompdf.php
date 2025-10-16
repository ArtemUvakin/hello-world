<?php

return [
    'show_warnings' => false,
    'public_path' => public_path(),
    'convert_entities' => true,
    'options' => [
        'font_dir' => storage_path('fonts/'), // font directory
        'font_cache' => storage_path('fonts/'), // font cache directory
        'temp_dir' => sys_get_temp_dir(), // temporary directory
        'chroot' => realpath(base_path()), // chroot directory
        'allow_remote' => true, // allow remote resources
        'remote_protocol' => 'http', // remote protocol
        'log_output_file' => storage_path('logs/dompdf.log'), // log file
        'default_font' => 'DejaVu Sans', // default font
        'default_media_type' => 'screen', // default media type
        'default_paper_size' => 'a4', // default paper size
        'default_paper_orientation' => 'landscape', // default paper orientation
        'default_font_size' => '12', // default font size
        'dpi' => 96, // DPI
        'enable_php' => false, // enable PHP
        'enable_javascript' => false, // enable JavaScript
        'enable_remote' => true, // enable remote
        'font_height_ratio' => 1.1, // font height ratio
        'enable_html5_parser' => true, // enable HTML5 parser
        'enable_css_float' => true, // enable CSS float
        'enable_font_subsetting' => true, // enable font subsetting
        'pdf_backend' => 'CPDF', // PDF backend
        'pdlib_use_font_cache' => true, // use font cache
        'admin_username' => 'user', // admin username
        'admin_password' => 'password', // admin password
    ],
];