(function($) {
  $.extend($.summernote.lang, {
    'uk-UA': {
      font: {
        bold: 'Напівжирний',
        italic: 'Курсив',
        underline: 'Підкреслений',
        clear: 'Прибрати стилі шрифту',
        height: 'Висота лінії',
        name: 'Шрифт',
        strikethrough: 'Закреслений',
        subscript: 'Нижній індекс',
        superscript: 'Верхній індекс',
        size: 'Розмір шрифту'
      },
      image: {
        image: 'Картинка',
        insert: 'Вставити картинку',
        resizeFull: 'Відновити розмір',
        resizeHalf: 'Зменшити до 50%',
        resizeQuarter: 'Зменшити до 25%',
        floatLeft: 'Розташувати ліворуч',
        floatRight: 'Розташувати праворуч',
        floatNone: 'Початкове розташування',
        shapeRounded: 'Форма: Заокруглена',
        shapeCircle: 'Форма: Коло',
        shapeThumbnail: 'Форма: Мініатюра',
        shapeNone: 'Форма: Немає',
        dragImageHere: 'Перетягніть сюди картинку',
        dropImage: 'Перетягніть картинку',
        selectFromFiles: 'Вибрати з файлів',
        maximumFileSize: 'Максимальний розмір файлу',
        maximumFileSizeError: 'Перевищено максимальний розмір файлу.',
        url: 'URL картинки',
        remove: 'Видалити картинку',
        original: 'Оригінал'
      },
      video: {
        video: 'Відео',
        videoLink: 'Посилання на відео',
        insert: 'Вставити відео',
        url: 'URL відео',
        providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion чи Youku)'
      },
      link: {
        link: 'Посилання',
        insert: 'Вставити посилання',
        unlink: 'Прибрати посилання',
        edit: 'Редагувати',
        textToDisplay: 'Текст, що відображається',
        url: 'URL для переходу',
        openInNewWindow: 'Відкривати у новому вікні'
      },
      table: {
        table: 'Таблиця',
        addRowAbove: 'Додати рядок вище',
        addRowBelow: 'Додати рядок нижче',
        addColLeft: 'Додати колонку зліва',
        addColRight: 'Додати колонку справа',
        delRow: 'Видалити рядок',
        delCol: 'Видалити колонку',
        delTable: 'Видалити таблицю'
      },
      hr: {
        insert: 'Вставити горизонтальну лінію'
      },
      style: {
        style: 'Стиль',
        p: 'Нормальний',
        blockquote: 'Цитата',
        pre: 'Код',
        h1: 'Заголовок 1',
        h2: 'Заголовок 2',
        h3: 'Заголовок 3',
        h4: 'Заголовок 4',
        h5: 'Заголовок 5',
        h6: 'Заголовок 6'
      },
      lists: {
        unordered: 'Маркований список',
        ordered: 'Нумерований список'
      },
      options: {
        help: 'Допомога',
        fullscreen: 'На весь екран',
        codeview: 'Перегляд коду'
      },
      paragraph: {
        paragraph: 'Параграф',
        outdent: 'Зменшити відступ',
        indent: 'Збільшити відступ',
        left: 'Вирівняти по лівому краю',
        center: 'Вирівняти по центру',
        right: 'Вирівняти по правому краю',
        justify: 'Розтягнути по ширині'
      },
      color: {
        recent: 'Останній колір',
        more: 'Більше кольорів',
        background: 'Колір фону',
        foreground: 'Колір шрифту',
        transparent: 'Прозорість',
        setTransparent: 'Встановити прозорість',
        reset: 'Відновити',
        resetToDefault: 'Відновити початкові',
        cpSelect: 'Вибрати'
      },
      shortcut: {
        shortcuts: 'Комбінації клавіш',
        close: 'Закрити',
        textFormatting: 'Форматування тексту',
        action: 'Дія',
        paragraphFormatting: 'Форматування параграфу',
        documentStyle: 'Стиль документу',
        extraKeys: 'Додаткові ключі'
      },
      help: {
       'insertParagraph': 'Вставити абзац',
        'undo': 'Скасувати останню команду',
        'redo': 'Повторити останню команду',
        'tab': 'Додати табуляцію(абзац)',
        'untab': 'Видалити табуляцію(абзац)',
        'bold': 'Встановити жирний стиль',
        'italic': 'Встановити стиль курсиву',
        'underline': 'Встановіть стиль підкреслення',
        'strikethrough': 'Встановіть стиль закреслення',
        'removeFormat': 'Очистити стиль',
        'justifyLeft': 'Встаносити вирінювання по лівому краю',
        'justifyCenter': 'Встаносити вирінювання по центру',
        'justifyRight': 'Встаносити вирінювання по правому краю',
        'justifyFull': 'Встаносити вирінювання по всій ширині',
        'insertUnorderedList': 'Переключити невпорядкований список',
        'insertOrderedList': 'Переключити упорядкований список',
        'outdent': 'Втяжка для поточного абзацу',
        'indent': 'Відступ для поточного абзацу',
        'formatPara': 'Змінити формат поточного блоку як абзац (тег P)',
        'formatH1': 'Змінити формат поточного блоку як заголовок H1',
        'formatH2': 'Змінити формат поточного блоку як заголовок H2',
        'formatH3': 'Змінити формат поточного блоку як заголовок H3',
        'formatH4': 'Змінити формат поточного блоку як заголовок H4',
        'formatH5': 'Змінити формат поточного блоку як заголовок H5',
        'formatH6': 'Змінити формат поточного блоку як заголовок H6',
        'insertHorizontalRule': 'Додати горизонтальну лінію',
        'linkDialog.show': 'Показати діалогове вікно посилання'
      },
      history: {
        undo: 'Відмінити',
        redo: 'Повторити'
      },
      specialChar: {
        specialChar: 'СПЕЦІАЛЬНІ СИМВОЛИ',
        select: 'Вибрати Спеціальні символи'
      }
    }
  });
})(jQuery);
