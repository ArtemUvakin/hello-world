<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function generate($type = 'html')
    {
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
                    'defaultFont' => 'DejaVu Sans',
                    'isPhpEnabled' => false,
                    'isJavascriptEnabled' => false,
                    'isRemoteEnabled' => true,
                    'fontHeightRatio' => 1.1,
                    'enableFontSubsetting' => true,
                    'pdfBackend' => 'CPDF',
                    'chroot' => realpath(base_path()),
                    'tempDir' => sys_get_temp_dir(),
                    'fontDir' => storage_path('fonts/'),
                    'fontCache' => storage_path('fonts/'),
                    'logOutputFile' => storage_path('logs/dompdf.log'),
                ])
                ->stream('certificate.pdf');
        }

        return view('education.certificate', $data);
    }
}