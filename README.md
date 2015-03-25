#LPDevplate - фреймворк для разработки страниц приземления агентства "Кликобилие"

Использованные технологии:
CSS:
 - LibSASS - препроцессор
 - reset.css - базовое обнуление стилей
 - SUSY (>=2.0) - система гридов

Plugins:
 - animate.css - библиотека CSS3 анимаций
 - jquery.slick.js - многофункциональный слайдер
 - jquery.flipclock.js - таймер
 - jquery.lazyload.js - ленивая загрузка картинок заднего фона
 - lazysizes.js - ленивая загрузка картинок
 - jquery.magnific-popup.js - многофункциональный попап менеджер
 - jquery.maskedinput.js - маска телефона для поля лидформы
 - jquery.placeholder.js - поддержка плейсхолдера в IE
 - jquery.prettyPhoto.js - галлерея изображений
 - jquery.reject.js - предупреждение о старом браузере
 - jquery.validate.js - валидация формы
 - jquery.waypoint.js - обработка событий при скроллинге страницы

Custom child plugins:
 - jquery.waypointAnimate.js - мой плагин для анимаций при скроллинге (использует jquery.waypoint.js и animate.css)
 - jquery.child-magnific-popup.js - мой плагин для попап форм (исопльзует jquery.magnific-popup.js)

Build:
 - Gulp (>=3.8.10) - сборщик фронтенда
 - Browserify - менеджер зависимостей javascript файлов
 - Browser-sync - автообновление браузера и синхронизация всех браузеров
 - gulp-sass - компилятор для LibSASS
 - gulp-uglify - минификация javascript кода
 - gulp-concat - конкатенация файлов js и css
 - vinyl-source-stream - обычные текстовые потоки в pipe'ах
 - gulp-streamify - поддержка потоков для старых плагинов
 - gulp-cssmin - минификация css
 - gulp-changed - запуск таска только для измененных файлов
 - gulp-notify - уведомления
 - gulp-autoprefixer - вендорные префиксы для старых браузеров
 - gulp-connect-php - запуск php-сервера
 - gulp-imagemin - сжатие изображений
 - gulp-rename - переименовывание файлов

Server side:
 - phpMailer - отправка заявок на электронную почту
 - phpExcel - экспорт в Excel
 - Sqlite3 - текстовая база данных
 
Text Editor:
 - Intellij Idea 14.0.3 - рабочая среда
 - settings.jar - настройки среды и шаблоны кода

