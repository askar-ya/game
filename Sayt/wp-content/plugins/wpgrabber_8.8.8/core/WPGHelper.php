<?php

class WPGHelper
{
    public static function yesNoRadioList($cO7uZHL, $hBbE2bu, $atQSndO = null, $PBkW16K = "Да", $Hl3Y7oV = "Нет")
    {
        $cdD2dIu = "<input type=\"radio\" name=\"" . WPGTools::esc($cO7uZHL) . "\" value=\"1\"" . @$atQSndO[0];
        if ($hBbE2bu) {
            $cdD2dIu .= " checked=\"checked\"";
        }
        $cdD2dIu .= ">&nbsp;" . $PBkW16K;
        $cdD2dIu .= "&nbsp;&nbsp;<input type=\"radio\" name=\"" . WPGTools::esc($cO7uZHL) . "\" value=\"0\"" . @$atQSndO[1];
        if (!$hBbE2bu) {
            $cdD2dIu .= " checked=\"checked\"";
        }
        $cdD2dIu .= ">&nbsp;" . $Hl3Y7oV;
        return $cdD2dIu;
    }
    public static function selectList()
    {
        @(list($cO7uZHL, $svpdaDc, $qPGT0B4, $c17A1uT, $PQx0I_0) = func_get_args());
        if (empty($svpdaDc)) {
            return null;
        }
        $cdD2dIu = "<select name=\"" . WPGTools::esc($cO7uZHL) . "\"";
        if (trim($PQx0I_0) != '') {
            $cdD2dIu .= " " . $PQx0I_0 . ">";
        } else {
            $cdD2dIu .= ">";
        }
        if (!is_array($svpdaDc)) {
            $svpdaDc = explode(",", (string) $svpdaDc);
        }
        if (!is_array($qPGT0B4)) {
            $qPGT0B4 = !empty($qPGT0B4) ? explode(",", $qPGT0B4) : array();
        }
        foreach ($svpdaDc as $jDHxI9c => $rGoHrYY) {
            if ($c17A1uT) {
                $OG4b_Fl = $jDHxI9c;
                $gnhkzC1 = $rGoHrYY;
            } else {
                $OG4b_Fl = $rGoHrYY;
                $gnhkzC1 = $rGoHrYY;
            }
            if (in_array($OG4b_Fl, $qPGT0B4)) {
                $cdD2dIu .= "<option value=\"" . WPGTools::esc($OG4b_Fl) . "\" selected=\"selected\">" . WPGTools::esc($gnhkzC1) . "</option>";
            } else {
                $cdD2dIu .= "<option value=\"" . WPGTools::esc($OG4b_Fl) . "\">" . WPGTools::esc($gnhkzC1) . "</option>";
            }
        }
        $cdD2dIu .= "</select>";
        return $cdD2dIu;
    }
    public static function charsetList()
    {
        return array("исходная", "WINDOWS-1251", "UTF-8", "KOI8-R", "ISO-8859-1");
    }
    public static function getAuthors($HrAL3Ba = false)
    {
        global $wpdb;
        static $Xk3x7Fh;
        if (!isset($Xk3x7Fh)) {
            $cSYPUuj = $wpdb->get_results("SELECT id, user_login, user_nicename FROM {$wpdb->users}", "ARRAY_A");
            if (count($cSYPUuj)) {
                foreach ($cSYPUuj as $row) {
                    $Xk3x7Fh[$row["id"]] = $row["user_login"] . " (" . $row["user_nicename"] . ")";
                }
            }
        }
        if ($HrAL3Ba === false) {
            return $Xk3x7Fh;
        } else {
            $HrAL3Ba = intval($HrAL3Ba);
            return isset($Xk3x7Fh[$HrAL3Ba]) ? $Xk3x7Fh[$HrAL3Ba] : null;
        }
    }
    public static function getPostTypes()
    {
        $C5ziyjQ = '';
        $p_U1gJw = '';
        static $cdD2dIu;
        if (!isset($cdD2dIu)) {
            $UTRd7hS = get_post_types($C5ziyjQ, $p_U1gJw);
            foreach ($UTRd7hS as $jDHxI9c => $vruThyc) {
                $cdD2dIu[$jDHxI9c] = $vruThyc->labels->singular_name;
            }
        }
        return $cdD2dIu;
    }
    public static function getCategoriesList($cO7uZHL, $svpdaDc)
    {
        if (!is_array($svpdaDc)) {
            $svpdaDc = $svpdaDc !== '' ? (array) $svpdaDc : array();
        }
        $Asue6YY = get_categories(array("get" => "all"));
        $MAMbwlB = array();
        foreach ($Asue6YY as $A3ic19p) {
            $MAMbwlB[$A3ic19p->category_parent][] = $A3ic19p;
        }
        $cdD2dIu = '';
        if (!empty($MAMbwlB[0])) {
            $cdD2dIu .= "<div class=\"categorydiv\"><div class=\"tabs-panel\">";
            $cdD2dIu .= self::_recursiveGetCategoriesListLevel($MAMbwlB[0], $MAMbwlB, $cO7uZHL, $svpdaDc);
            $cdD2dIu .= "</div></div>";
        }
        return $cdD2dIu;
    }
    protected static function _recursiveGetCategoriesListLevel($MAMbwlB, &$O27dCNH, &$cO7uZHL, &$svpdaDc, $Btru7cb = 0)
    {
        $cdD2dIu = "<ul class=\"" . ($Btru7cb == 0 ? "categorychecklist" : "children") . "\">";
        foreach ($MAMbwlB as $A3ic19p) {
            $cdD2dIu .= "<li>";
            $cdD2dIu .= "<label class=\"selectit\">";
            $cdD2dIu .= "<input value=\"" . (int) $A3ic19p->cat_ID . "\" name=\"" . WPGTools::esc($cO7uZHL) . "[]\" type=\"checkbox\"" . (in_array($A3ic19p->cat_ID, $svpdaDc) ? " checked=\"checked\"" : '') . " /> " . WPGTools::esc($A3ic19p->cat_name);
            $cdD2dIu .= "</label>";
            if (isset($A3ic19p->cat_ID) and $A3ic19p->cat_ID !== '' and !empty($O27dCNH[$A3ic19p->cat_ID])) {
                $Btru7cb++;
                $cdD2dIu .= self::_recursiveGetCategoriesListLevel($O27dCNH[$A3ic19p->cat_ID], $O27dCNH, $cO7uZHL, $svpdaDc, $Btru7cb);
            }
            $cdD2dIu .= "</li>";
        }
        $cdD2dIu .= "</ul>";
        return $cdD2dIu;
    }
    public static function getListPostStatus()
    {
        return array("publish" => "Опубликовано", "draft" => "Черновик");
    }
    public static function translateProvidersList()
    {
        $MAMbwlB[0] = "Google Translation FREE";
        $MAMbwlB[1] = "Yandex Translate FREE";
        $MAMbwlB[2] = "Яндекс.Облако Translate API";
        $MAMbwlB[3] = "Google Cloud Translation API";
        $MAMbwlB[4] = "DeepL Перевод API";
        $MAMbwlB[5] = "Lingvanex API";
        return $MAMbwlB;
    }
    public static function translateLangsList($k3WF3KP)
    {
        $HlL9yQd = array(0 => array("az" => "азербайджанский", "sq" => "албанский", "am" => "амхарский", "en" => "английский", "ar" => "арабский", "hy" => "армянский", "af" => "африкаанс", "eu" => "баскский", "be" => "белорусский", "bn" => "бенгальский", "my" => "бирманский", "bg" => "болгарский", "bs" => "боснийский", "cy" => "валлийский", "hu" => "венгерский", "vi" => "вьетнамский", "haw" => "гавайский", "gl" => "галисийский", "el" => "греческий", "ka" => "грузинский", "gu" => "гуджарати", "da" => "датский", "zu" => "зулу", "iw" => "иврит", "ig" => "игбо", "yi" => "идиш", "id" => "индонезийский", "ga" => "ирландский", "is" => "исландский", "es" => "испанский", "it" => "итальянский", "yo" => "йоруба", "kk" => "казахский", "kn" => "каннада", "ca" => "каталанский", "zh-TW" => "китайский (традиционный)", "zh-CN" => "китайский (упрощенный)", "ko" => "корейский", "co" => "корсиканский", "ht" => "креольский (Гаити)", "ku" => "курманджи", "km" => "кхмерский", "xh" => "кхоса", "lo" => "лаосский", "lv" => "латышский", "lt" => "литовский", "lb" => "люксембургский", "mk" => "македонский", "mg" => "малагасийский", "ms" => "малайский", "ml" => "малаялам", "mt" => "мальтийский", "mi" => "маори", "mr" => "маратхи", "mn" => "монгольский", "de" => "немецкий", "ne" => "непальский", "nl" => "нидерландский", "no" => "норвежский", "pa" => "панджаби", "fa" => "персидский", "pl" => "польский", "pt" => "португальский", "ps" => "пушту", "ro" => "румынский", "ru" => "русский", "sm" => "самоанский", "ceb" => "себуанский", "sr" => "сербский", "st" => "сесото", "si" => "сингальский", "sd" => "синдхи", "sk" => "словацкий", "sl" => "словенский", "so" => "сомалийский", "sw" => "суахили", "su" => "суданский", "tg" => "таджикский", "th" => "тайский", "ta" => "тамильский", "te" => "телугу", "tr" => "турецкий", "uz" => "узбекский", "uk" => "украинский", "ur" => "урду", "tl" => "филиппинский", "fi" => "финский", "fr" => "французский", "fy" => "фризский", "ha" => "хауса", "hi" => "хинди", "hmn" => "хмонг", "hr" => "хорватский", "ny" => "чева", "cs" => "чешский", "sv" => "шведский", "sn" => "шона", "gd" => "шотландский (гэльский)", "eo" => "эсперанто", "et" => "эстонский", "jw" => "яванский", "ja" => "японский", "he" => "иврит", "zh" => "китайский (упрощенный)"), 5 => array("en" => "английский", "ar" => "арабский", "bg" => "болгарский", "cy" => "валлийский", "hu" => "венгерский", "vi" => "вьетнамский", "ht" => "гаитянский креольский", "nl" => "голландский", "el" => "греческий", "da" => "датский", "he" => "иврит", "id" => "индонезийский", "es" => "испанский", "it" => "итальянский", "ca" => "каталанский", "zh_cht" => "китайский традиционный", "zh_chs" => "китайский упрощенный", "tlh" => "клингонский", "tlh_qaak" => "клингонский (piqad)", "ko" => "корейский", "lv" => "латышский", "lt" => "литовский", "ms" => "малайский", "mt" => "мальтийский", "de" => "немецкий", "no" => "норвежский", "fa" => "персидский", "pl" => "польский", "pt" => "португальский", "ro" => "румынский", "ru" => "русский", "sk" => "словацкий", "sl" => "словенский", "th" => "тайский", "tr" => "турецкий", "uk" => "украинский", "ur" => "урду", "fi" => "финский", "fr" => "французский", "hi" => "хинди", "mww" => "хмонг дау", "cs" => "чешский", "sv" => "шведский", "et" => "эстонский", "ja" => "японский"), 3 => array("az" => "азербайджанский", "sq" => "албанский", "am" => "амхарский", "en" => "английский", "ar" => "арабский", "hy" => "армянский", "af" => "африкаанс", "eu" => "баскский", "be" => "белорусский", "bn" => "бенгальский", "my" => "бирманский", "bg" => "болгарский", "bs" => "боснийский", "cy" => "валлийский", "hu" => "венгерский", "vi" => "вьетнамский", "haw" => "гавайский", "gl" => "галисийский", "el" => "греческий", "ka" => "грузинский", "gu" => "гуджарати", "da" => "датский", "zu" => "зулу", "iw" => "иврит", "ig" => "игбо", "yi" => "идиш", "id" => "индонезийский", "ga" => "ирландский", "is" => "исландский", "es" => "испанский", "it" => "итальянский", "yo" => "йоруба", "kk" => "казахский", "kn" => "каннада", "ca" => "каталанский", "zh-TW" => "китайский (традиционный)", "zh-CN" => "китайский (упрощенный)", "ko" => "корейский", "co" => "корсиканский", "ht" => "креольский (Гаити)", "ku" => "курманджи", "km" => "кхмерский", "xh" => "кхоса", "lo" => "лаосский", "lv" => "латышский", "lt" => "литовский", "lb" => "люксембургский", "mk" => "македонский", "mg" => "малагасийский", "ms" => "малайский", "ml" => "малаялам", "mt" => "мальтийский", "mi" => "маори", "mr" => "маратхи", "mn" => "монгольский", "de" => "немецкий", "ne" => "непальский", "nl" => "нидерландский", "no" => "норвежский", "pa" => "панджаби", "fa" => "персидский", "pl" => "польский", "pt" => "португальский", "ps" => "пушту", "ro" => "румынский", "ru" => "русский", "sm" => "самоанский", "ceb" => "себуанский", "sr" => "сербский", "st" => "сесото", "si" => "сингальский", "sd" => "синдхи", "sk" => "словацкий", "sl" => "словенский", "so" => "сомалийский", "sw" => "суахили", "su" => "суданский", "tg" => "таджикский", "th" => "тайский", "ta" => "тамильский", "te" => "телугу", "tr" => "турецкий", "uz" => "узбекский", "uk" => "украинский", "ur" => "урду", "tl" => "филиппинский", "fi" => "финский", "fr" => "французский", "fy" => "фризский", "ha" => "хауса", "hi" => "хинди", "hmn" => "хмонг", "hr" => "хорватский", "ny" => "чева", "cs" => "чешский", "sv" => "шведский", "sn" => "шона", "gd" => "шотландский (гэльский)", "eo" => "эсперанто", "et" => "эстонский", "jw" => "яванский", "ja" => "японский", "he" => "иврит", "zh" => "китайский (упрощенный)"));
        $k3WF3KP = intval($k3WF3KP);
        if ($k3WF3KP == 0) {
            $MAMbwlB = json_decode(get_option("wpg_googleTransLangs"), true);
        } elseif ($k3WF3KP == 1) {
            $MAMbwlB = json_decode(get_option("wpg_yandexCloudTransLangs"), true);
        } elseif ($k3WF3KP == 2) {
            $MAMbwlB = json_decode(get_option("wpg_yandexCloudTransLangs"), true);
        } elseif ($k3WF3KP == 3) {
            $MAMbwlB = json_decode(get_option("wpg_googleTransLangs"), true);
        } elseif ($k3WF3KP == 4) {
            $MAMbwlB = json_decode(get_option("wpg_deeplTransLangs"), true);
        } elseif ($k3WF3KP == 5) {
            $MAMbwlB = json_decode(get_option("wpg_lingvanexTransLangs"), true);
        } else {
            $MAMbwlB = array();
            if (!empty($HlL9yQd[$k3WF3KP])) {
                foreach ($HlL9yQd[$k3WF3KP] as $OLgfBZN => $Oyjt28N) {
                    foreach ($HlL9yQd[$k3WF3KP] as $nfp576c => $j5UfnDs) {
                        if ($OLgfBZN != $nfp576c) {
                            $MAMbwlB[$OLgfBZN . "-" . $nfp576c] = $Oyjt28N . " > " . $j5UfnDs;
                        }
                    }
                }
            }
        }
        if (empty($MAMbwlB)) {
            $MAMbwlB[0] = "не задано";
        } else {
            $KrFLjcY = array();
            if (isset($MAMbwlB["en-ru"])) {
                $KrFLjcY["en-ru"] = $MAMbwlB["en-ru"];
                unset($MAMbwlB["en-ru"]);
            }
            if (isset($MAMbwlB["ru-en"])) {
                $KrFLjcY["ru-en"] = $MAMbwlB["ru-en"];
                unset($MAMbwlB["ru-en"]);
            }
            $MAMbwlB = array_merge($KrFLjcY, $MAMbwlB);
        }
        return $MAMbwlB;
    }
    function escape($OG4b_Fl)
    {
        if (is_array($OG4b_Fl) and count($OG4b_Fl)) {
            foreach ($OG4b_Fl as $QmsPJ5F => $iEPqlLA) {
                $OG4b_Fl[$QmsPJ5F] = mysql_real_escape_string($iEPqlLA);
            }
        } else {
            $OG4b_Fl = mysql_real_escape_string($OG4b_Fl);
        }
        return $OG4b_Fl;
    }
    static function strips($OG4b_Fl)
    {
        if (is_array($OG4b_Fl) and count($OG4b_Fl)) {
            foreach ($OG4b_Fl as $QmsPJ5F => $iEPqlLA) {
                if (is_array($iEPqlLA)) {
                    $OG4b_Fl[$QmsPJ5F] = self::strips($iEPqlLA);
                } else {
                    $OG4b_Fl[$QmsPJ5F] = stripslashes($iEPqlLA);
                }
            }
        } else {
            $OG4b_Fl = stripslashes($OG4b_Fl);
        }
        return $OG4b_Fl;
    }
}