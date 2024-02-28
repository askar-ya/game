<?php

class TGrabberWordPress extends GrabberCore
{
    var $attachImages = array();
    var $uploadMediaOn = true;
    protected $_log = array();
    function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->config = new TGrabberWPOptions();
        $this->rootPath = rtrim(ABSPATH, "/");
        $this->config->set("imgPath", $this->config->get("imgPath") ? $this->config->get("imgPath") : "/wp-content/uploads/");
        $this->onLog = true;
        parent::__construct();
    }
    public function __sleep()
    {
        $this->db = null;
        $this->_log = array();
        return parent::__sleep();
    }
    public function __wakeup()
    {
        global $wpdb;
        $this->db = $wpdb;
    }
    function setTest()
    {
        parent::setTest();
        $this->config->set("imgPath", $this->config->get("testPath") ? $this->config->get("testPath") : "/wp-content/wpgrabber_tmp/");
        $K9n3Cqa = $this->rootPath . $this->config->get("imgPath");
        if (!file_exists($K9n3Cqa)) {
            mkdir($K9n3Cqa, 0777);
        }
        if (!is_writeable($K9n3Cqa)) {
            chmod($K9n3Cqa, 0777);
        }
        $aaYQX2V = glob("{$K9n3Cqa}*.*");
        if (count($aaYQX2V) > 100) {
            foreach ($aaYQX2V as $uHyzJ4K) {
                if (basename($uHyzJ4K) != "cookies.txt") {
                    @unlink($uHyzJ4K);
                }
            }
        }
    }
    function _echo($gdS6RwO)
    {
        if (!$this->onLog) {
            return;
        }
        $this->_log[] = $gdS6RwO;
    }
    public function getLog()
    {
        $imy0ZCu = implode('', $this->_log);
        $this->_log = array();
        return $imy0ZCu;
    }
    function getLinks($ESjIzDq, $KF1AqVH = null)
    {
        $UO2vAaF[] = "`feed_id` = " . (int) $this->feed["id"];
        if (!$this->feed["params"]["skip_error_urls"]) {
            $UO2vAaF[] = "`content_id` > 0";
        }
        $KUr6Q8o = "SELECT `url`\n        FROM `" . $this->db->prefix . "wpgrabber_content`\n        WHERE " . implode(" AND ", $UO2vAaF);
        $KF1AqVH = $this->db->get_col($KUr6Q8o);
        if ($this->db->last_error != '') {
            WPGErrorHandler::add($this->db->last_error, __FILE__, __LINE__);
        }
        return parent::getLinks($ESjIzDq, $KF1AqVH);
    }
    function saveContentRecord($HrAL3Ba, $OV9DEXc)
    {
        $KolfgTs = '';
        if (count($this->imagesContent)) {
            $KolfgTs = @implode(",", $this->imagesContent);
        }
        $o0Zjkgu = array("feed_id" => $this->feed["id"], "content_id" => $HrAL3Ba, "url" => $OV9DEXc, "images" => $KolfgTs);
        $sMGHkPy = $this->db->insert($this->db->prefix . "wpgrabber_content", $o0Zjkgu);
        if ($sMGHkPy) {
            $this->imagesContent = array();
            return true;
        } else {
            echo "db->insert: ";
            var_export($sMGHkPy);
        }
        if ($this->db->last_error != '') {
            WPGErrorHandler::add($this->db->last_error, __FILE__, __LINE__);
        }
        return false;
    }
    protected function _saveEmptyRecord($OV9DEXc)
    {
        if ($this->feed["params"]["skip_error_urls"] and !$this->testOn) {
            $this->imagesContent = array();
            return $this->saveContentRecord(0, $OV9DEXc);
        }
        return true;
    }
    function isTitle($Tgy8GEO)
    {
        static $qFS4NZd;
        if (!isset($qFS4NZd)) {
            $UO2vAaF = array();
            $GcEoGNE = array();
            $UO2vAaF[] = "p.post_type = '" . esc_sql($this->feed["params"]["postType"]) . "'";
            $UO2vAaF[] = "p.post_title <> ''";
            if ($this->feed["params"]["postType"] == "post") {
                $GcEoGNE[] = "LEFT JOIN `" . $this->db->prefix . "term_relationships` AS tr ON tr.object_id = p.ID";
                $GcEoGNE[] = "LEFT JOIN `" . $this->db->prefix . "term_taxonomy` AS tt ON (tt.term_taxonomy_id = tr.term_taxonomy_id AND tt.taxonomy = 'category')";
                $J07Wgzd = $this->_getValidCatIdArray();
                if (!empty($J07Wgzd)) {
                    $UO2vAaF[] = "tt.term_id IN (" . implode(", ", $J07Wgzd) . ")";
                }
            }
            $KUr6Q8o = "SELECT DISTINCT p.post_title FROM `" . $this->db->prefix . "posts` AS p " . (!empty($GcEoGNE) ? implode(" ", $GcEoGNE) : '') . " " . (!empty($UO2vAaF) ? "WHERE " . implode(" AND ", $UO2vAaF) : '');
            $cSYPUuj = $this->db->get_results($KUr6Q8o, ARRAY_A);
            if ($this->db->last_error != '') {
                WPGErrorHandler::add($this->db->last_error, __FILE__, __LINE__);
            } else {
                $qFS4NZd = array();
                if (count($cSYPUuj)) {
                    foreach ($cSYPUuj as $row) {
                        $qFS4NZd[$row["post_title"]] = $row["post_title"];
                    }
                }
            }
        }
        return isset($qFS4NZd[$Tgy8GEO]);
    }
    function getAlias($Pki2zj3, $Yor46kn)
    {
        $Pki2zj3 = $this->translit($Pki2zj3);
        if ($this->feed["params"]["aliasSize"]) {
            $Pki2zj3 = mb_substr($Pki2zj3, 0, $this->feed["params"]["aliasSize"], "utf-8");
        }
        $Pki2zj3 = mb_strtolower($Pki2zj3);
        return $Pki2zj3;
    }
    function save($OV9DEXc)
    {
        $this->attachImages = array();
        $sMGHkPy = parent::save($OV9DEXc);
        if (!$sMGHkPy) {
            return $sMGHkPy;
        }
        $xMWlZzB =& $this->content[$OV9DEXc];
        $Yor46kn = current_time("mysql");
        if ($this->feed["params"]["autoIntroOn"] == 1) {
            $xMWlZzB["text"] = str_replace("{{{MORE}}}", "<!--more-->", $xMWlZzB["text"]);
        } elseif ($this->feed["params"]["post_more_on"]) {
            $xMWlZzB["text"] = $this->insertMore($xMWlZzB["text"]);
        }
        $Lkw0xib = "Нет тэгов";
        if ($this->feed["params"]["post_tags_on"]) {
            if (is_array($xMWlZzB["tagsScrape"])) {
                $Lkw0xib = implode(",", $xMWlZzB["tagsScrape"]);
            }
        }
        $F4ZxImD = '';
        if ($this->feed["params"]["rnd_keywrd_1"]) {
            if (stristr($this->feed["params"]["rnd_keywrd_1"], "|")) {
                $c0vztvA = explode("|", $this->feed["params"]["rnd_keywrd_1"]);
                shuffle($c0vztvA);
                $F4ZxImD = $c0vztvA[0];
            }
        }
        $cq4Eowp = '';
        if ($this->feed["params"]["rnd_keywrd_2"]) {
            if (stristr($this->feed["params"]["rnd_keywrd_2"], "|")) {
                $c0vztvA = explode("|", $this->feed["params"]["rnd_keywrd_2"]);
                shuffle($c0vztvA);
                $cq4Eowp = $c0vztvA[0];
            }
        }
        isset($xMWlZzB["post_date_scrape"]) ? $xMWlZzB["post_date_scrape"] : '';
        if ($this->feed["params"]["template_on"]) {
            $o6hMTP0 = array("%TITLE%" => $xMWlZzB["title"], "%FULL_TEXT%" => $xMWlZzB["text"], "%INTRO_PIC%" => '', "%FEED%" => $this->feed["name"], "%FEED_URL%" => $this->feed["url"], "%SOURCE_URL%" => $OV9DEXc, "%SOURCE_SITE%" => parse_url($OV9DEXc, PHP_URL_HOST), "%TITLE_SOURCE%" => isset($this->titleNoTranslate[$OV9DEXc]) ? $this->titleNoTranslate[$OV9DEXc] : '', "%TEXT_SOURCE%" => isset($this->textNoTranslate[$OV9DEXc]) ? $this->textNoTranslate[$OV9DEXc] : '', "%TAGS_SCRAPE%" => $Lkw0xib, "%NOW_DATE%" => date("d.m.Y", current_time("timestamp", 0)), "%NOW_TIME%" => date("H:i", current_time("timestamp", 0)), "%PERCENT_SYN%" => isset($xMWlZzB["percent_syn"]) ? $xMWlZzB["percent_syn"] : '', "%RNDKEY_1%" => $F4ZxImD, "%RNDKEY_2%" => $cq4Eowp);
            $xMWlZzB["title"] = strtr($this->feed["params"]["template_title"], $o6hMTP0);
            $xMWlZzB["text"] = strtr($this->feed["params"]["template_full_text"], $o6hMTP0);
        }
        if (empty($xMWlZzB["title"])) {
            $this->_echo("<br /><i>Материл не сохранен по причине отсутствия заголовка</i>");
            return null;
        }
        if ($this->testOn) {
            $xMWlZzB["text"] = str_replace("<!--more-->", "<div style=\"font-size:10px;background:#cacaca;color:#333333;width:95%;padding-left:5px;margin-top:10px;margin-bottom:10px;\">далее (more) ...</div>", $xMWlZzB["text"]);
            $this->_echo("<br /><table celpadding='5' border='1'>\n            <tr><th valign='top' align='left'>Заголовок</th><td>{$xMWlZzB["title"]}</td></tr>\n            <tr><th valign='top' align='left'>Текст</th><td>{$xMWlZzB["text"]}</td></tr>\n            <tr><th valign='top' align='left'>Дата</th><td>{$xMWlZzB["post_date_scrape"]}</td></tr>\n            <tr><th valign='top' align='left'>Теги</th><td>{$Lkw0xib}</td></tr>\n            </table>");
            return true;
        }
        if ($this->feed["params"]["titleUniqueOn"]) {
            if ($this->isTitle($xMWlZzB["title"])) {
                $this->_echo("<br><br /><b>Неуникальный заголовок: \"" . $xMWlZzB["title"] . "\" в заданной категории!</b>");
                return null;
            }
        }
        $Ug0MM5L = '';
        if ($this->feed["params"]["postSlugOn"]) {
            if (!$this->feed["params"]["aliasMethod"]) {
                $Ug0MM5L = $this->getAlias($xMWlZzB["title"], $Yor46kn);
            }
        }
        $Bq9Vdo5 = array("comment_status" => $this->feed["params"]["comment_status"], "ping_status" => $this->feed["params"]["ping_status"], "post_author" => $this->feed["params"]["user_id"], "post_category" => $this->_getValidCatIdArray(), "post_content" => $xMWlZzB["text"], "post_date" => $xMWlZzB["post_date_scrape"], "post_date_gmt" => get_gmt_from_date($Yor46kn), "post_name" => $Ug0MM5L, "post_status" => $this->feed["params"]["post_status"], "post_title" => $xMWlZzB["title"], "post_type" => $this->feed["params"]["postType"], "post_thumbnail" => $this->picToIntro, "tags_input" => $xMWlZzB["tagsScrape"]);
        $kh9hM3Q = wp_get_current_user();
        $WZcRl8s = isset($kh9hM3Q->ID) ? $kh9hM3Q->ID : 0;
        wp_set_current_user($this->feed["params"]["user_id"]);
        $ZNE_PlD = true;
        $RSOEW3P = wp_insert_post($Bq9Vdo5, $ZNE_PlD);
        if ($RSOEW3P) {
            if ($this->saveContentRecord($RSOEW3P, $OV9DEXc)) {
                $this->_echo("Запись с заголовком: <b>{$xMWlZzB["title"]}</b> - успешно <a target=\"_blank\" href=\"" . get_home_url() . "/?p=" . $RSOEW3P . "\">сохранена</a>!<hr>");
                $this->saveAttachments($RSOEW3P);
                wp_set_current_user($WZcRl8s);
                return true;
            }
            wp_delete_post($RSOEW3P, true);
        }
        if (is_wp_error($RSOEW3P)) {
            echo $RSOEW3P->get_error_message();
        }
        wp_set_current_user($WZcRl8s);
        $this->_echo("<br><span style=\"color: red;\">Ошибка сохранения записи с заголовком: <b>" . $xMWlZzB["title"] . "</b></span>", 2);
        return false;
    }
    private function _getValidCatIdArray()
    {
        $J07Wgzd = array();
        if (isset($this->feed["params"]["catid"]) and is_array($this->feed["params"]["catid"])) {
            $J07Wgzd = array_filter($this->feed["params"]["catid"]);
        }
        if (empty($J07Wgzd) and $this->feed["params"]["postType"] == "post" and $this->feed["params"]["post_status"] != "auto-draft") {
            $J07Wgzd = array(get_option("default_category"));
        }
        return $J07Wgzd;
    }
    function saveAttachments($fH9cjUU)
    {
        if (!$this->uploadMediaOn) {
            return false;
        }
        static $qtbTmRe = false;
        if (!count($this->attachImages)) {
            return;
        }
        require_once ABSPATH . "wp-admin/includes/image.php";
        foreach ($this->attachImages as $kUNMTT3) {
            $Nb_Arxs = wp_check_filetype(basename($kUNMTT3), null);
            $rjvTbXK = array("post_mime_type" => $Nb_Arxs["type"], "post_title" => preg_replace("/\\.[^.]+\$/", '', basename($kUNMTT3)), "post_content" => '', "post_status" => "inherit", "post_parent" => $fH9cjUU);
            $yVPlVA6 = wp_insert_attachment($rjvTbXK, $kUNMTT3, $fH9cjUU);
            $oK97tsT = wp_generate_attachment_metadata($yVPlVA6, $kUNMTT3);
            wp_update_attachment_metadata($yVPlVA6, $oK97tsT);
            if (!$qtbTmRe and $this->feed["params"]["post_thumb_on"]) {
                set_post_thumbnail($fH9cjUU, $yVPlVA6);
            }
            $qtbTmRe = true;
        }
        $qtbTmRe = false;
        $this->attachImages = array();
        return true;
    }
    protected function _getFeed($HrAL3Ba)
    {
        $KUr6Q8o = "SELECT * FROM `" . $this->db->prefix . "wpgrabber`\n        WHERE id = " . (int) $HrAL3Ba . "\n        LIMIT 1";
        $row = $this->db->get_row($KUr6Q8o, ARRAY_A);
        if ($this->db->last_error != '') {
            WPGErrorHandler::add($this->db->last_error, __FILE__, __LINE__);
        }
        return $row;
    }
    protected function _beforeExecute($HrAL3Ba)
    {
        if (!$this->config->get("offFeedsModeOn")) {
            $this->db->update($this->db->prefix . "wpgrabber", array("last_update" => ''), array("id" => $HrAL3Ba));
        } else {
            if ($this->autoUpdateMode) {
                $this->db->update($this->db->prefix . "wpgrabber", array("published" => "0", "last_update" => ''), array("id" => $HrAL3Ba));
            }
        }
        parent::_beforeExecute($HrAL3Ba);
    }
    protected function _afterExecute($HrAL3Ba)
    {
        parent::_afterExecute($HrAL3Ba);
        if ($this->testOn) {
        } else {
            foreach ($this->updateFeedData as $jDHxI9c => $OG4b_Fl) {
                $KUr6Q8o[] = "`" . $jDHxI9c . "` = '" . esc_sql($OG4b_Fl) . "'";
            }
            $KUr6Q8o = "UPDATE `" . $this->db->prefix . "wpgrabber`\n          SET\n            " . implode(",", $KUr6Q8o) . "\n          WHERE id = " . (int) $HrAL3Ba;
            $this->db->query($KUr6Q8o);
            if ($this->db->last_error != '') {
                WPGErrorHandler::add($this->db->last_error, __FILE__, __LINE__);
            }
            $this->updateFeedData = array();
            $this->_echo("<br /><b>Импорт ленты: <a target=\"_blank\" href=\"" . $this->feed["url"] . "\">" . $this->feed["name"] . "</a> успешно завершен! - " . date("H:i:s Y-m-d") . "</b><br />");
        }
    }
    function insertMore($mbqPvCu)
    {
        $kb520Re = trim($this->feed["params"]["introSymbolEnd"]) == '' ? " " : $this->feed["params"]["introSymbolEnd"];
        $HDl0ulr = preg_replace("|<.*?>|", " \$0 ", $mbqPvCu);
        $HDl0ulr = str_replace(array("\n", "\r", "\t", "\0", "\v"), '', trim(strip_tags($HDl0ulr)));
        $HDl0ulr = str_replace("&nbsp;", " ", $HDl0ulr);
        $FO5rq3y = strripos(substr($HDl0ulr, 0, $this->feed["params"]["intro_size"]), $kb520Re);
        $HDl0ulr = substr($HDl0ulr, 0, $FO5rq3y);
        preg_match("|(\\S{1,})\\s{1,}(\\S{1,})\\s{1,}(\\S{1,})\\s{0,}\$|is", $HDl0ulr, $Xk3x7Fh);
        preg_match("|.*?" . $Xk3x7Fh[1] . ".*?" . $Xk3x7Fh[2] . ".*?" . $Xk3x7Fh[3] . "|is", $mbqPvCu, $Xk3x7Fh);
        $WnyoG5a = $Xk3x7Fh[0];
        $mbqPvCu = str_replace($WnyoG5a, "{$WnyoG5a}<!--more-->", $mbqPvCu);
        $mbqPvCu = preg_replace("|(<a .*?>.*?)<!--more-->(.*?</a>)|is", "\$1\$2<!--more-->", $mbqPvCu);
        $mbqPvCu = preg_replace("|<!--more-->(" . $kb520Re . ")|is", "\$1<!--more-->", $mbqPvCu);
        return $mbqPvCu;
    }
    function mkImageDir()
    {
        $Xk3x7Fh = wp_upload_dir();
        if (trim($this->config->get("imgPath")) != str_replace(get_bloginfo("wpurl"), '', $Xk3x7Fh["baseurl"]) . "/") {
            $this->uploadMediaOn = false;
        }
        if (!file_exists($this->rootPath . $this->config->get("imgPath"))) {
            mkdir($this->rootPath . $this->config->get("imgPath"), 0777);
        }
        if ($this->uploadMediaOn and get_option("uploads_use_yearmonth_folders")) {
            $this->imageDir = date("Y") . "/";
            $atMxz0o = $this->rootPath . $this->config->get("imgPath") . $this->imageDir;
            if (!file_exists($this->imageDir)) {
                mkdir($this->imageDir, 0777);
            }
            $this->imageDir = $this->imageDir . date("m") . "/";
            if (!file_exists($this->imageDir)) {
                mkdir($this->imageDir, 0777);
            }
        }
        return true;
    }
    function copyUrlFile($FwsQKL0, $WgIPOl1)
    {
        $sMGHkPy = parent::copyUrlFile($FwsQKL0, $WgIPOl1);
        if ($sMGHkPy) {
            $this->attachImages[] = $WgIPOl1;
        }
        return $sMGHkPy;
    }
}