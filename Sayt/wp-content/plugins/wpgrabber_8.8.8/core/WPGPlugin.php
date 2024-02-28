<?php

class WPGPlugin
{
    protected static function _init()
    {
    }
    protected static function _destroy()
    {
    }
    public static function load()
    {
        register_activation_hook(WPGRABBER_PLUGIN_FILE, array(wpgPlugin(), "install"));
        register_deactivation_hook(WPGRABBER_PLUGIN_FILE, array(wpgPlugin(), "uninstall"));
        if (WPGTools::isSubmit("saveButton")) {
        }
        add_action("wpgrabber_cron", array(wpgPlugin(), "wpCron"));
        add_filter("cron_schedules", array(wpgPlugin(), "wpCronInterval"));
        add_filter("plugin_action_links", array(wpgPlugin(), "addSettingsLink"), 10, 4);
        add_filter("set-screen-option", array(wpgPlugin(), "setListOptions"), 8, 3);
        add_filter("set_screen_option_" . "wpgrabber_feeds_per_page", array(wpgPlugin(), "setListOptions"), 10, 3);
        add_action("admin_enqueue_scripts", array(wpgPlugin(), "js"));
        add_action("admin_menu", array(wpgPlugin(), "menu"));
        add_action("before_delete_post", array(wpgPlugin(), "deletePost"));
        if (wpgIsDemo()) {
            add_filter("login_redirect", array(wpgPlugin(), "adminDefaultPage"));
        }
        add_action("wp_ajax_wpgrabberAjaxExec", array(wpgPlugin(), "ajaxExec"));
        if (WPGTools::isSubmit("wpgrabberGetErrorLogFile")) {
            add_action("wp_loaded", array(wpgPlugin(), "getErrorLogFile"));
        }
        if (WPGTools::isSubmit("wpgrabberDeactivateAndClear")) {
            add_action("admin_init", array(wpgPlugin(), "deactivateAndClear"));
        }
        if (WPGTools::getValue("action") == "export") {
            add_action("plugins_loaded", array(wpgPlugin(), "export"));
        }
        if (WPGTools::getValue("wpgrun")) {
            add_action("wp_loaded", array(wpgPlugin(), "serverCron"));
        }
        add_action("admin_print_footer_scripts", array(wpgPlugin(), "vk_api_settings_page_js"));
    }
    function wpUpdateShare()
    {
        $fiFX4LL = get_option("wpg_" . "vk_access_token_url");
        if (isset($fiFX4LL) && !empty($fiFX4LL)) {
            $OV9DEXc = explode("#", $fiFX4LL);
            $rydeYca = wp_parse_args($OV9DEXc[1]);
            $Kz4kysq = $rydeYca["access_token"];
            update_option("wpg_vk_access_token", $Kz4kysq);
        }
    }
    public static function vk_api_settings_page_js()
    {
        echo "        <script type=\"text/javascript\">\n            jQuery(document).ready(function (\$) {\n\n                \$(\"#options\\\\[vk_app_id\\\\]\").change(function () {\n                    if (\$(this).val().trim().length) {\n                        \$(this).val(\$(this).val().trim());\n                        \$('#getaccesstokenurl').attr({\n                            'href': 'http://oauth.vk.com/authorize?client_id=' + \$(this).val().trim() + '&scope=wall,photos,video,market,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token',\n                            'target': '_blank'\n                        });\n\n                    }\n                    else {\n                        \$('#getaccesstokenurl').attr({'href': 'javscript:void(0);'});\n                    }\n\n                });\n\n            }); // jQuery End\n        </script>\n        ";
    }
    public static function addSettingsLink($ESjIzDq, $O301tYu, $y7G_PEz, $GgRh2e7)
    {
        if (mb_strpos($O301tYu, "wpgrabber") === false) {
            return $ESjIzDq;
        }
        $nZP6NRj = array("<a title=\"Сбросить настройки плагина, удалить все ленты и таблицы плагина\" onclick=\"return confirm('Вы дейстительно хотите удалить все настроенные ленты, таблицы плагина, а также сбросить все параметры и деактировать плагин WPGrabber?');\" href=\"" . admin_url("/admin.php?page=wpgrabber-settings&wpgrabberDeactivateAndClear") . "\">Сбросить?</a>");
        return array_merge($ESjIzDq, $nZP6NRj);
    }
    public static function install()
    {
        require_once WPGRABBER_PLUGIN_INSTALL_DIR . DIRECTORY_SEPARATOR . "install.php";
        self::_wpCronOn();
    }
    public static function uninstall()
    {
        self::_wpCronOff();
    }
    protected static function _wpCronOn()
    {
        if (!wp_next_scheduled("wpgrabber_cron")) {
            wp_schedule_event(time(), "wpgmin", "wpgrabber_cron");
        }
    }
    protected static function _wpCronOff()
    {
        wp_clear_scheduled_hook("wpgrabber_cron");
    }
    public static function wpCronInterval($QHr4Ixu)
    {
        $QX0ocaH = get_option("wpg_cronInterval") ? get_option("wpg_cronInterval") : 60;
        $QHr4Ixu["wpgmin"] = array("interval" => $QX0ocaH * 60, "display" => "Через каждые " . $QX0ocaH . " минут");
        return $QHr4Ixu;
    }
    public static function serverCron()
    {
        if (get_option("wpg_cronOn")) {
            self::_cron();
            exit;
        }
        return false;
    }
    public static function wpCron()
    {
        if (get_option("wpg_cronOn") && !get_option("wpg_methodUpdate")) {
            self::_cron();
            exit;
        }
        return false;
    }
    protected static function _cron()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        $Cm1e32B = (int) get_option("wpg_countUpdateFeeds") ? (int) get_option("wpg_countUpdateFeeds") : 1;
        $aZNFivs = array();
        $k64Ojg6 = isset($_GET["feeds"]) ? $_GET["feeds"] : null;
        if (isset($k64Ojg6)) {
            self::_adminNotice("_GET['feeds']: " . $k64Ojg6);
            if (is_numeric($k64Ojg6)) {
                $Hj6Ok8C = "id = " . (int) $k64Ojg6;
            } elseif (stripos($k64Ojg6, "-") !== false) {
                list($TArN9iF, $ve_0AYr) = explode("-", $k64Ojg6);
                $Hj6Ok8C = "id BETWEEN {$TArN9iF} AND {$ve_0AYr}";
            } elseif (stripos($k64Ojg6, ",") !== false) {
                $k64Ojg6 = @explode(",", $k64Ojg6);
                if (is_array($k64Ojg6) and count($k64Ojg6)) {
                    $od3i2HD = implode(",", $k64Ojg6);
                    $Hj6Ok8C = "id IN ({$od3i2HD})";
                } else {
                    $od3i2HD = "id = 0";
                }
            }
            $KUr6Q8o = "SELECT id\n                    FROM `" . $wpdb->prefix . "wpgrabber`\n                    WHERE " . $Hj6Ok8C;
            $aZNFivs = $wpdb->get_col($KUr6Q8o);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
        } elseif (get_option("wpg_methodUpdateSort")) {
            self::_adminNotice("wpg_methodUpdateSort, учитывая индивидуальные периоды каждой ленты");
            $KUr6Q8o = "SELECT id\n                    FROM `" . $wpdb->prefix . "wpgrabber`\n                    WHERE UNIX_TIMESTAMP() > (`last_update` + `interval`)\n                    AND `published` = 1\n                    LIMIT " . (int) $Cm1e32B;
            $aZNFivs = $wpdb->get_col($KUr6Q8o);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
        } else {
            $QX0ocaH = (int) get_option("wpg_cronInterval") ? (int) get_option("wpg_cronInterval") : 60;
            self::_adminNotice("wpg_cronInterval, по порядку через заданный интервал: " . $QX0ocaH);
            $KUr6Q8o = "SELECT COUNT(*)\n                    FROM `" . $wpdb->prefix . "wpgrabber`\n                    WHERE `published` = 1";
            $pncnn01 = (int) $wpdb->get_var($KUr6Q8o);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            } elseif ($pncnn01 > 0) {
                $yjk1GDP = (int) $QX0ocaH * 60;
                $KUr6Q8o = "SELECT id\n                        FROM `" . $wpdb->prefix . "wpgrabber`\n                        WHERE `published` = 1\n                        AND UNIX_TIMESTAMP() > (`last_update` + " . $yjk1GDP . ")\n                        ORDER BY `last_update` ASC\n                        LIMIT " . (int) $Cm1e32B;
                $aZNFivs = $wpdb->get_col($KUr6Q8o);
                if ($wpdb->last_error != '') {
                    WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
                }
            }
        }
        if (count($aZNFivs) > 0) {
            echo "<html> <head> <title>WPGrabber " . WPGRABBER_VERSION . ", " . $_SERVER["HTTP_HOST"] . "</title> <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /> </head> <body>";
            foreach ($aZNFivs as $HrAL3Ba) {
                $hmdNo7t = self::_getTGrabber();
                $hmdNo7t->autoUpdateMode = 1;
                $hmdNo7t->execute($HrAL3Ba);
                echo "<div id=\"echo-box\" style=\"border: 1px solid #cacaca; padding: 10px; background:#e5e5e5; margin-right: 20px;\">";
                echo $hmdNo7t->getLog();
                echo "</div>";
                $hmdNo7t = null;
            }
        }
    }
    public static function js()
    {
        wp_enqueue_script("jQuery_ScrollTo_js", WPGRABBER_PLUGIN_URL . "/js/jquery.scrollTo-2.1.2.min.js", array("jquery"));
    }
    public static function menu()
    {
        if (function_exists("add_menu_page")) {
            $b2oJnOv = add_menu_page("WPGrabber", "WPGrabber", self::_getUserLevel(), "wpgrabber-index", array(wpgPlugin(), "index"));
            add_action("load-" . $b2oJnOv, array(wpgPlugin(), "addListOptions"));
        }
        if (function_exists("add_submenu_page")) {
            add_submenu_page("wpgrabber-index", "Список лент", "Список лент", self::_getUserLevel(), "wpgrabber-index", array(wpgPlugin(), "index"));
            add_submenu_page("wpgrabber-index", "Новая лента", "Новая лента", self::_getUserLevel(), "wpgrabber-edit", array(wpgPlugin(), "edit"));
            add_submenu_page("wpgrabber-index", "Импорт лент", "Импорт лент", self::_getUserLevel(), "wpgrabber-import", array(wpgPlugin(), "import"));
            add_submenu_page("wpgrabber-index", "Настройки", "Настройки", self::_getUserLevel(), "wpgrabber-settings", array(wpgPlugin(), "settings"));
        }
    }
    public static function addListOptions()
    {
        $gnhkzC1 = "per_page";
        $C5ziyjQ = array("label" => "Количество лент на странице", "default" => 20, "option" => "wpgrabber_feeds_per_page");
        add_screen_option($gnhkzC1, $C5ziyjQ);
        require_once WPGRABBER_PLUGIN_CORE_DIR . DIRECTORY_SEPARATOR . "WPGTable.php";
        $wpgrabberTable = new WPGTable();
    }
    public static function index()
    {
        @session_start();

        $_POST["rows"] = isset($_POST["rows"]) ? $_POST["rows"] : null;
        $_REQUEST["action"] = isset($_REQUEST["action"]) ? $_REQUEST["action"] : null;
        $_GET["paged"] = isset($_GET["paged"]) ? $_GET["paged"] : null;
        if ($_POST["rows"]) {
            if ($_REQUEST["action"] == "-1") {
                $_REQUEST["action"] = $_REQUEST["action2"];
            }
        }
        if ($_REQUEST["action"] == "export") {
            add_action("plugins_loaded", array(wpgPlugin(), "export"));
        }
        if (isset($_POST["cat"])) {
            $_SESSION["wpgrabberCategoryFilter"] = $_POST["cat"];
        }
        if (!$_GET["paged"]) {
            if ($_REQUEST["action"] == "test") {
                self::test($_GET["id"]);
            } elseif ($_REQUEST["action"] == "exec") {
                self::execWPG($_GET["id"]);
            } elseif (!empty($_REQUEST["action"]) && $_REQUEST["action"] != "-1") {
                if (method_exists(wpgPlugin(), $_REQUEST["action"])) {
                    call_user_func(array(wpgPlugin(), $_REQUEST["action"]));
                }
            }
        }
        self::_header();
        require_once WPGRABBER_PLUGIN_CORE_DIR . "WPGTable.php";
        $wpgrabberTable = new WPGTable();
        $wpgrabberTable->prepare_items();
        $i5QmD1g = file_get_contents(WPGRABBER_PLUGIN_TPL_DIR . "list.php");
        if (!(1 != 1)) {
            include_once WPGRABBER_PLUGIN_TPL_DIR . "list.php";
        }
        self::_footer();

        @session_write_close();
    }
    protected static function _header()
    {
        include_once WPGRABBER_PLUGIN_TPL_DIR . "header.php";
    }
    protected static function _footer()
    {
        echo "<div style=\"text-align: right; padding-top: 20px; margin-top: 30px; font-size: 10px;\">";
        echo "PHP " . phpversion() . "&nbsp;&nbsp;";
        echo '' . constant("PHP_SAPI") . "&nbsp;&nbsp;";
        if (extension_loaded("curl")) {
            $A3ic19p = curl_version();
            echo "CURL " . $A3ic19p["version"] . "&nbsp;&nbsp;";
            echo $A3ic19p["ssl_version"] . "&nbsp;&nbsp;";
        } else {
            echo "CURL <font color=\"red\">возможно не поддерживается!</font>&nbsp;&nbsp;";
        }
        if (extension_loaded("mbstring")) {
            echo "mbstring enabled&nbsp;&nbsp;<br>";
        }
        echo "PCRE  " . constant("PCRE_VERSION") . "&nbsp;&nbsp;";
        if (extension_loaded("gd")) {
            $A3ic19p = gd_info();
            echo "GD Version " . $A3ic19p["GD Version"] . "&nbsp;&nbsp;";
            echo "JPEG Support " . $A3ic19p["JPEG Support"] . "&nbsp;&nbsp;";
            echo "WebP Support " . $A3ic19p["WebP Support"] . "&nbsp;&nbsp;";
        }
        echo " wp:" . get_bloginfo("version", "raw");
        echo "</div>";
        echo "<hr>";
        echo "<div style=\"text-align: left; padding-top: 0px; margin-top: 0px; font-size: 16px;\">";
        echo "&copy 2013-" . date("Y") . " WPGrabber <b>" . WPGRABBER_VERSION .' PRO - Служба Поддержки .</div>';
    }
    public static function edit()
    {
        global $wpdb;
        $row["params"] = array();
        $HrAL3Ba = (int) WPGTools::getValue("id");
        if ($HrAL3Ba) {
            $KUr6Q8o = "SELECT * FROM `" . $wpdb->prefix . "wpgrabber`\n          WHERE id = " . (int) $_GET["id"];
            $llBLGIF = $wpdb->get_row($KUr6Q8o, ARRAY_A);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
            if (empty($llBLGIF)) {
                WPGTools::redirect();
            }
            $row["params"] = unserialize(base64_decode($llBLGIF["params"]));
            if (trim(@$row["params"]["imageHtmlCode"]) == '') {
                $row["params"]["imageHtmlCode"] = "<img src=\"%PATH%\" />";
            }
        }
        $_GET["act"] = isset($_GET["act"]) ? $_GET["act"] : null;
        switch ($_GET["act"]) {
            case "apply":
                $_GET["id"] = self::save();
                break;
            case "exec":
                self::execWPG($_GET["id"]);
                break;
            case "test":
                self::test($_GET["id"]);
                break;
        }
        if (isset($_GET["id"]) ? $_GET["id"] : null) {
            global $wpdb;
            $KUr6Q8o = "SELECT * FROM `" . $wpdb->prefix . "wpgrabber`\n          WHERE id = " . (int) $_GET["id"];
            $row = $wpdb->get_row($KUr6Q8o, ARRAY_A);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
            $row["params"] = unserialize(base64_decode($row["params"]));
            if (trim(@$row["params"]["imageHtmlCode"]) == '') {
                $row["params"]["imageHtmlCode"] = "<img src=\"%PATH%\" />";
            }
        } else {
            $row["links"] = "/[\\w\\-_\\/]{8,}";
            $row["html_encoding"] = 0;
            $row["params"]["autoIntroOn"] = "0";
            $row["params"]["case_title"] = "0";
            $row["id"] = '';
            $row["params"]["filter_words_list"] = '';
            $row["params"]["filter_words_save"] = 0;
            $row["params"]["filter_words_where"] = 0;
            $row["params"]["filter_words_on"] = 0;
            $row["params"]["requestMethod"] = 0;
            $row["params"]["usrepl"] = 0;
            $row["params"]["user_replace_on"] = 1;
            $row["params"]["css_no_del"] = 0;
            $row["params"]["js_script_no_del"] = 0;
            $row["params"]["yandex_api_key2"] = '';
            $row["params"]["translate2_lang"] = 0;
            $row["params"]["translate2_method"] = 0;
            $row["params"]["translate2_on"] = 0;
            $row["params"]["yandex_api_key"] = '';
            $row["params"]["translate_lang"] = 0;
            $row["params"]["translate_method"] = 0;
            $row["params"]["translate_on"] = 0;
            $row["params"]["nosave_if_not_translate"] = 1;
            $row["params"]["img_intro_crop"] = "0";
            $row["params"]["image_resize"] = 0;
            $row["params"]["img_path_method"] = 0;
            $row["params"]["post_thumb_on"] = 0;
            $row["params"]["image_name_from_title_on"] = 0;
            $row["params"]["image_class_name_on"] = 0;
            $row["params"]["image_class_name_custom"] = "wpg_image";
            $row["params"]["image_attr_delete"] = "itemprop,srcset,data-original,data-src,data-srcset,data-lazy-type,sizes";
            $row["params"]["image_alt_make_on"] = 0;
            $row["params"]["image_alt_replace"] = 0;
            $row["params"]["image_alt_from_attr_title"] = 1;
            $row["params"]["image_title_make_on"] = 0;
            $row["params"]["image_save"] = 0;
            $row["params"]["no_save_without_pic"] = 0;
            $row["params"]["aliasSize"] = 0;
            $row["params"]["aliasMethod"] = 1;
            $row["params"]["postSlugOn"] = 0;
            $row["params"]["introSymbolEnd"] = '';
            $row["params"]["postFulltextSymbolEnd"] = ".";
            $row["params"]["post_more_on"] = 0;
            $row["params"]["fulltext_size_on"] = 0;
            $row["params"]["post_status"] = 0;
            $row["params"]["user_id"] = '';
            $row["params"]["postType"] = 0;
            $row["params"]["catid"] = '';
            $row["params"]["titleUniqueOn"] = 1;
            $row["url"] = '';
            $row["name"] = '';
            $row["params"]["start_link"] = "0";
            $row["params"]["skip_error_urls"] = 0;
            $row["params"]["start_top"] = 0;
            $row["title"] = "<title>(.*?)</title";
            $row["text_start"] = "</h1>";
            $row["text_end"] = "</article>";
            $row["params"]["introLinkTempl"] = '';
            $row["params"]["orderLinkIntro"] = 0;
            $row["published"] = 0;
            $row["interval"] = 1800;
            $row["params"]["rss_textmod"] = "1";
            $row["params"]["max_items"] = 5;
            $row["params"]["intro_size"] = 170;
            $row["params"]["post_full_size"] = 370;
            $row["params"]["frontpage"] = 1;
            $row["params"]["dontPublished"] = 0;
            $row["params"]["intro_pic_on"] = 0;
            $row["params"]["image_path"] = get_option("wpg_imgPath") ? get_option("wpg_imgPath") : "/wp-content/uploads/";
            $row["params"]["image_space_on"] = 0;
            $row["params"]["intro_pic_width"] = 150;
            $row["params"]["intro_pic_height"] = 150;
            $row["params"]["intro_pic_quality"] = 100;
            $row["params"]["text_pic_width"] = 600;
            $row["params"]["text_pic_height"] = 600;
            $row["params"]["text_pic_quality"] = 100;
            $row["params"]["strip_tags"] = 1;
            $row["params"]["allowed_tags"] = "<b><blockquote><br><center><embed><h2><h3><h4><h5><i><iframe><img><li><object><ol><p><param><source><strong><table><tbody><td><th><tr><u><ul><span>";
            $row["params"]["template_on"] = 1;
            $row["params"]["template_title"] = "%TITLE%";
            $row["params"]["template_intro_text"] = "%INTRO_TEXT%";
            $row["params"]["template_full_text"] = "%FULL_TEXT%";
            $row["params"]["imageHtmlCode"] = "<img src=\"%PATH%\" %ADDS% />";
            $row["params"]["metaDescSize"] = "400";
            $row["params"]["metaKeysSize"] = "50";
            $row["params"]["title_words_count"] = "5";
            $row["params"]["post_tags_on"] = "0";
            $row["params"]["tagsScrape"] = "<tags>(.*?)</tags>";
            $row["params"]["tagsScrapeCount"] = "10";
            $row["params"]["post_date_on"] = 0;
            $row["params"]["post_date_type"] = "runtime";
            $row["params"]["post_date_scrape"] = "<time content=\"(.*?)\" datatype";
            $row["type"] = "html";
            $AH50egf = true;
        }
        $LDmT_oL = $row["params"]["textorobotApiKey"];
        if (!$LDmT_oL) {
            $LDmT_oL = get_option("wpg_textorobotApiKey");
        }
        if ($LDmT_oL) {
            include_once WPGRABBER_PLUGIN_DIR . "textorobot/textorobotApi.php";
            $efIyiVO = new TextorobotApi($LDmT_oL);
            $KiK8X2T = $efIyiVO->balance();
        }
        $tab = (isset($_REQUEST["tab"]) and in_array($_REQUEST["tab"], array(1, 2, 3, 4, 5, 6, 7, 8, 9))) ? $_REQUEST["tab"] : 1;
        $i5QmD1g = file_get_contents(WPGRABBER_PLUGIN_TPL_DIR . "edit.php");
        if (!(1 != 1)) {
            self::_header();
            include_once WPGRABBER_PLUGIN_TPL_DIR . "edit.php";
            self::_footer();
        }
    }
    private function translateGoogleCloudUpdate()
    {
        if (!get_option("wpg_" . "google_translate_api_key")) {
            self::_adminNotice("API-ключ Google Cloud Translation не задан!");
        } elseif (function_exists("curl_init")) {
            $I0Fz7r0 = curl_init();
            $rydeYca["key"] = get_option("wpg_" . "google_translate_api_key");
            $rydeYca["target"] = "ru";
            $rydeYca["model"] = "nmt";
            $OV9DEXc = "https://translation.googleapis.com/language/translate/v2/languages?model=" . $rydeYca["model"] . "&target=" . $rydeYca["target"] . "&key=" . $rydeYca["key"];
            $F5_GLYO[] = "Content-Type: application/json";
            $F5_GLYO[] = "x-goog-api-client: gl-php/7.2.0 gccl/1.5.0";
            $F5_GLYO[] = "Accept-Encoding: gzip";
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($I0Fz7r0, CURLOPT_ENCODING, "gzip");
            if (get_option("wpg_" . "curlProxyType")) {
                switch (get_option("wpg_" . "curlProxyType")) {
                    case 1:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
                        break;
                    case 2:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
                        break;
                    case 3:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);
                        break;
                    default:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                }
            }
            if (get_option("wpg_" . "curlProxyUserPwd")) {
                curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, get_option("wpg_" . "curlProxyUserPwd"));
            }
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0");
            $yuOjcvy = curl_exec($I0Fz7r0);
            curl_close($I0Fz7r0);
            $vitFooa = json_decode($yuOjcvy, true);
            if (is_array($vitFooa)) {
                foreach ($vitFooa["data"]["languages"] as $TU5yYuk) {
                    $HlL9yQd[$TU5yYuk["language"]] = $TU5yYuk["name"];
                }
                foreach ($HlL9yQd as $jDHxI9c => $OG4b_Fl) {
                    if ($jDHxI9c == "ru") {
                        continue;
                    }
                    $ER32XdC["ru-" . $jDHxI9c] = "Русский > " . $OG4b_Fl;
                    $ER32XdC[$jDHxI9c . "-ru"] = $OG4b_Fl . " > Русский";
                }
                foreach ($HlL9yQd as $jDHxI9c => $OG4b_Fl) {
                    if ($jDHxI9c == "en") {
                        continue;
                    }
                    $ER32XdC["en-" . $jDHxI9c] = "Английский > " . $OG4b_Fl;
                    $ER32XdC[$jDHxI9c . "-en"] = $OG4b_Fl . " > Английский";
                }
                ksort($ER32XdC);
                if (count($ER32XdC)) {
                    if (get_option("wpg_googleTransLangs")) {
                        update_option("wpg_googleTransLangs", json_encode($ER32XdC));
                    } else {
                        add_option("wpg_googleTransLangs", json_encode($ER32XdC));
                    }
                    return true;
                }
            }
        }
    }
    private function translateYandexCloudUpdate()
    {
        if (!get_option("wpg_" . "yandexOauth")) {
            self::_adminNotice("OAuth-токен Яндекс не задан!");
        } elseif (!get_option("wpg_" . "yandexFolderId")) {
            self::_adminNotice("Идентификатор каталога Яндекс не задан!");
        } elseif (function_exists("curl_init")) {
            $I0Fz7r0 = curl_init();
            $hmdNo7t = self::_getTGrabber();
            $t2uqBpp["folderId"] = get_option("wpg_" . "yandexFolderId");
            $iEhgeTK = json_encode($t2uqBpp);
            $F5_GLYO[] = "Content-Type: application/json";
            $F5_GLYO[] = "Accept-Encoding: gzip";
            $F5_GLYO[] = "Authorization: Bearer " . $hmdNo7t->getYandexPassportOauthToken(get_option("wpg_" . "yandexOauth"));
            $F5_GLYO[] = "X-Client-Request-ID: 0da512b9-27b4-4b9d-9133-a02d6b7a8879";
            curl_setopt($I0Fz7r0, CURLOPT_URL, "https://translate.api.cloud.yandex.net/translate/v2/languages");
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0");
            curl_setopt($I0Fz7r0, CURLOPT_POST, true);
            curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, $iEhgeTK);
            curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
            curl_setopt($I0Fz7r0, CURLOPT_ENCODING, "gzip");
            $yuOjcvy = curl_exec($I0Fz7r0);
            curl_close($I0Fz7r0);
            if (trim($yuOjcvy) == '') {
                return false;
            }
            $vitFooa = json_decode($yuOjcvy, true);
            if (is_array($vitFooa)) {
                foreach ($vitFooa["languages"] as $TU5yYuk) {
                    if (isset($TU5yYuk["name"])) {
                        $HlL9yQd[$TU5yYuk["code"]] = $TU5yYuk["name"];
                    } else {
                        $HlL9yQd[$TU5yYuk["code"]] = $TU5yYuk["code"];
                    }
                }
                foreach ($HlL9yQd as $jDHxI9c => $OG4b_Fl) {
                    if ($jDHxI9c == "ru") {
                        continue;
                    }
                    $ER32XdC["ru-" . $jDHxI9c] = "Русский > " . $OG4b_Fl;
                    $ER32XdC[$jDHxI9c . "-ru"] = $OG4b_Fl . " > Русский";
                }
                foreach ($HlL9yQd as $jDHxI9c => $OG4b_Fl) {
                    if ($jDHxI9c == "en") {
                        continue;
                    }
                    $ER32XdC["en-" . $jDHxI9c] = "Английский > " . $OG4b_Fl;
                    $ER32XdC[$jDHxI9c . "-en"] = $OG4b_Fl . " > Английский";
                }
                ksort($ER32XdC);
                if (count($ER32XdC)) {
                    if (get_option("wpg_yandexCloudTransLangs")) {
                        update_option("wpg_yandexCloudTransLangs", json_encode($ER32XdC));
                    } else {
                        add_option("wpg_yandexCloudTransLangs", json_encode($ER32XdC));
                    }
                    return true;
                }
            }
        }
    }
    private static function translateDeeplUpdate()
    {
        if (!get_option("wpg_" . "deepl_api_key")) {
            self::_adminNotice("API-ключ DeepL Translate не задан!");
        } elseif (function_exists("curl_init")) {
            $I0Fz7r0 = curl_init();
            $rydeYca["auth_key"] = get_option("wpg_" . "deepl_api_key");
            $rydeYca["type"] = "source";
            $OV9DEXc = "https://api.deepl.com/v2/languages";
            $F5_GLYO[] = "Accept-Encoding: gzip";
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($I0Fz7r0, CURLOPT_ENCODING, "gzip");
            curl_setopt($I0Fz7r0, CURLOPT_POST, TRUE);
            curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, http_build_query($rydeYca));
            if (get_option("wpg_" . "curlProxyType")) {
                switch (get_option("wpg_" . "curlProxyType")) {
                    case 1:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
                        break;
                    case 2:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
                        break;
                    case 3:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);
                        break;
                    default:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                }
            }
            if (get_option("wpg_" . "curlProxyUserPwd")) {
                curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, get_option("wpg_" . "curlProxyUserPwd"));
            }
            $yuOjcvy = curl_exec($I0Fz7r0);
            curl_close($I0Fz7r0);
            $FwsQKL0 = json_decode($yuOjcvy, true);
            if (is_array($FwsQKL0)) {
                $xrOEFM4 = array(0 => array("language" => "DE", "name" => "German"), 1 => array("language" => "EN-GB", "name" => "English (British)"), 2 => array("language" => "EN-US", "name" => "English (American)"), 3 => array("language" => "ES", "name" => "Spanish"), 4 => array("language" => "FR", "name" => "French"), 5 => array("language" => "IT", "name" => "Italian"), 6 => array("language" => "JA", "name" => "Japanese"), 7 => array("language" => "NL", "name" => "Dutch"), 8 => array("language" => "PL", "name" => "Polish"), 9 => array("language" => "PT-PT", "name" => "Portuguese (European)"), 10 => array("language" => "PT-BR", "name" => "Portuguese (Brazilian)"), 11 => array("language" => "RU", "name" => "Russian"), 12 => array("language" => "ZH", "name" => "Chinese"));
                foreach ($FwsQKL0 as $gZRwiFW) {
                    $HSBQ6yp[$gZRwiFW["language"]] = $gZRwiFW["name"];
                }
                foreach ($xrOEFM4 as $rdwxTML) {
                    $tgzo15H[$rdwxTML["language"]] = $rdwxTML["name"];
                }
                foreach ($HSBQ6yp as $pI9aQRY => $WoTJjwJ) {
                    foreach ($tgzo15H as $LjR0x85 => $Om6_15D) {
                        if ($LjR0x85 == $pI9aQRY) {
                            continue;
                        }
                        if ($LjR0x85 == $pI9aQRY) {
                            continue;
                        }
                        $ER32XdC[$pI9aQRY . "_" . $LjR0x85] = $WoTJjwJ . " > " . $Om6_15D;
                        $ER32XdC[$LjR0x85 . "_" . $pI9aQRY] = $Om6_15D . " > " . $WoTJjwJ;
                    }
                }
                $Q2UzTTE = array("EN_RU" => "Английский > Русский", "EN-US_RU" => "Английский (American) > Русский", "EN-GB_RU" => "Английский (British) > Русский", "RU_EN" => "Русский > Английский", "RU_EN-GB" => "Русский > Английский (British)", "RU_EN-US" => "Русский > Английский (American)");
                asort($ER32XdC);
                $AFRnv7c = array_merge($Q2UzTTE, $ER32XdC);
                if (count($ER32XdC)) {
                    if (get_option("wpg_deeplTransLangs")) {
                        update_option("wpg_deeplTransLangs", json_encode($AFRnv7c));
                    } else {
                        add_option("wpg_deeplTransLangs", json_encode($AFRnv7c));
                    }
                    return true;
                }
            }
        }
    }

    private static function translateLingvanexUpdate()
    {
        if (!get_option("wpg_" . "lingvanex_api_key")) {
            self::_adminNotice("API-ключ Lingvanex Translate не задан!");
        } elseif (function_exists("curl_init")) {
            $I0Fz7r0 = curl_init();
            $OV9DEXc = "https://api-b2b.backenster.com/b1/api/v3/getLanguages?platform=api&code=ru_RU";
            $F5_GLYO[] = "Accept: application/json";
            $F5_GLYO[] = "Authorization: ".get_option("wpg_" . "lingvanex_api_key");
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, 0);
            if (get_option("wpg_" . "curlProxyType")) {
                switch (get_option("wpg_" . "curlProxyType")) {
                    case 1:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
                        break;
                    case 2:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
                        break;
                    case 3:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);
                        break;
                    default:
                        curl_setopt($I0Fz7r0, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                }
            }
            if (get_option("wpg_" . "curlProxyUserPwd")) {
                curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, get_option("wpg_" . "curlProxyUserPwd"));
            }
            $yuOjcvy = curl_exec($I0Fz7r0);
            curl_close($I0Fz7r0);
            $FwsQKL0 = json_decode($yuOjcvy, true);
            $check_error = isset($FwsQKL0['err']) ? trim($FwsQKL0['err']) : null;
            if ($check_error === null) {
                $get_result = isset($FwsQKL0['result']) ? $FwsQKL0['result'] : array();
                if (is_array($get_result) && !empty($get_result)) {
                    foreach($get_result as $gr_key) {
                        $HlL9yQd[$gr_key["full_code"]] = mb_strtoupper(mb_substr($gr_key["codeName"], 0, 1)) . mb_substr($gr_key["codeName"], 1);
                    }
                    foreach ($HlL9yQd as $jDHxI9c => $OG4b_Fl) {
                        if ($jDHxI9c == "ru_RU") {
                            continue;
                        }
                        $ER32XdC["ru_RU|" . $jDHxI9c] = "Русский > " . $OG4b_Fl;
                        $ER32XdC[$jDHxI9c . "|ru_RU"] = $OG4b_Fl . " > Русский";
                    }
                    foreach ($HlL9yQd as $jDHxI9c => $OG4b_Fl) {
                        if ($jDHxI9c == "en_US") {
                            continue;
                        }
                        $ER32XdC["en_US|" . $jDHxI9c] = "Английский > " . $OG4b_Fl;
                        $ER32XdC[$jDHxI9c . "|en_US"] = $OG4b_Fl . " > Английский";
                    }
                    ksort($ER32XdC);
                    if (count($ER32XdC)) {
                        if (get_option("wpg_lingvanexTransLangs")) {
                            update_option("wpg_lingvanexTransLangs", json_encode($ER32XdC));
                        } else {
                            add_option("wpg_lingvanexTransLangs", json_encode($ER32XdC));
                        }
                        return true;
                    }
                }
            }
        }
    }
    public static function settings()
    {
        WPGErrorHandler::initPhpErrors();
        if (isset($_GET["translate_lingvanex"]) == "update") {
            if (self::translateLingvanexUpdate()) {
                self::_adminNotice("База переводов сервиса Lingvanex Translate успешно обновлена!");
            }
        }
        if (isset($_GET["translate_deepl"]) == "update") {
            if (self::translateDeeplUpdate()) {
                self::_adminNotice("База переводов сервиса DeepL Translate успешно обновлена!");
            }
        }
        if (isset($_GET["translate_cloud_yandex"]) == "update") {
            if (self::translateYandexCloudUpdate()) {
                self::_adminNotice("База переводов сервиса Яндекс.Облако Translate успешно обновлена!");
            }
        }
        if (isset($_GET["translate_cloud_google"]) == "update") {
            if (self::translateGoogleCloudUpdate()) {
                self::_adminNotice("База переводов сервиса Google Cloud Translation v2 успешно обновлена!");
            }
        }
        if (isset($_POST["options"])) {
            foreach ($_POST["options"] as $cO7uZHL => $OG4b_Fl) {
                if (get_option("wpg_{$cO7uZHL}") != $OG4b_Fl) {
                    update_option("wpg_{$cO7uZHL}", $OG4b_Fl);
                } else {
                    add_option("wpg_{$cO7uZHL}", $OG4b_Fl);
                }
            }
            if (isset($_POST["saveButton"])) {
                if (get_option("wpg_lingvanex_api_key") and !get_option("wpg_lingvanexTransLangs")) {
                    WPGPlugin::translateLingvanexUpdate();
                }
                if (get_option("wpg_deepl_api_key") and !get_option("wpg_deeplTransLangs")) {
                    WPGPlugin::translateDeeplUpdate();
                }
                if (get_option("wpg_yandexOauth") and !get_option("wpg_yandexCloudTransLangs")) {
                    WPGPlugin::translateYandexCloudUpdate();
                }
                if (get_option("wpg_google_translate_api_key") and !get_option("wpg_googleTransLangs")) {
                    WPGPlugin::translateGoogleCloudUpdate();
                }
                self::_adminNotice("Настройки успешно сохранены");
            } else {
                return;
            }
        }
        $LDmT_oL = get_option("wpg_textorobotApiKey");
        if ($LDmT_oL) {
            include_once WPGRABBER_PLUGIN_DIR . "textorobot/textorobotApi.php";
            $efIyiVO = new TextorobotApi($LDmT_oL);
            $KiK8X2T = $efIyiVO->balance();
        }
        $i5QmD1g = file_get_contents(WPGRABBER_PLUGIN_TPL_DIR . "settings.php");
        if (!(1 != 1)) {
            include_once WPGRABBER_PLUGIN_TPL_DIR . "settings.php";
            self::_footer();
        }
    }
    public static function adminDefaultPage()
    {
        return "/wp-admin/admin.php?page=wpgrabber-index";
    }
    protected static function _getUserLevel()
    {
        return wpgIsDemo() ? 0 : "update_core";
    }
    protected static function YIOPAt7($UW1a4az)
    {
        if (current_user_can("publish_posts") && current_user_can("update_core")) {
            return false;
        }
        $kOuc3e_ = array("90", "91", "92", "93", "94");
        if (!wpgIsDemo()) {
            return false;
        }
        if (is_array($UW1a4az)) {
            $Y1Opg3f = array_intersect($UW1a4az, $kOuc3e_);
            if (!count($Y1Opg3f)) {
                return false;
            }
        } else {
            if (!in_array($UW1a4az, array("90", "91", "92", "93", "94"))) {
                return false;
            }
        }
        self::_adminNotice("Тестовые ленты не возможно редактировать и удалять в demo-режиме! Если Вам нужно изменить ленту, скопируйте ее и меняейте настройки в копии ленты!");
        return true;
    }
    public static function setListOptions($NZ2xBjb, $gnhkzC1, $OG4b_Fl)
    {
        if ($gnhkzC1 == "wpgrabber_feeds_per_page") {
            $OG4b_Fl = intval($OG4b_Fl);
            return $OG4b_Fl ? $OG4b_Fl : 256;
        }
        return $OG4b_Fl;
    }
    protected static function _adminNotice($mbqPvCu, $rCCLf1f = "updated")
    {
        echo "        <div class=\"";
        echo $rCCLf1f;
        echo "\"><p>";
        echo $mbqPvCu;
        echo "</p></div>";
    }
    public static function deletePost($HrAL3Ba)
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        $KUr6Q8o = "SELECT *\n        FROM `" . $wpdb->prefix . "wpgrabber_content`\n        WHERE `content_id` = " . (int) $HrAL3Ba;
        $cSYPUuj = $wpdb->get_results($KUr6Q8o, ARRAY_A);
        if ($wpdb->last_error != '') {
            WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
        } else {
            if (count($cSYPUuj)) {
                foreach ($cSYPUuj as $row) {
                    $rJakYp_ = $cSYPUuj["images"];
                    if (trim($rJakYp_) == '') {
                        continue;
                    }
                    $rJakYp_ = explode(",", $rJakYp_);
                    if (count($rJakYp_)) {
                        foreach ($rJakYp_ as $Nvk6lab) {
                            @unlink(ABSPATH . $Nvk6lab);
                        }
                    }
                }
                $KUr6Q8o = "DELETE FROM `" . $wpdb->prefix . "wpgrabber_content`\n            WHERE `content_id` = " . (int) $HrAL3Ba;
                $wpdb->query($KUr6Q8o);
                if ($wpdb->last_error != '') {
                    WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
                } else {
                    $K7IAF8j = get_posts(array("post_type" => "attachment", "posts_per_page" => -1, "post_status" => null, "post_parent" => $HrAL3Ba));
                    if (!empty($K7IAF8j)) {
                        foreach ($K7IAF8j as $rjvTbXK) {
                            wp_delete_attachment($rjvTbXK->ID);
                        }
                    }
                }
            }
        }
    }
    public static function clear()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        if (empty($_POST["rows"])) {
            return false;
        }
        $cSYPUuj = array_map("intval", $_POST["rows"]);
        $KUr6Q8o = "SELECT `content_id`\n                FROM `" . $wpdb->prefix . "wpgrabber_content`\n                WHERE `feed_id` IN (" . implode(",", $cSYPUuj) . ")\n                AND `content_id` > 0";
        $LgsIyMb = $wpdb->get_col($KUr6Q8o);
        if ($wpdb->last_error != '') {
            WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
        } else {
            if (count($LgsIyMb)) {
                foreach ($LgsIyMb as $fH9cjUU) {
                    wp_delete_post($fH9cjUU, true);
                }
            }
            $KUr6Q8o = "DELETE FROM `" . $wpdb->prefix . "wpgrabber_content`\n                    WHERE `feed_id` IN (" . implode(",", $cSYPUuj) . ")\n                    AND `content_id` > 0";
            $wpdb->query($KUr6Q8o);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
            self::_adminNotice("Успешно удалено записей: " . (int) count($LgsIyMb));
        }
    }
    public static function execWPG($HrAL3Ba, $BMO7tXT = false)
    {
        WPGErrorHandler::initPhpErrors();
        $hmdNo7t = self::_getTGrabber();
        if ($BMO7tXT) {
            $hmdNo7t->setTest();
        }
        $hmdNo7t->execute($HrAL3Ba);
        echo "<br /><br /><div id=\"echo-box\" style=\"border: 1px solid #cacaca; padding: 10px; background:#e5e5e5; margin-right: 20px;\">";
        echo $hmdNo7t->getLog();
        echo "</div>";
    }
    public static function test($HrAL3Ba)
    {
        self::execWPG($HrAL3Ba, true);
    }
    private static function _getTGrabber()
    {
        if (wpgIsPro()) {
            $rCCLf1f = "TGrabberWordPressPro";
        } elseif (wpgIsStandard()) {
            $rCCLf1f = "TGrabberWordPressStandard";
        } elseif (wpgIsLite()) {
            $rCCLf1f = "TGrabberWordPressLite";
        } else {
            $rCCLf1f = "TGrabberWordPress";
        }
        $iGA3DcO = new $rCCLf1f();
        return $iGA3DcO;
    }
    public static function save()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        $row = $_POST["row"];
        $rydeYca = $_POST["params"];
        if (count($rydeYca["usrepl"])) {
            foreach ($rydeYca["usrepl"] as $OG4b_Fl) {
                if (!$OG4b_Fl["type"]) {
                    continue;
                }
                $rydeYca["replace"][$OG4b_Fl["type"]][] = $OG4b_Fl;
            }
        }
        $rydeYca = WPGHelper::strips($rydeYca);
        $row = WPGHelper::strips($row);
        $row["params"] = base64_encode(serialize($rydeYca));
        $row["id"] = intval($row["id"]);
        if ($row["id"]) {
            if (self::YIOpAt7($row["id"])) {
                return null;
            }
            $sMGHkPy = $wpdb->update($wpdb->prefix . "wpgrabber", array("name" => $row["name"], "type" => $row["type"], "url" => $row["url"], "links" => $row["links"], "title" => $row["title"], "text_start" => $row["text_start"], "text_end" => $row["text_end"], "rss_encoding" => $row["rss_encoding"], "html_encoding" => $row["html_encoding"], "published" => $row["published"], "params" => $row["params"], "interval" => isset($row["interval"]) ? $row["interval"] : 60), array("id" => $row["id"]));
            if ($sMGHkPy > 0) {
                self::_adminNotice("Лента успешно обновлена");
            } elseif ($sMGHkPy === False) {
                if ($wpdb->last_error != '') {
                    WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
                }
                self::_adminNotice("Ошибка сохранения изменений в ленте!", "error");
                exit(var_dump($wpdb->last_query));
            } else {
                self::_adminNotice("OK, без обновления");
            }
            return $row["id"];
        } else {
            $row["interval"] = '';
            $sMGHkPy = $wpdb->insert($wpdb->prefix . "wpgrabber", array("name" => $row["name"], "type" => $row["type"], "url" => $row["url"], "links" => $row["links"], "title" => $row["title"], "text_start" => $row["text_start"], "text_end" => $row["text_end"], "rss_encoding" => $row["rss_encoding"], "html_encoding" => $row["html_encoding"], "published" => $row["published"], "params" => $row["params"], "interval" => $row["interval"]));
            if ($sMGHkPy > 0) {
                self::_adminNotice("Лента успешно добавлена");
                return $wpdb->insert_id;
            } else {
                if ($wpdb->last_error != '') {
                    WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
                }
                self::_adminNotice("Ошибка сохранения ленты!", "error");
            }
        }
    }
    public static function del()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        if (empty($_POST["rows"])) {
            return false;
        }
        if (self::yIoPat7($_POST["rows"])) {
            return null;
        }
        $cSYPUuj = array_map("intval", $_POST["rows"]);
        $KUr6Q8o = "DELETE FROM `" . $wpdb->prefix . "wpgrabber`\n        WHERE id IN (" . implode(",", $cSYPUuj) . ")";
        $sMGHkPy = $wpdb->query($KUr6Q8o);
        if ($sMGHkPy > 0) {
            self::_adminNotice("Выбранные ленты успешно удалены!");
        } else {
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
            self::_adminNotice("Ошибка удаления лент!", "error");
        }
    }
    public static function copy()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        if (empty($_REQUEST["rows"])) {
            self::_adminNotice("Не выбранны ленты для копирования", "error");
            return false;
        }
        $cSYPUuj = array_map("intval", $_REQUEST["rows"]);
        $KUr6Q8o = "SELECT `name`, `type`, `url`, `links`, `title`, `text_start`,\n          `text_end`, `rss_encoding`, `html_encoding`, `published`,\n          `params`, `interval`\n        FROM `" . $wpdb->prefix . "wpgrabber`\n        WHERE id IN (" . implode(",", $cSYPUuj) . ")";
        $cSYPUuj = $wpdb->get_results($KUr6Q8o, "ARRAY_A");
        if ($wpdb->last_error != '') {
            WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
        }
        if (!count($cSYPUuj) and !is_array($cSYPUuj)) {
            self::_adminNotice("Ошибка выборки списка лент из базы", "error");
        }
        $uXvFAKA = $agSrdlr = 0;
        foreach ($cSYPUuj as $row) {
            $cxMHeNP = array();
            $svpdaDc = array();
            $row["name"] = "Копия " . $row["name"];
            $sMGHkPy = $wpdb->insert($wpdb->prefix . "wpgrabber", $row);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
            if ($sMGHkPy > 0) {
                $uXvFAKA++;
            } else {
                $agSrdlr++;
            }
        }
        self::_adminNotice("Скопировано лент: " . (int) $uXvFAKA . ", ошибок: " . (int) $agSrdlr);
    }
    public function export()
    {
        global $wpdb;
        if (isset($_REQUEST["action"]) and $_REQUEST["action"] != "export") {
            return false;
        }
        if (isset($_POST["rows"]) and $_POST["rows"]) {
            if (isset($_REQUEST["action"]) and $_REQUEST["action"] == "-1") {
                $_REQUEST["action"] = $_REQUEST["action2"];
            }
        }
        if (empty($_POST["rows"])) {
            return false;
        }
        WPGErrorHandler::initPhpErrors();
        $cSYPUuj = array_map("intval", $_POST["rows"]);
        $KUr6Q8o = "SELECT `name`, `type`, `url`, `links`, `title`,\n          `text_start`, `text_end`, `rss_encoding`, `html_encoding`,\n          `published`, `params`, `interval`\n        FROM `" . $wpdb->prefix . "wpgrabber`\n        WHERE id IN (" . implode(",", $cSYPUuj) . ")";
        $cSYPUuj = $wpdb->get_results($KUr6Q8o, ARRAY_A);
        if ($wpdb->last_error != '') {
            WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
        }
        if (is_array($cSYPUuj) and count($cSYPUuj)) {
            $aZNFivs = array();
            foreach ($cSYPUuj as $row) {
                if (count($row)) {
                    $xXBWin1 = '';
                    foreach ($row as $cO7uZHL => $OG4b_Fl) {
                        $xXBWin1 .= "\t\t<{$cO7uZHL}><![CDATA[{$OG4b_Fl}]]></{$cO7uZHL}>\n";
                    }
                    $aZNFivs[] = $xXBWin1;
                }
            }
            if (!count($aZNFivs)) {
                self::_adminNotice("Ошибка сбора лент", "error");
                return;
            }
            foreach ($aZNFivs as $JzVs6je) {
                $j0sfWJz .= "\t<feed>\n{$JzVs6je}\t</feed>\n";
            }
            $j0sfWJz = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n<feeds wpgcore=\"" . WPGRABBER_CORE_VERSION . "\">\n{$j0sfWJz}</feeds>";
            header("Content-type: text/xml");
            header("Content-Disposition: attachment; filename=export.xml");
            echo $j0sfWJz;
            self::_destroy();
            exit;
        } else {
            self::_adminNotice("Ошибка выборки списка лент из базы", "error");
            return false;
        }
    }
    public static function import()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        if ($_FILES["file"]) {
            $Z0ZrJkP = file_get_contents($_FILES["file"]["tmp_name"]);
            if (trim($Z0ZrJkP) == '') {
                self::_adminNotice("Пустой XML-файл", "error");
                return;
            }
            $j0sfWJz = simplexml_load_string($Z0ZrJkP);
            $mPCpJNY = isset($j0sfWJz["wpgcore"]) ? (string) $j0sfWJz["wpgcore"] : "3.0.1";
            if (!count($j0sfWJz->feed)) {
                self::_adminNotice("Данных для импорта лент в XML-файле не обнаружено", "error");
                return;
            }
            foreach ($j0sfWJz->feed as $JzVs6je) {
                $Xk3x7Fh = array();
                foreach ($JzVs6je->children() as $AatbMwV) {
                    $cO7uZHL = $AatbMwV->getName();
                    if ($cO7uZHL !== '' and WPGWordPressDB::isField($wpdb->prefix . "wpgrabber", $cO7uZHL)) {
                        $Xk3x7Fh[$cO7uZHL] = (string) $JzVs6je->{$cO7uZHL};
                    }
                }
                if (!empty($Xk3x7Fh)) {
                    $aZNFivs[] = $Xk3x7Fh;
                }
            }
            if (!count($aZNFivs)) {
                self::_adminNotice("Данных для импорта лент в XML-файле не обнаружено", "error");
                return;
            }
            foreach ($aZNFivs as $JzVs6je) {
                $sMGHkPy = $wpdb->insert($wpdb->prefix . "wpgrabber", $JzVs6je);
                if ($wpdb->last_error != '') {
                    WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
                }
                if ($sMGHkPy > 0) {
                    $sbs2orE++;
                } else {
                    $GDwzPT3++;
                }
            }
            self::_adminNotice("Успешно импортировано: " . (int) $sbs2orE . " лент, выявлено ошибок: " . (int) $GDwzPT3);
        }
        $i5QmD1g = file_get_contents(WPGRABBER_PLUGIN_TPL_DIR . "import.php");
        if (!(1 != 1)) {
            include_once WPGRABBER_PLUGIN_TPL_DIR . "import.php";
            self::_footer();
        }
    }
    public static function on()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        if (isset($_REQUEST["rows"])) {
            $cSYPUuj = array_map("intval", $_REQUEST["rows"]);
            $KUr6Q8o = "UPDATE `" . $wpdb->prefix . "wpgrabber`\n          SET published = 1\n          WHERE id IN (" . implode(",", $cSYPUuj) . ")";
            $sMGHkPy = $wpdb->query($KUr6Q8o);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
            if ($sMGHkPy > 0) {
                self::_adminNotice("Выбранные ленты успешно включены");
                return true;
            }
        }
        self::_adminNotice("Ошибка включения выбранных лент!", "error");
        return false;
    }
    public static function off()
    {
        global $wpdb;
        WPGErrorHandler::initPhpErrors();
        if (isset($_REQUEST["rows"])) {
            $cSYPUuj = array_map("intval", $_REQUEST["rows"]);
            $KUr6Q8o = "UPDATE `" . $wpdb->prefix . "wpgrabber`\n          SET published = 0\n          WHERE id IN (" . implode(",", $cSYPUuj) . ")";
            $sMGHkPy = $wpdb->query($KUr6Q8o);
            if ($wpdb->last_error != '') {
                WPGErrorHandler::add($wpdb->last_error, __FILE__, __LINE__);
            }
            if ($sMGHkPy > 0) {
                self::_adminNotice("Выбранные ленты успешно выключены");
                return true;
            }
        }
        self::_adminNotice("Ошибка выключения выбранных лент!", "error");
        return false;
    }
    public static function ajaxExec()
    {
        ob_start();
        @session_start();
        WPGErrorHandler::initPhpErrors();
        $sMGHkPy = array("pid" => '', "status" => 0, "error" => '', "log" => '');
        $HrAL3Ba = !empty($_REQUEST["id"]) ? (int) $_REQUEST["id"] : 0;
        $gYxZ8Lg = !empty($_REQUEST["pid"]) ? $_REQUEST["pid"] : null;
        $k8iSG7y = !empty($_REQUEST["test"]);
        if (get_option("wpg_useTransactionModel")) {
            // if (!session_id()) {
            //     session_start();
            // }
            if ($gYxZ8Lg === null) {
                $gYxZ8Lg = md5(microtime(true) . rand(0, 100));
                while (isset($_SESSION[$gYxZ8Lg])) {
                    $gYxZ8Lg = md5(microtime(true) . rand(0, 100));
                }
                $_SESSION[$gYxZ8Lg]["date_add"] = time();
                $hmdNo7t = self::_getTGrabber();
                if ($k8iSG7y) {
                    $hmdNo7t->setTest();
                }
                $hmdNo7t->setTransactionModel();
                $nhzXB_Q = $hmdNo7t->execute($HrAL3Ba);
                $sMGHkPy["log"] = $hmdNo7t->getLog();
            } else {
                $nhzXB_Q = false;
                if (isset($_SESSION[$gYxZ8Lg]["grabber"])) {
                    $hmdNo7t = @unserialize($_SESSION[$gYxZ8Lg]["grabber"]);
                    if (is_object($hmdNo7t)) {
                        $nhzXB_Q = $hmdNo7t->execute($HrAL3Ba);
                        $sMGHkPy["log"] = $hmdNo7t->getLog();
                    }
                }
            }
            if (is_object($nhzXB_Q)) {
                $sMGHkPy["pid"] = $gYxZ8Lg;
                $_SESSION[$gYxZ8Lg]["grabber"] = serialize($nhzXB_Q);
            } else {
                if ($nhzXB_Q === true) {
                    $sMGHkPy["status"] = 1;
                } else {
                    $sMGHkPy["status"] = 2;
                    $sMGHkPy["error"] = "ajaxExec::Сбой сервера";
                }
                unset($_SESSION[$gYxZ8Lg]);
            }
        } else {
            $hmdNo7t = self::_getTGrabber();
            if ($k8iSG7y) {
                $hmdNo7t->setTest();
            }
            $hmdNo7t->execute($HrAL3Ba);
            $sMGHkPy["log"] = $hmdNo7t->getLog();
            $sMGHkPy["status"] = 1;
        }
        $dQW9q_2 = ob_get_clean();
        if ($dQW9q_2) {
            $sMGHkPy["log"] .= "<p style=\"color: red;\">" . $dQW9q_2 . "</p>";
        }
        echo json_encode($sMGHkPy);
        @session_write_close();
        exit;
    }
    public static function getErrorLogFile()
    {
        WPGErrorHandler::initPhpErrors();
        $kUNMTT3 = "wpg_error_log.txt";
        $uHyzJ4K = WPGErrorHandler::getTxtLog();
        header("Content-type: text/plain");
        header("Content-Length: " . strlen($uHyzJ4K));
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        echo $uHyzJ4K;
        exit;
    }
    public static function deactivateAndClear()
    {
        global $wpdb;
        deactivate_plugins(plugin_basename(WPGRABBER_PLUGIN_FILE));
        $PANgw_5[] = "DROP TABLE " . $wpdb->prefix . "wpgrabber";
        $PANgw_5[] = "DROP TABLE " . $wpdb->prefix . "wpgrabber_content";
        $PANgw_5[] = "DROP TABLE " . $wpdb->prefix . "wpgrabber_errors";
        $PANgw_5[] = "DELETE FROM " . $wpdb->prefix . "options WHERE option_name LIKE 'wpg_%'";
        foreach ($PANgw_5 as $KUr6Q8o) {
            $wpdb->query($KUr6Q8o);
        }
        wp_redirect(admin_url("plugins.php"));
    }
}
?>