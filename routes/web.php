<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

Route::get('/test-certificate/{type?}', function ($type = 'html') {
    $data = [
        'userName' => 'Увакин Артём Альбертович',
        'courseName' => 'Продвинутый курс по рекламе',
        'date' => Carbon::now()->format('d.m.Y'),
        'type' => $type,
    ];

    if ($type === 'pdf') {
        return Pdf::loadView('education.certificate', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'DejaVu Sans'
            ])
            ->stream('certificate.pdf');
    }

    return view('education.certificate', $data);
});