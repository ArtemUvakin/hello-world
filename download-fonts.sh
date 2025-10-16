#!/bin/bash

# Создаем директорию для шрифтов
mkdir -p storage/fonts
mkdir -p public/fonts

# Скачиваем шрифты DejaVu Sans
echo "Скачиваем шрифты DejaVu Sans..."

# DejaVu Sans Regular
wget -O storage/fonts/DejaVuSans.ttf "https://github.com/dejavu-fonts/dejavu-fonts/raw/master/ttf/DejaVuSans.ttf"
cp storage/fonts/DejaVuSans.ttf public/fonts/

# DejaVu Sans Bold
wget -O storage/fonts/DejaVuSans-Bold.ttf "https://github.com/dejavu-fonts/dejavu-fonts/raw/master/ttf/DejaVuSans-Bold.ttf"
cp storage/fonts/DejaVuSans-Bold.ttf public/fonts/

echo "Шрифты успешно загружены!"
echo "Файлы находятся в:"
echo "- storage/fonts/ (для DomPDF)"
echo "- public/fonts/ (для веб-доступа)"