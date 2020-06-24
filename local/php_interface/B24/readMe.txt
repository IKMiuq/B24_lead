/***************************************************************************************/
Некоторые поля могут не заполняться в битре, т.к. у пользователя нет доступа к ним.
Реализован механизм с передачей параметров, статуса и источника, остальное нужно дорабатывать.
/***************************************************************************************/

Параметры запроса

LOGIN* Логин
PASSWORD* Пароль
TITLE* Название
COMPANY_TITLE Название компании
NAME Имя
LAST_NAME Фамилия
SECOND_NAME Отчество
POST Должность
ADDRESS Адрес
COMMENTS Комментарий
SOURCE_DESCRIPTION Дополнительно об источнике
STATUS_DESCRIPTION Дополнительно о статусе
OPPORTUNITY Возможная сумма сделки
CURRENCY_ID Валюта
PRODUCT_ID Продукт
SOURCE_ID Источник
STATUS_ID Статус
ASSIGNED_BY_ID Int Ответственный
PHONE_WORK Рабочий телефон
PHONE_MOBILE Мобильный телефон
PHONE_FAX Номер факса
PHONE_HOME Домашний телефон
PHONE_PAGER Номер пейджера
PHONE_OTHER Другой телефон
WEB_WORK Корпоративный сайт
WEB_HOME Личная страница
WEB_FACEBOOK Страница Facebook
WEB_LIVEJOURNAL Страница LiveJournal
WEB_TWITTER Микроблог Twitter
WEB_OTHER Другой сайт
EMAIL_WORK Рабочий e-mail
EMAIL_HOME Частный e-mail
EMAIL_OTHER Другой e-mail
IM_SKYPE Контакт Skype
IM_ICQ Контакт ICQ
IM_MSN Контакт MSN/Live!
IM_JABBER Контакт Jabber
IM_OTHER Другой контакт

STATUS_ID – Статусы:

NEW Не обработан
ASSIGNED Назначен ответственный
DETAILS Уточнение информации
CANNOT_CONTACT Не удалось связаться
IN_PROCESS В обработке
ON_HOLD Обработка приостановлена
RESTORED Сконвертирован
CONVERTED Восстановлен
JUNK Некачественный лид

SOURCE_ID – Источники:

SELF Свой контакт
PARTNER Существующий клиент
CALL Звонок
WEB Веб-сайт
EMAIL Электронная почта
CONFERENCE Конференция
TRADE_SHOW Выставка
EMPLOYEE Сотрудник
COMPANY Кампания
HR HR - департамент
MAIL Письмо
OTHER Другое

CURRENCY_ID – Валюты:

RUB Рубль
USD Доллар США
EUR Евро


PRODUCT_ID – Продукты:

PRODUCT_1 1С-Битрикс: Управление сайтом
PRODUCT_2 1С-Битрикс: Корпоративный портал
OTHER Другое