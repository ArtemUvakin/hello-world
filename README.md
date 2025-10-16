# Решение проблемы с русскими символами в PDF Laravel

## Проблема
При генерации PDF с русскими символами в Laravel с помощью DomPDF русские символы отображаются как знаки вопроса.

## Решение

### 1. Установка пакета DomPDF
```bash
composer require barryvdh/laravel-dompdf
```

### 2. Публикация конфигурации
```bash
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

### 3. Настройка конфигурации DomPDF
В файле `config/dompdf.php` установите:
- `default_font` => 'DejaVu Sans'
- `enable_font_subsetting` => true
- `is_remote_enabled` => true

### 4. Установка шрифтов DejaVu Sans
Скачайте шрифты DejaVu Sans и поместите их в папку `storage/fonts/`:
- DejaVuSans.ttf
- DejaVuSans-Bold.ttf

### 5. Настройка генерации PDF
В контроллере используйте следующие опции:
```php
Pdf::loadView('education.certificate', $data)
    ->setPaper('a4', 'landscape')
    ->setOptions([
        'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,
        'defaultFont' => 'DejaVu Sans',
        'enableFontSubsetting' => true,
    ])
    ->stream('certificate.pdf');
```

### 6. Настройка Blade шаблона
В CSS добавьте fallback шрифты:
```css
@font-face {
    font-family: 'DejaVu Sans';
    src: url('{{ public_path('fonts/DejaVuSans.ttf') }}') format('truetype');
    font-weight: normal;
    font-style: normal;
}

body {
    font-family: 'FONT Sans Medium', 'DejaVu Sans', Arial, sans-serif;
}
```

## Дополнительные рекомендации

1. **Кодировка файлов**: Убедитесь, что все файлы сохранены в UTF-8
2. **Мета-теги**: Добавьте `<meta charset="UTF-8">` в head
3. **Fallback шрифты**: Всегда указывайте fallback шрифты в CSS
4. **Тестирование**: Проверьте генерацию PDF на разных данных

## Тестирование
Перейдите по адресу `/test-certificate/html` для HTML версии и `/test-certificate/pdf` для PDF версии.