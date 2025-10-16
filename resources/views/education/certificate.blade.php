<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сертификат</title>
    <style>
        @font-face {
            font-family: 'FONT Sans Medium';
            src: url('{{ $type == 'html' ? asset('fonts/FONTSans/FONTSans-Medium.eot') : public_path('fonts/FONTSans/FONTSans-Medium.eot') }}');
            src: url('{{ $type == 'html' ? asset('fonts/FONTSans/FONTSans-Medium.eot?#iefix') : public_path('fonts/FONTSans/FONTSans-Medium.eot?#iefix') }}') format('embedded-opentype'),
                url('{{ $type == 'html' ? asset('fonts/FONTSans/FONTSans-Medium.woff2') : public_path('fonts/FONTSans/FONTSans-Medium.woff2') }}') format('woff2'),
                url('{{ $type == 'html' ? asset('fonts/FONTSans/FONTSans-Medium.woff') : public_path('fonts/FONTSans/FONTSans-Medium.woff') }}') format('woff'),
                url('{{ $type == 'html' ? asset('fonts/FONTSans/FONTSans-Medium.ttf') : public_path('fonts/FONTSans/FONTSans-Medium.ttf') }}') format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        /* Fallback fonts for PDF generation */
        @font-face {
            font-family: 'DejaVu Sans';
            src: url('{{ $type == 'html' ? asset('fonts/DejaVuSans.ttf') : public_path('fonts/DejaVuSans.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'DejaVu Sans';
            src: url('{{ $type == 'html' ? asset('fonts/DejaVuSans-Bold.ttf') : public_path('fonts/DejaVuSans-Bold.ttf') }}') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'FONT Sans Medium', 'DejaVu Sans', Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .certificate {
            background: white;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 800px;
            width: 100%;
            position: relative;
        }

        .certificate::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 3px solid #667eea;
            border-radius: 15px;
            pointer-events: none;
        }

        .title {
            font-size: 48px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .subtitle {
            font-size: 24px;
            color: #666;
            margin-bottom: 50px;
        }

        .name {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 30px;
            text-decoration: underline;
            text-decoration-color: #764ba2;
            text-underline-offset: 10px;
        }

        .course {
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
            font-style: italic;
        }

        .date {
            font-size: 20px;
            color: #666;
            margin-top: 40px;
        }

        .signature {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
            align-items: end;
        }

        .signature-line {
            width: 200px;
            height: 2px;
            background: #333;
            margin-top: 10px;
        }

        .signature-text {
            font-size: 16px;
            color: #666;
        }

        /* PDF specific styles */
        @media print {
            body {
                background: white !important;
            }
            
            .certificate {
                box-shadow: none;
                border: 2px solid #333;
            }
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="title">Сертификат</div>
        <div class="subtitle">о прохождении курса</div>
        
        <div class="name">{{ $userName }}</div>
        
        <div class="course">«{{ $courseName }}»</div>
        
        <div class="date">Дата выдачи: {{ $date }}</div>
        
        <div class="signature">
            <div>
                <div class="signature-line"></div>
                <div class="signature-text">Подпись директора</div>
            </div>
            <div>
                <div class="signature-line"></div>
                <div class="signature-text">Печать</div>
            </div>
        </div>
    </div>
</body>
</html>