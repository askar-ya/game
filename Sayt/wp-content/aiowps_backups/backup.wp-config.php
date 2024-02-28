<?php
define('WP_CACHE', false); // Added by WP Rocket
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'mr-music80-0_army');

/** Имя пользователя MySQL */
define('DB_USER', '046510383_army');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'fhgGF74JHTJ');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eCCqj$$3/3L*e+(QQmXH[F@OH[#JXG`u!fK!`B#iutxNlW# {+|?R400yM%wOo5p');
define('SECURE_AUTH_KEY',  'tDUb<+*eiE+>ER0x P,Jn|$#nm{4y:XmvAGGTk{(egBcBb+(3RB=`p?:uv {VV;R');
define('LOGGED_IN_KEY',    '02),@$Ri*ev};@vMs!;>Gu,u?c`W 1]|MJ,]NO|yZAf|P7u=ih$?,{YQY4P0~}MF');
define('NONCE_KEY',        '~K;b@*g`Tl|@/o/h_r[q@okm]KVq8@F{E6TQ8A4Blg,k9Q&t!oKK8!mDL{[$txm-');
define('AUTH_SALT',        'w9W|,%$O<u3PfK#hM,nPBY [Z `^xn^g.n2.M~KlfhSKj<-IEKUaG<-{y&,Sp0Dq');
define('SECURE_AUTH_SALT', '0v$E3A?ckkvpj3~} ?1=9w{k4kGb!HI]=Tu8jwU|=e$Idsu!)yE3_^<hRA<<:SL9');
define('LOGGED_IN_SALT',   '.9}XTOW?O?}KOy2_83j9/#~%XF!UZh-Ylzk8tK%;:|j1rQP?dGPi w53g}b]RXL7');
define('NONCE_SALT',       '?fPV3c^!~(NAO}D2&Aa.+4{/qxBWiQry!`=G4XqGg^ittSwG|h:^%2@6VVoU-N}<');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
