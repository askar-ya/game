<?php

class GrabberCore
{
    var $config;
    var $feed;
    var $content;
    var $currentUrl;
    var $picToIntro;
    var $intro_pic_on;
    var $testOn;
    var $titles;
    var $baseHrefs;
    var $onLog;
    var $imageDir = '';
    var $db;
    var $introTexts;
    var $currentTitle;
    var $imagesContent = array();
    var $requestMethod;
    var $rssDescs;
    var $imagesContentNoSave;
    var $filterWordsSave;
    var $updateFeedData = array();
    var $rootPath;
    var $tmpDir;
    var $cookieFile;
    var $textNoTranslate = array();
    var $titleNoTranslate = array();
    protected $_is_transaction_model = false;
    protected $_start_import = false;
    protected $_current_link = null;
    protected $_links_list = array();
    var $autoUpdateMode = 0;
    function __construct()
    {
        $whaGA6y = array("edit.php", "settings.php", "list.php", "import.php");
        foreach ($whaGA6y as $Q2iNWnq) {
            $en_pQy6 = file_get_contents(WPGRABBER_PLUGIN_TPL_DIR . $Q2iNWnq);
            if (!(1 != 1)) {
            }
        }
        if ((int) $this->config->get("phpTimeLimit")) {
            set_time_limit($this->config->get("phpTimeLimit"));
        }
        $this->tmpDir = $this->rootPath . $this->config->get("testPath");
        $this->cookieFile = $this->tmpDir . "cookies.txt";
        if ($this->config->get("curlCookiesClean")) {
            $this->write_string($this->cookieFile, '', "w");
        }
    }
    public function write_string($kUNMTT3, $xMWlZzB, $vruThyc = "w")
    {
        $TAtReCD = fopen($kUNMTT3, $vruThyc);
        fwrite($TAtReCD, $xMWlZzB);
        fclose($TAtReCD);
    }
    public function setTransactionModel()
    {
        $this->_is_transaction_model = true;
    }
    protected function _isTransactionModel()
    {
        return $this->_is_transaction_model;
    }
    public function __sleep()
    {
        return array_keys(get_object_vars($this));
    }
    public function __wakeup()
    {
    }
    function setTest()
    {
        $this->testOn = 1;
    }
    function onLog()
    {
        $this->onLog = 1;
    }
    function _echo($gdS6RwO)
    {
    }
    function _echoMessage($VhG6U23)
    {
        $this->_echo("\n<br />" . $VhG6U23 . '');
    }
    function _echoWarning($VhG6U23)
    {
        $this->_echo("\n<br /><i>" . $VhG6U23 . "</i>");
    }
    function _echoError($VhG6U23)
    {
        $this->_echo("\n<br /><font color=\"red\"><b>" . $VhG6U23 . "</b></font>");
    }
    function utf($cdD2dIu, $xFUPheQ, $pJVqGYa = "UTF-8")
    {
        if ($xFUPheQ == "исходная") {
            return $cdD2dIu;
        }
        return mb_convert_encoding($cdD2dIu, $pJVqGYa, $xFUPheQ);
    }
    public function cp1251_to_uft8($iEPqlLA)
    {
        return $this->utf($iEPqlLA, "CP1251");
    }
    private function getContentUrlSockOpen($OV9DEXc)
    {
        $CYdCft9 = parse_url($OV9DEXc);
        $U1RnSIG = trim(str_replace($CYdCft9["scheme"] . "://" . $CYdCft9["host"], '', $OV9DEXc));
        $U1RnSIG = $U1RnSIG == '' ? "/" : $U1RnSIG;
        $KfJLV2Z = fsockopen($CYdCft9["host"], 80, $xWcTODY, $H4tLjvN, 30);
        if (!$KfJLV2Z) {
            return false;
        }
        $F5_GLYO = "GET " . $U1RnSIG . " HTTP/1.1\r\n";
        $F5_GLYO .= "Host: " . $CYdCft9["host"] . "\r\n";
        $F5_GLYO .= "User-Agent: " . $_SERVER["HTTP_USER_AGENT"] . "\r\n";
        $F5_GLYO .= "Connection: close\r\n\r\n";
        fwrite($KfJLV2Z, $F5_GLYO);
        $cdD2dIu = '';
        while (!feof($KfJLV2Z)) {
            $cdD2dIu .= fgets($KfJLV2Z, 4096);
        }
        $cdD2dIu = preg_replace("|.*?\r\n\r\n|is", '', $cdD2dIu, 1);
        return $cdD2dIu;
    }
    function getContent($OV9DEXc)
    {
        $this->currentUrl = $OV9DEXc;
        if (!$this->requestMethod) {
            $I0Fz7r0 = curl_init();
            $F5_GLYO[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
            $F5_GLYO[] = "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,cs;q=0.7";
            $F5_GLYO[] = "Connection: keep-alive";
            if ($this->config->get("curlGzipOn")) {
                $F5_GLYO[] = "Accept-Encoding: gzip";
            }
            if ($this->config->get("userAgent")) {
                $F5_GLYO[] = "User-Agent: " . $this->config->get("userAgent");
            }
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_URL, $this->_rawurlencode($OV9DEXc));
            curl_setopt($I0Fz7r0, CURLOPT_VERBOSE, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($I0Fz7r0, CURLOPT_AUTOREFERER, true);
            curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
            if ($this->config->get("curlHeaderOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_HEADER, true);
            }
            if ($this->config->get("requestTime")) {
                curl_setopt($I0Fz7r0, CURLOPT_TIMEOUT, $this->config->get("requestTime"));
            }
            if ($this->config->get("curlGzipOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_ENCODING, "gzip");
            }
            if ($this->config->get("curlRedirectOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_FOLLOWLOCATION, true);
            }
            if ($this->config->get("curlCookiesOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_COOKIEFILE, $this->cookieFile);
                curl_setopt($I0Fz7r0, CURLOPT_COOKIEJAR, $this->cookieFile);
            }
            if ($this->config->get("curlProxyOn")) {
                if ($this->config->get("curlProxyListOn")) {
                    if ($this->config->get("curlProxyHostPort_List")) {
                        $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                        $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                        shuffle($ITxZ1HB);
                        $AufmF2S = array_pop($ITxZ1HB);
                        $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                    }
                } else {
                    if ($this->config->get("curlProxyHostPort")) {
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                    }
                }
                if ($this->config->get("curlProxyType")) {
                    switch ($this->config->get("curlProxyType")) {
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
                if ($this->config->get("curlProxyUserPwd")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
                }
            }
            if ($this->config->get("userAgent")) {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
            } else {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36");
            }
            curl_setopt($I0Fz7r0, CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($I0Fz7r0, CURLINFO_HEADER_OUT, true);
            $cdD2dIu = curl_exec($I0Fz7r0);
            $this->currentUrl = $this->_rawurldecode(curl_getinfo($I0Fz7r0, CURLINFO_EFFECTIVE_URL));
            if ($this->config->get("getContentWriteLogsOn")) {
            }
            if ($this->config->get("curlinfoHeaderOutOn")) {
                $fEFG5fX = preg_replace("~[\\r\\n]{1,}~", "<br>", curl_getinfo($I0Fz7r0, CURLINFO_HEADER_OUT));
                $this->_echo("<br /><b>CURLINFO_HEADER_OUT</b>:<br><i>" . $fEFG5fX . "</i><hr>");
                file_put_contents($this->tmpDir . "curlinfo_header_out_" . md5($OV9DEXc) . ".txt", curl_getinfo($I0Fz7r0, CURLINFO_HEADER_OUT));
                $this->_echo("<br /><b>curl_error</b>: <br><i>" . curl_error($I0Fz7r0) . "</i><hr>");
                file_put_contents($this->tmpDir . "curl_error.txt", curl_error($I0Fz7r0));
                $this->curlGetInfo2File($this->tmpDir . "curlGetInfo2File" . md5($OV9DEXc) . ".txt", $I0Fz7r0);
            }
            curl_close($I0Fz7r0);
        } elseif ($this->requestMethod == 1) {
            $cdD2dIu = file_get_contents($this->_rawurlencode($OV9DEXc));
        } else {
            $cdD2dIu = $this->getContentUrlSockOpen($this->_rawurlencode($OV9DEXc));
        }
        if ($this->config->get("getContentWriteLogsOn")) {
            file_put_contents($this->tmpDir . md5($OV9DEXc) . ".html", $cdD2dIu);
        }
        if ($this->config->get("stopTime")) {
            sleep($this->config->get("stopTime"));
        }
        return $cdD2dIu;
    }
    function curlGetInfo2File($Ln3n9EO, $I0Fz7r0)
    {
        ob_start();
        print_r(curl_getinfo($I0Fz7r0));
        $m__zihB = ob_get_contents();
        ob_end_clean();
        $KfJLV2Z = fopen($Ln3n9EO, "w+");
        fwrite($KfJLV2Z, strip_tags($m__zihB));
        fclose($KfJLV2Z);
    }
    function PHPInfo2File($Ln3n9EO)
    {
        ob_start();
        phpinfo();
        $m__zihB = ob_get_contents();
        ob_end_clean();
        $KfJLV2Z = fopen($Ln3n9EO, "w+");
        fwrite($KfJLV2Z, strip_tags($m__zihB));
        fclose($KfJLV2Z);
    }
    function copyUrlFile($OV9DEXc, $uHyzJ4K)
    {
        if (is_file($uHyzJ4K)) {
            @unlink($uHyzJ4K);
        }
        if (substr_count($OV9DEXc, "https://") or $this->config->get("saveFileUrlMethod") == "1") {
            if ($this->config->get("curlinfoHeaderOutOn")) {
                $this->_echo("<br /><b>saveFileUrlMethod</b><i>1 (curl) </i> <br />");
                $this->_echo("<br><b>copyUrlFile::url</b> " . $OV9DEXc);
                $this->_echo("<br><b>copyUrlFile::file</b> " . $uHyzJ4K);
                $this->_echo("<br><b>copyUrlFile::parse_url(\$url, PHP_URL_PATH)</b> " . parse_url($OV9DEXc, PHP_URL_PATH));
                $this->_echo("<br><b>copyUrlFile::rawurlencode(parse_url(\$url, PHP_URL_PATH))</b> " . rawurlencode(parse_url($OV9DEXc, PHP_URL_PATH)));
            }
            if ($this->config->get("curlinfoHeaderOutOn")) {
                $this->_echo("<br><b>curl_init(\$url)</b> " . $OV9DEXc);
            }
            $I0Fz7r0 = curl_init($this->_rawurlencode($OV9DEXc));
            $F5_GLYO[] = "Accept: image/png,image/*;q=0.8,*/*;q=0.5";
            $F5_GLYO[] = "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,cs;q=0.7";
            $F5_GLYO[] = "Connection: keep-alive";
            $F5_GLYO[] = "Content-Type: image/png";
            if ($this->config->get("userAgent")) {
                $F5_GLYO[] = "User-Agent: " . $this->config->get("userAgent");
            }
            if ($this->config->get("curlGzipOn")) {
                $F5_GLYO[] = "Accept-Encoding: gzip";
            }
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            if ($this->config->get("curlGzipOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_ENCODING, "gzip");
            }
            if ($this->config->get("userAgent")) {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
            } else {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36");
            }
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($I0Fz7r0, CURLOPT_AUTOREFERER, true);
            curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
            if ($this->config->get("curlRedirectOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_FOLLOWLOCATION, true);
            }
            if ($this->config->get("getCopyUrlFileWriteLogsOn")) {
                file_put_contents($this->tmpDir . "curlinfoFile_header_out_" . md5($OV9DEXc) . ".txt", curl_getinfo($I0Fz7r0, CURLINFO_HEADER_OUT));
                file_put_contents($this->tmpDir . "curl_errorFile.txt", curl_error($I0Fz7r0));
                $this->curlGetInfo2File($this->tmpDir . "curlGetInfo2File" . md5($OV9DEXc) . ".txt", $I0Fz7r0);
            }
            if ($this->config->get("curlCookiesOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_COOKIEFILE, $this->cookieFile);
                curl_setopt($I0Fz7r0, CURLOPT_COOKIEJAR, $this->cookieFile);
            }
            if ($this->config->get("curlProxyOn")) {
                if ($this->config->get("curlProxyListOn")) {
                    if ($this->config->get("curlProxyHostPort_List")) {
                        $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                        $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                        shuffle($ITxZ1HB);
                        $AufmF2S = array_pop($ITxZ1HB);
                        $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                    }
                } else {
                    if ($this->config->get("curlProxyHostPort")) {
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                    }
                }
                if ($this->config->get("curlProxyType")) {
                    switch ($this->config->get("curlProxyType")) {
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
                if ($this->config->get("curlProxyUserPwd")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
                }
            }
            curl_setopt($I0Fz7r0, CURLINFO_HEADER_OUT, true);
            $Qmxc27z = curl_exec($I0Fz7r0);
            if ($this->config->get("getCopyUrlFileWriteLogsOn")) {
                $this->write_string($this->tmpDir . "jpg_" . md5($OV9DEXc) . ".jpg", $Qmxc27z, "wb");
            }
            if ($this->config->get("curlinfoHeaderOutOn")) {
                $fEFG5fX = preg_replace("~[\\r\\n]{1,}~", "<br>", curl_getinfo($I0Fz7r0, CURLINFO_HEADER_OUT));
                $this->_echo("<br /><b>CURLINFO_HEADER_OUT</b>:<br><i>" . $fEFG5fX . "</i><hr>");
            }
            curl_close($I0Fz7r0);
            $KfJLV2Z = fopen($uHyzJ4K, "x");
            fwrite($KfJLV2Z, $Qmxc27z);
            fclose($KfJLV2Z);
        } elseif ($this->config->get("saveFileUrlMethod") == "2") {
            if ($this->config->get("curlinfoHeaderOutOn")) {
                $this->_echo("<br /><b>saveFileUrlMethod</b>:<i>2</i><br />");
            }
            $Qmxc27z = file_get_contents($OV9DEXc);
            file_put_contents($uHyzJ4K, $Qmxc27z);
        } else {
            if ($this->config->get("curlinfoHeaderOutOn")) {
                $this->_echo("<br /><b>saveFileUrlMethod</b>:<i>copy</i><br />");
            }
            if (!copy($OV9DEXc, $uHyzJ4K)) {
                $Qmxc27z = file_get_contents($OV9DEXc);
                file_put_contents($uHyzJ4K, $Qmxc27z);
            }
        }
        return is_file($uHyzJ4K);
    }
    function getLinks($ESjIzDq, $KF1AqVH)
    {
        if (!$this->testOn) {
            $ESjIzDq = array_diff($ESjIzDq, $KF1AqVH);
        }
        if (!$this->feed["params"]["start_top"]) {
            $ESjIzDq = array_reverse($ESjIzDq);
        }
        if ($this->feed["params"]["start_link"]) {
            $ESjIzDq = array_slice($ESjIzDq, $this->feed["params"]["start_link"]);
        }
        if ($this->feed["params"]["max_items"]) {
            $ESjIzDq = array_slice($ESjIzDq, 0, $this->feed["params"]["max_items"]);
        }
        return $ESjIzDq;
    }
    function getUrl($OV9DEXc)
    {
        if (!substr_count($OV9DEXc, "http://") and !substr_count($OV9DEXc, "https://")) {
            $j2bdYKi = $this->currentUrl;
            if ($this->baseHrefs[$j2bdYKi]) {
                $OV9DEXc = rtrim($this->baseHrefs[$j2bdYKi], "/") . "/" . ltrim($OV9DEXc, "/");
            } else {
                $j2bdYKi = "http://" . parse_url($j2bdYKi, PHP_URL_HOST);
                $OV9DEXc = rtrim($j2bdYKi, "/") . "/" . ltrim($OV9DEXc, "/");
            }
        }
        $OV9DEXc = html_entity_decode($OV9DEXc);
        return $OV9DEXc;
    }
    private function _rawurlencode($OV9DEXc)
    {
        static $Y1Opg3f, $zNsgVYu;
        if (mb_detect_encoding($OV9DEXc) == "UTF-8") {
            $SP4dzrw = range(161, 255);
            foreach ($SP4dzrw as $ZmwDTwr) {
                $Y1Opg3f[] = mb_chr($ZmwDTwr, "utf8");
            }
            $zNsgVYu = array_map("rawurlencode", $Y1Opg3f);
        }
        if (!isset($Y1Opg3f, $zNsgVYu)) {
            $Y1Opg3f = range(chr(192), chr(255));
            $Y1Opg3f[] = chr(184);
            $Y1Opg3f[] = chr(168);
            $Y1Opg3f[] = " ";
            $Y1Opg3f = array_map(array($this, "cp1251_to_uft8"), $Y1Opg3f);
            $zNsgVYu = array_map("rawurlencode", $Y1Opg3f);
        }
        $OV9DEXc = str_replace($Y1Opg3f, $zNsgVYu, $OV9DEXc);
        return $OV9DEXc;
    }
    private function _rawurldecode($OV9DEXc)
    {
        static $Y1Opg3f, $zNsgVYu;
        if (mb_detect_encoding($OV9DEXc) == "UTF-8") {
            $SP4dzrw = range(161, 255);
            foreach ($SP4dzrw as $ZmwDTwr) {
                $Y1Opg3f[] = rawurlencode(mb_chr($ZmwDTwr, "utf8"));
            }
            $zNsgVYu = array_map("rawurldecode", $Y1Opg3f);
        }
        if (!isset($Y1Opg3f, $zNsgVYu)) {
            $Y1Opg3f = range(chr(192), chr(255));
            $Y1Opg3f[] = chr(184);
            $Y1Opg3f[] = chr(168);
            $Y1Opg3f[] = " ";
            $Y1Opg3f = array_map(array($this, "cp1251_to_uft8"), $Y1Opg3f);
            foreach ($Y1Opg3f as $ZmwDTwr) {
                $tAzO6_e[] = rawurlencode($ZmwDTwr);
            }
            $zNsgVYu = array_map("rawurldecode", $tAzO6_e);
        }
        $OV9DEXc = str_replace($zNsgVYu, $Y1Opg3f, $OV9DEXc);
        return $OV9DEXc;
    }
    function getImageUrl($OV9DEXc)
    {
        if (substr_count($OV9DEXc, "http://") or substr_count($OV9DEXc, "https://")) {
        } else {
            $j2bdYKi = $this->currentUrl;
            if ($this->baseHrefs[$j2bdYKi]) {
                $j2bdYKi = rtrim($this->baseHrefs[$j2bdYKi], "/");
            } else {
                $j2bdYKi = dirname($j2bdYKi);
            }
            if (!substr_count($OV9DEXc, "/")) {
                return $j2bdYKi . "/" . $OV9DEXc;
            }
            $j2bdYKi = "http://" . parse_url($j2bdYKi, PHP_URL_HOST);
            $OV9DEXc = $j2bdYKi . "/" . ltrim($OV9DEXc, "/");
        }
        $OV9DEXc = html_entity_decode($OV9DEXc);
        $OV9DEXc = str_replace("'", "%27", $OV9DEXc);
        $OV9DEXc = str_replace(" ", "%20", $OV9DEXc);
        if ($this->config->get("curlinfoHeaderOutOn")) {
            $this->_echo("\n<br>" . "getImageUrl - <a href=\"" . $OV9DEXc . "\" style=\"color:green; font-weight: bold\">" . $OV9DEXc . "</a>");
        }
        return $OV9DEXc;
    }
    function setBaseHref($OV9DEXc, $rIU3lOz)
    {
        if (preg_match_all("|<base[^>]*href[\\s]*=[\\s'\\\"]*(.*?)['\\\"\\s>]|is", $rIU3lOz, $X3JJ6Iw, 0, 1)) {
            $this->baseHrefs[$OV9DEXc] = $X3JJ6Iw[1][0];
        }
    }
    private function _import()
    {
        if ($this->_isTransactionModel() and $this->_current_link !== null) {
            $sMGHkPy = $this->_saveLink($this->_links_list[$this->_current_link]);
            if ($sMGHkPy === null) {
                $this->_saveEmptyRecord($this->_links_list[$this->_current_link]);
            }
            $this->_current_link++;
            if (isset($this->_links_list[$this->_current_link])) {
                return $this;
            } else {
                return true;
            }
        }
        if ($this->feed["type"] != "vk_api") {
            $Fj1uCS0 = $this->getContent(urldecode($this->feed["url"]));
            if (trim($Fj1uCS0) == '') {
                $this->_echo("Пустой контент RSS-ленты или индексной HTML-страницы): " . $this->feed["url"], 2);
                return true;
            }
        }
        $kJJ7_aW = $this->feed["type"] == "html" ? $this->feed["html_encoding"] : $this->feed["rss_encoding"];
        if ($this->feed["type"] == "html") {
            $Fj1uCS0 = $this->utf($Fj1uCS0, $kJJ7_aW);
            $Fj1uCS0 = $this->userReplace("index", $Fj1uCS0);
            $this->setBaseHref($this->feed["url"], $Fj1uCS0);
            $this->currentUrl = $this->feed["url"];
            if ($this->feed["params"]["autoIntroOn"] == 1) {
                preg_match_all($this->feed["params"]["introLinkTempl"], $Fj1uCS0, $X3JJ6Iw, PREG_SET_ORDER);
                if (!count($X3JJ6Iw)) {
                    $this->_echo("Ссылки не найдены!", 1);
                    return true;
                }
                if ($this->feed["params"]["orderLinkIntro"]) {
                    for ($QmsPJ5F = 0; $QmsPJ5F < count($X3JJ6Iw); $QmsPJ5F++) {
                        $this->introTexts[$this->getUrl($X3JJ6Iw[$QmsPJ5F][2])] = $X3JJ6Iw[$QmsPJ5F][1];
                    }
                    $z0GfN9E = 2;
                } else {
                    for ($QmsPJ5F = 0; $QmsPJ5F < count($X3JJ6Iw); $QmsPJ5F++) {
                        $this->introTexts[$this->getUrl($X3JJ6Iw[$QmsPJ5F][1])] = $X3JJ6Iw[$QmsPJ5F][2];
                    }
                    $z0GfN9E = 1;
                }
            } else {
                preg_match_all("~" . $this->feed["links"] . "~is", $Fj1uCS0, $X3JJ6Iw, PREG_SET_ORDER);
                $z0GfN9E = 0;
            }
            if (!count($X3JJ6Iw)) {
                $this->_echo("Найдено ссылок: 0", 2);
                return true;
            }
            foreach ($X3JJ6Iw as $iEPqlLA) {
                $bDvdZX2 = $this->getUrl($iEPqlLA[$z0GfN9E]);
                $ESjIzDq[$bDvdZX2] = $bDvdZX2;
            }
            $this->_echo("Найдено ссылок: <font color=\"green\"><b>" . count($ESjIzDq) . "</b></font><br />" . implode("<br />", $ESjIzDq) . "<br />");
            $this->feed["link_count"] = count($ESjIzDq);
            $ESjIzDq = $this->getLinks($ESjIzDq);
            $this->_echo("<br /><b>Из них ссылок для текущего импорта: </b><font color=\"green\"><b>" . count($ESjIzDq) . "</b></font><br />" . implode("<br />", $ESjIzDq) . "<br />");
        } elseif ($this->feed["type"] == "rss") {
            $Fj1uCS0 = $this->userReplace("index", $Fj1uCS0);
            $j0sfWJz = simplexml_load_string($Fj1uCS0);
            foreach ($j0sfWJz->channel->item as $eBZp8F_) {
                $Tgy8GEO = $this->utf((string) $eBZp8F_->title, $this->feed["rss_encoding"]);
                $a14KMK_ = $this->utf((string) $eBZp8F_->link, $this->feed["rss_encoding"]);
                $this->rssDescs[$a14KMK_] = $this->utf((string) $eBZp8F_->description, $this->feed["rss_encoding"]);
                $ESjIzDq[$a14KMK_] = $a14KMK_;
                $this->titles[$a14KMK_] = $Tgy8GEO;
            }
            $this->_echo("Найдено ссылок: <font color=\"green\"><b>" . count($ESjIzDq) . "</b></font><br />" . implode("<br />", $ESjIzDq) . "<br />");
            $this->feed["link_count"] = count($ESjIzDq);
            $ESjIzDq = $this->getLinks($ESjIzDq);
            $this->_echo("<br /><b>Из них ссылок для текущего импорта: </b><font color=\"green\"><b>" . count($ESjIzDq) . "</b></font><br />" . implode("<br />", $ESjIzDq) . "<br />");
        } elseif ($this->feed["type"] == "vk") {
            $Fj1uCS0 = $this->utf($Fj1uCS0, "windows-1251");
            $Fj1uCS0 = $this->userReplace("index", $Fj1uCS0);
            preg_match_all("~<div class=\"post_date\"><a  class=\"post_link\"  href=\"/(wall-\\d+_\\d+)\".*?<div class=\"wall_text\">(.*?)<div class=\"like_wrap _like_wall-\\d+_\\d+ \">~is", $Fj1uCS0, $X3JJ6Iw);
            if (!count($X3JJ6Iw)) {
                $this->_echo("Найдено постов: 0", 2);
                return true;
            }
            foreach ($X3JJ6Iw[1] as $nlGj3WC => $iEPqlLA) {
                $bDvdZX2 = $this->feed["url"] . "?w=" . $iEPqlLA;
                $ESjIzDq[$bDvdZX2] = $bDvdZX2;
                $XSAOC89[$bDvdZX2] = $X3JJ6Iw[2][$nlGj3WC];
            }
            $this->_echo("Найдено постов: <b>" . count($ESjIzDq) . "</b><br />" . implode("<br />", $ESjIzDq) . "<br />");
            $this->feed["link_count"] = count($ESjIzDq);
            $ESjIzDq = $this->getLinks($ESjIzDq);
            $this->_echo("Из них постов для текущего импорта: <b>" . count($ESjIzDq) . "</b><br />" . implode("<br />", $ESjIzDq) . "<br />");
            foreach ($ESjIzDq as $a14KMK_) {
                $this->content[$a14KMK_]["text"] = $XSAOC89[$a14KMK_];
                file_put_contents($this->tmpDir . "_buffVK_" . md5($a14KMK_) . ".html", $XSAOC89[$a14KMK_]);
                $this->content[$a14KMK_]["tagsScrape"] = '';
                $this->content[$a14KMK_]["post_date_scrape"] = current_time("mysql");
                $this->content[$a14KMK_]["text"] = preg_replace("~src=\"/images/~is", " src=\"https://vk.com/images/", $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace("~src=\"/emoji~is", " src=\"https://vk.com/emoji", $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace("~<div id=\"page_avatar\" class=\"page_avatar\">.*?</div>~is", '', $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace("~<button .*?</button>~is", '', $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace_callback("~<a  aria-label=\".*?\" onclick=\"return showPhoto\\('(\\-?\\d+_\\d+)', 'wall-\\d+_\\d+', (\\{.*?;:1\\}), event\\)\" style=\"width: \\d+px; height: \\d+px;background-image: url\\((.*?)\\);\" class=\"page_post_thumb_wrap image_cover.*?\" data-photo-id=\"-\\d+_\\d+\"></a>~is", array($this, "vkImages"), $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace("~<a  href=\"/page(.*?)\" onclick=\"return showWiki\\(.*?, false, event, \\{queue: 1\\}\\);\" style=\"width: \\d+px; height: \\d+px;background-image: url\\((.*?)\\);\" class=\"page_post_thumb_wrap image_cover .*?></a>~is", "<img src=\"\$2\" alt=\"\$1\"/>", $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace("~<a href=\"/video-.*? onclick=\"return showInlineVideo\\('(-?\\d+_\\d+)', '\\w+', \\{.*?\\}, event, this\\);\" style=\"width: \\d+px; height: \\d+px;background-image: url\\((.*?)\\);\" class=\"page_post_thumb_wrap image_cover .*?\">.*?</a>~is", "<img src=\"\$2\" alt=\"\$1\"/>", $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace("~<a class=\"wall_post_more\" onclick=\"hide.*?\">Expand text…</a><span style=\"display: none\">~is", '', $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["text"] = preg_replace("~<div class=\"post_video_views_count\">.*?</div>~is", '', $this->content[$a14KMK_]["text"]);
                $this->content[$a14KMK_]["title"] = $this->feed["title"];
                if (trim($this->feed["title"]) != '') {
                    if (preg_match("~" . $this->feed["title"] . "~is", $this->content[$a14KMK_]["text"], $Xk3x7Fh)) {
                        if (count($Xk3x7Fh) == 2) {
                            $this->content[$a14KMK_]["title"] = $Xk3x7Fh[1];
                        } elseif (count($Xk3x7Fh) == 1) {
                            $this->content[$a14KMK_]["title"] = $Xk3x7Fh[0];
                        } else {
                            $this->content[$a14KMK_]["title"] = $this->getTitleFromVKText($this->content[$a14KMK_]["text"]);
                        }
                    } else {
                        $this->content[$a14KMK_]["title"] = $this->getTitleFromVKText($this->content[$a14KMK_]["text"]);
                    }
                } else {
                    $this->content[$a14KMK_]["title"] = $this->getTitleFromVKText($this->content[$a14KMK_]["text"]);
                }
                $this->content[$a14KMK_]["title"] = strip_tags($this->content[$a14KMK_]["title"]);
                $this->beforeSaveLoop($a14KMK_);
                $sMGHkPy = $this->save($a14KMK_);
                if (!$sMGHkPy) {
                    $this->cleanImages();
                    $this->content[$a14KMK_] = null;
                    if ($sMGHkPy === null) {
                        $this->_saveEmptyRecord($a14KMK_);
                    }
                }
            }
            return true;
        } elseif ($this->feed["type"] == "vk_api") {
            $this->vk_owner_id = $this->feed["url"];
            $this->feed["url"] = "http://vk.com/wall" . $this->feed["url"];
            $rydeYca = ["owner_id" => $this->vk_owner_id, "domain" => '', "offset" => $this->feed["params"]["vk_offset"], "count" => $this->feed["params"]["vk_count"], "filter" => $this->feed["params"]["vk_filter"], "extended" => 1, "fields" => "screen_name,first_name,last_name,deactivated,about,contacts,photo_50,photo_200_orig", "access_token" => $this->getVKaccessToken(), "v" => "5.92"];
            $OV9DEXc = "https://api.vk.com/method/wall.get?" . http_build_query($rydeYca);
            $HXtj83T = json_decode($this->getContent($OV9DEXc), true);
            if ($this->config->get("getContentWriteLogsOn")) {
                file_put_contents($this->tmpDir . "wall-get" . md5($OV9DEXc) . ".html", var_export($HXtj83T, true));
            }
            if (is_array($HXtj83T["error"])) {
                $this->_echo("error_code: " . $HXtj83T["error"]["error_code"] . "<br>");
                $this->_echo("error_msg: " . $HXtj83T["error"]["error_msg"] . "<br>");
                $this->_echo("Найдено постов: 0", 2);
                return true;
            }
            $Stlw9dX = array_shift($HXtj83T["response"]);
            if ($Stlw9dX) {
                $this->_echo("Всего записей " . $this->vk_owner_id . ": <b>" . $Stlw9dX . "</b><br>\n");
            }
            foreach ($HXtj83T["response"]["items"] as $Mfm5kl3 => $eBZp8F_) {
                $XZAWkmd = $eBZp8F_["id"];
                $bDvdZX2 = $this->feed["url"] . "_" . $XZAWkmd;
                $ESjIzDq[$bDvdZX2] = $bDvdZX2;
                $ZMGf56t[$bDvdZX2] = $Mfm5kl3;
            }
            $this->_echo("Найдено постов: <b>" . count($ESjIzDq) . "</b><br />" . implode("<br />", $ESjIzDq) . "<br />");
            $this->feed["link_count"] = count($ESjIzDq);
            $ESjIzDq = $this->getLinks($ESjIzDq);
            $this->_echo("Из них постов для текущего импорта: <b>" . count($ESjIzDq) . "</b><br />" . implode("<br />", $ESjIzDq) . "<br />");
            foreach ($ESjIzDq as $a14KMK_) {
                $Mfm5kl3 = $ZMGf56t[$a14KMK_];
                $DsOIF9E = $this->makeVKhtml($HXtj83T["response"]["items"][$Mfm5kl3], $HXtj83T["response"]);
                if ($this->feed["params"]["vk_get_comments"]) {
                    $this->content[$a14KMK_]["text"] = $DsOIF9E["page_content"] . $DsOIF9E["w_comments_html"];
                } else {
                    $this->content[$a14KMK_]["text"] = $DsOIF9E["page_content"];
                }
                if ($this->feed["params"]["post_date_on"]) {
                    $this->content[$a14KMK_]["post_date_scrape"] = $this->content[$a14KMK_]["post_date_scrape"] = $DsOIF9E["page_date_publish"];
                } else {
                    if ($this->feed["params"]["post_date_type"] == "runtime") {
                        $this->content[$a14KMK_]["post_date_scrape"] = current_time("mysql");
                    }
                }
                $this->content[$a14KMK_]["title"] = $DsOIF9E["page_title"] . "..";
                if ($this->feed["params"]["vk_title_addon"] == 1) {
                    $this->content[$a14KMK_]["title"] .= " " . $DsOIF9E["page_item_id"];
                }
                if ($this->feed["params"]["vk_title_addon"] == 2) {
                    $this->content[$a14KMK_]["title"] .= " |" . $HXtj83T["response"]["groups"][0]["name"];
                }
                if ($this->feed["params"]["vk_title_addon"] == 3) {
                    $this->content[$a14KMK_]["title"] .= '' . $DsOIF9E["page_item_id"] . " |" . $HXtj83T["response"]["groups"][0]["name"];
                }
                if ($this->feed["params"]["vk_title_addon"] == 4) {
                    $this->content[$a14KMK_]["title"] .= "#" . $DsOIF9E["page_item_id"] . ", " . $HXtj83T["response"]["groups"][0]["name"];
                }
                if ($this->feed["params"]["vk_del_emoji"]) {
                    $this->content[$a14KMK_]["title"] = $this->remove3and4bytesCharFromUtf8Str($this->content[$a14KMK_]["title"]);
                    $this->content[$a14KMK_]["text"] = $this->remove3and4bytesCharFromUtf8Str($this->content[$a14KMK_]["text"]);
                }
                $this->content[$a14KMK_]["tagsScrape"] = $this->makeTags($this->content[$a14KMK_]["text"]);
                $this->beforeSaveLoop($a14KMK_);
                $sMGHkPy = $this->save($a14KMK_);
                if (!$sMGHkPy) {
                    $this->cleanImages();
                    $this->content[$a14KMK_] = null;
                    if ($sMGHkPy === null) {
                        $this->_saveEmptyRecord($a14KMK_);
                    }
                }
            }
            return true;
        }
        if (count($ESjIzDq) > 0) {
            $this->_echo("<br><b>Загрузка страниц:</b>");
            if ($this->_isTransactionModel()) {
                $this->_current_link = 0;
                $this->_links_list = array_values($ESjIzDq);
                return $this;
            } else {
                foreach ($ESjIzDq as $a14KMK_) {
                    $sMGHkPy = $this->_saveLink($a14KMK_);
                    if ($sMGHkPy === null) {
                        $this->_saveEmptyRecord($a14KMK_);
                    }
                }
            }
        }
        return true;
    }
    function getVKaccessToken()
    {
        if ($this->feed["params"]["vk_access_token"]) {
            return $this->feed["params"]["vk_access_token"];
        } else {
            return $this->config->get("vk_access_token");
        }
        return null;
    }
    function makeVKhtml($eBZp8F_, $eFNy3Uw)
    {
        $Tgy8GEO = '';
        $M63XdY4 = date("Y-m-d H:i:s \\G\\M\\TP", $eBZp8F_["date"]);
        if (mb_substr($eBZp8F_["from_id"], 0, 1) == "-") {
            $vruThyc = "group";
        } else {
            $vruThyc = "user";
        }
        if ($vruThyc == "user") {
            foreach ($eFNy3Uw["profiles"] as $LNS8LZ9) {
                if ($LNS8LZ9["id"] == $eBZp8F_["from_id"]) {
                    $mZzzuZ1 = $LNS8LZ9["first_name"] . " " . $LNS8LZ9["last_name"];
                    if ($this->feed["params"]["vk_profile_photo"]) {
                        $xfH8crJ = $LNS8LZ9["photo_200_orig"];
                    } else {
                        $xfH8crJ = $LNS8LZ9["photo_50"];
                    }
                }
            }
            $XeWzOx2 = "                    <div class=\"panel panel-default\">\n                    <div class=\"panel-heading user\">\n                        <a href=\"https://vk.com/id{$eBZp8F_["from_id"]}\" target=\"_blank\" title=\"{$M63XdY4}\"><img src=\"{$xfH8crJ}\" class=\"alignleft\"></a>\n                <a href=\"https://vk.com/id{$eBZp8F_["from_id"]}\" target=\"_blank\" title=\"{$M63XdY4}\">{$mZzzuZ1}</a><br>\n                   <!-- <small>{$M63XdY4}</small> -->\n                    </div>\n                    <div class=\"panel-body text-justify\">\n";
        } else {
            $XeWzOx2 = "                    <div class=\"panel panel-default\">\n                    <div class=\"panel-body text-justify\">\n";
        }
        if (!empty($eBZp8F_["text"])) {
            $XeWzOx2 .= "\t\t\t" . str_replace("\n", "<br>\n\t\t\t", $eBZp8F_["text"]) . "<br><br>\n";
            $Tgy8GEO .= $this->shortC(strip_tags($eBZp8F_["text"]), $this->feed["params"]["vk_title_len"]);
        }
        if (isset($eBZp8F_["attachments"])) {
            foreach ($eBZp8F_["attachments"] as $rjvTbXK) {
                switch ($rjvTbXK["type"]) {
                    case "audio":
                        $XeWzOx2 .= "    <span class=\"glyphicon glyphicon-music small text-info\"></span> <a href=\"{$rjvTbXK["audio"]["url"]}\" target=\"_blank\">{$rjvTbXK["audio"]["artist"]} - {$rjvTbXK["audio"]["title"]}</a><br>\n    <audio controls=\"controls\" preload=\"metadata\" src=\"{$rjvTbXK["audio"]["url"]}\"></audio><br><br>";
                        break;
                    case "link":
                        $XeWzOx2 .= "    <blockquote>\n        <p><strong><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["title"]}</a></strong></p>\n        <p class=\"small\"><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["url"]}</a></p>\n        <p>\n";
                        $XeWzOx2 .= "\t\t\t\t\t" . str_replace("\n", "<br>\n\t\t\t\t\t", $rjvTbXK["link"]["description"]) . "\n";
                        $XeWzOx2 .= "        </p>\n    </blockquote><br><br>";
                        if (isset($rjvTbXK["link"]["photo"])) {
                            $YCEEbGM = array_pop($rjvTbXK["link"]["photo"]["sizes"]);
                            $YaXQFRL = $YCEEbGM["url"];
                            $XeWzOx2 .= "\t\t\t" . "<a href=\"" . $YaXQFRL . "\" target=\"_blank\"><img src=\"" . $YaXQFRL . "\" class=\"img-responsive img-thumbnail\"></a>" . "<br><br>\n";
                        }
                        break;
                    case "photo":
                        $YCEEbGM = array_pop($rjvTbXK["photo"]["sizes"]);
                        $YaXQFRL = $YCEEbGM["url"];
                        $XeWzOx2 .= "\t\t\t" . "<a href=\"" . $YaXQFRL . "\" target=\"_blank\"><img src=\"" . $YaXQFRL . "\" class=\"img-responsive img-thumbnail\"></a>" . "<br><br>\n";
                        break;
                    case "doc":
                        $XeWzOx2 .= "\t\t\t" . "<span class=\"glyphicon glyphicon-file small text-info\"></span> Файл <a href=\"" . $rjvTbXK["doc"]["url"] . "\" target=\"_blank\">" . $rjvTbXK["doc"]["title"] . "</a><br><br>\n";
                        break;
                    case "video":
                        $OV9DEXc = "https://api.vk.com/method/video.get?videos=" . $rjvTbXK["video"]["owner_id"] . "_" . $rjvTbXK["video"]["id"] . "_" . $rjvTbXK["video"]["access_key"] . "&v=5.50&access_token=" . $this->getVKaccessToken();
                        $fVnERyv = $this->getContent($OV9DEXc);
                        usleep(250000);
                        $fVnERyv = json_decode($fVnERyv, true);
                        $XeWzOx2 .= "                                    <span class=\"glyphicon glyphicon-film small text-info\"></span> <a href=\"{$fVnERyv["response"]["items"][0]["player"]}\" target=\"_blank\">{$rjvTbXK["video"]["title"]}</a><br>\n                                    <div class=\"embed-responsive embed-responsive-16by9\">\n                                        <iframe class=\"embed-responsive-item\" src=\"{$fVnERyv["response"]["items"][0]["player"]}\"></iframe>\n                                    </div>\n                                    <div class=\"embed-description\">{$rjvTbXK["video"]["description"]}\n                                    </div>\n                                    <div class=\"embed-thumbnail\"><img src=\"{$rjvTbXK["video"]["photo_320"]}\" class=\"img-responsive img-thumbnail\"></div>\n                                    <br><br>";
                        break;
                    default:
                        break;
                }
            }
        }
        if (isset($eBZp8F_["copy_history"])) {
            $kdelba2 = $eBZp8F_["copy_history"][0];
            $enQ0eB9 = date("Y-m-d H:i:s \\G\\M\\TP", $eBZp8F_["date"]);
            if ($kdelba2["from_id"] > 0) {
                foreach ($eFNy3Uw["profiles"] as $LNS8LZ9) {
                    if ($LNS8LZ9["id"] == $kdelba2["from_id"]) {
                        $WN7wa_H = $LNS8LZ9["first_name"] . " " . $LNS8LZ9["last_name"];
                        if ($this->feed["params"]["vk_profile_photo"]) {
                            $La6X_dP = $LNS8LZ9["photo_200_orig"];
                        } else {
                            $La6X_dP = $LNS8LZ9["photo_50"];
                        }
                        $oj7QYQ3 = "id" . $kdelba2["from_id"];
                    }
                }
            } else {
                foreach ($eFNy3Uw["groups"] as $Fgbhksd) {
                    if ($Fgbhksd["id"] == abs($kdelba2["from_id"])) {
                        $WN7wa_H = $Fgbhksd["name"];
                        if ($this->feed["params"]["vk_profile_photo"]) {
                            $La6X_dP = $Fgbhksd["photo_200_orig"];
                        } else {
                            $La6X_dP = $Fgbhksd["photo_50"];
                        }
                        $oj7QYQ3 = "club" . abs($kdelba2["from_id"]);
                    }
                }
            }
            $XeWzOx2 .= "    <div class=\"panel panel-default\">\n        <div class=\"panel-heading\">\n            <a href=\"https://vk.com/{$oj7QYQ3}\" target=\"_blank\"><img src=\"{$La6X_dP}\" class=\"alignleft\" alt=\"{$enQ0eB9}\"></a><a href=\"https://vk.com/{$oj7QYQ3}\" target=\"_blank\" title=\"{$enQ0eB9}\">{$WN7wa_H}</a> <br>\n            <!-- <small>{$enQ0eB9}</small> -->\n        </div>\n        <div class=\"panel-body text-justify\">\n";
            if (!empty($kdelba2["text"])) {
                $XeWzOx2 .= "\t\t\t\t\t" . str_replace("\n", "<br>\n\t\t\t\t\t", $kdelba2["text"]) . "<br><br>\n";
                $Tgy8GEO .= $this->shortC(strip_tags($kdelba2["text"]), $this->feed["params"]["vk_title_len"]);
            }
            if (isset($kdelba2["attachments"])) {
                foreach ($kdelba2["attachments"] as $rjvTbXK) {
                    switch ($rjvTbXK["type"]) {
                        case "audio":
                            $XeWzOx2 .= "            <span class=\"glyphicon glyphicon-music small text-info\"></span> <a href=\"{$rjvTbXK["audio"]["url"]}\" target=\"_blank\">{$rjvTbXK["audio"]["artist"]} - {$rjvTbXK["audio"]["title"]}</a><br>\n            <audio controls=\"controls\" preload=\"metadata\" src=\"{$rjvTbXK["audio"]["url"]}\"></audio><br><br>";
                            break;
                        case "link":
                            $XeWzOx2 .= "            <blockquote>\n                <p><strong><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["title"]}</a></strong></p>\n                <p class=\"small\"><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["url"]}</a></p>\n                <p>\n";
                            $XeWzOx2 .= "\t\t\t\t\t\t\t" . str_replace("\n", "<br>\n\t\t\t\t\t\t\t", $rjvTbXK["link"]["description"]) . "\n";
                            $XeWzOx2 .= "                </p>\n            </blockquote><br><br>";
                            break;
                        case "photo":
                            $YCEEbGM = array_pop($rjvTbXK["photo"]["sizes"]);
                            $YaXQFRL = $YCEEbGM["url"];
                            $XeWzOx2 .= "\t\t\t\t\t" . "<a href=\"" . $YaXQFRL . "\" target=\"_blank\"><img src=\"" . $YaXQFRL . "\" class=\"img-responsive img-thumbnail\"></a>" . "<br><br>\n";
                            break;
                        case "doc":
                            $XeWzOx2 .= "\t\t\t\t\t" . "<span class=\"glyphicon glyphicon-file small text-info\"></span> Файл <a href=\"" . $rjvTbXK["doc"]["url"] . "\" target=\"_blank\">" . $rjvTbXK["doc"]["title"] . "</a><br><br>\n";
                            break;
                        case "video":
                            $OV9DEXc = "https://api.vk.com/method/video.get?videos=" . $rjvTbXK["video"]["owner_id"] . "_" . $rjvTbXK["video"]["id"] . "_" . $rjvTbXK["video"]["access_key"] . "&v=5.50&access_token=" . $this->getVKaccessToken();
                            $fVnERyv = $this->getContent($OV9DEXc);
                            usleep(250000);
                            $fVnERyv = json_decode($fVnERyv, true);
                            $XeWzOx2 .= "                                    <span class=\"glyphicon glyphicon-film small text-info\"></span> <a href=\"{$fVnERyv["response"]["items"][0]["player"]}\" target=\"_blank\">{$rjvTbXK["video"]["title"]}</a><br>\n                                    <div class=\"embed-responsive embed-responsive-16by9\">\n                                        <iframe class=\"embed-responsive-item\" src=\"{$fVnERyv["response"]["items"][0]["player"]}\"></iframe>\n                                    </div>\n                                    <div class=\"embed-thumbnail\"><img src=\"{$rjvTbXK["video"]["photo_320"]}\" class=\"img-responsive img-thumbnail\"></div>\n                                    <br><br>";
                            break;
                        default:
                            break;
                    }
                }
            }
            if (substr(rtrim($XeWzOx2), -8) == "<br><br>") {
                $XeWzOx2 = substr(rtrim($XeWzOx2), 0, -8) . "\n";
            }
            $XeWzOx2 .= "        </div>\n    </div>\n";
        }
        if (substr(rtrim($XeWzOx2), -8) == "<br><br>") {
            $XeWzOx2 = substr(rtrim($XeWzOx2), 0, -8) . "\n";
        }
        if ($vruThyc == "group" and $Tgy8GEO == '') {
            $Tgy8GEO = trim($this->shortC(strip_tags($XeWzOx2), $this->feed["params"]["vk_title_len"]));
        }
        if ($vruThyc == "user") {
            $XeWzOx2 .= "</div>\n</div>";
        } else {
            $XeWzOx2 .= "</div>\n\n</div>";
        }
        $yeusndP = 0;
        $Pc13jiP = 0;
        $JH5Vmwa = 0;
        $pncnn01 = 100;
        $VNvMgPD = "asc";
        $qPRiuJl = 0;
        $hsZ0GOE = 0;
        $cxMHeNP = '';
        $yPtBSjZ = 0;
        $NykvOFM = 10;
        $rydeYca = ["owner_id" => $eBZp8F_["from_id"], "post_id" => $eBZp8F_["id"], "need_likes" => $yeusndP, "start_comment_id" => $Pc13jiP, "offset" => $JH5Vmwa, "count" => $pncnn01, "sort" => $VNvMgPD, "preview_length" => $qPRiuJl, "filter" => $this->feed["params"]["vk_filter"], "extended" => 0, "fields" => $cxMHeNP, "comment_id" => $yPtBSjZ, "thread_items_count" => $NykvOFM, "access_token" => $this->getVKaccessToken(), "v" => "5.92"];
        $OV9DEXc = "https://api.vk.com/method/wall.getComments?" . http_build_query($rydeYca);
        if ($this->feed["params"]["vk_get_comments"]) {
            $V6VCkYM = json_decode($this->getContent($OV9DEXc), true);
            $dOaKx1O = $this->ImportComments($V6VCkYM);
        }
        if ($vruThyc == "group" and $Tgy8GEO == '') {
            $Tgy8GEO = $eFNy3Uw["groups"][0]["name"];
        }
        if ($vruThyc == "group") {
            $Fxl_ESy = $eFNy3Uw["groups"][0]["name"];
            $zF_X3eU = $eFNy3Uw["groups"][0]["screen_name"];
        }
        $DsOIF9E = array("page_title" => $Tgy8GEO, "page_item_id" => $eBZp8F_["id"], "page_group_title" => $Fxl_ESy, "page_group_screen_name" => $zF_X3eU, "page_content" => $XeWzOx2, "w_comments_html" => $dOaKx1O, "w_comments" => $V6VCkYM, "page_slug" => $this->mso_slug("w" . $eBZp8F_["from_id"] . "-" . $eBZp8F_["id"]), "page_date_publish" => date("Y-m-d H:i:s", $eBZp8F_["date"]));
        return $DsOIF9E;
    }
    function shortC($N32mybw, $HXtj83T = 120)
    {
        $PbRfE65 = substr($N32mybw, 0, $HXtj83T);
        $PbRfE65 = explode(" ", $PbRfE65);
        array_pop($PbRfE65);
        $PbRfE65 = implode(" ", $PbRfE65);
        return $PbRfE65;
    }
    function remove3and4bytesCharFromUtf8Str($stLAjYB, $Ummns9e = '')
    {
        return preg_replace("/([\\xF0-\\xF7]...)|([\\xE0-\\xEF]..)/s", $Ummns9e, $stLAjYB);
    }
    function ImportComments($V6VCkYM)
    {
        $tqoIz7u = "<div class=\"replies\">";
        foreach ($V6VCkYM["response"]["items"] as $q0vQgMn => $hXNv_zp) {
            $tqoIz7u .= "<div id=\"post" . $hXNv_zp["owner_id"] . "_" . $hXNv_zp["id"] . "\" class=\"reply\">";
            $Hhg199e = date("F j, Y, H:i", $hXNv_zp["date"]);
            $tqoIz7u .= "<div class=\"reply_content\">";
            $tqoIz7u .= "        <div class=\"reply_author\">\n            vk{$hXNv_zp["from_id"]}\n        </div>";
            $tqoIz7u .= "        <div class=\"reply_date\">{$Hhg199e}</div>";
            if (!empty($hXNv_zp["text"])) {
                $tqoIz7u .= "\t\t\t<div class=\"reply_text\">" . str_replace("\n", "<br>\n\t\t\t", $hXNv_zp["text"]) . "</div><br><br>\n";
            }
            if (isset($hXNv_zp["attachments"])) {
                foreach ($hXNv_zp["attachments"] as $rjvTbXK) {
                    switch ($rjvTbXK["type"]) {
                        case "audio":
                            break;
                        case "link":
                            $tqoIz7u .= "        <blockquote>\n            <p><strong><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["title"]}</a></strong></p>\n            <p class=\"small\"><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["url"]}</a></p>\n            <p>\n";
                            $tqoIz7u .= "\t\t\t\t\t" . str_replace("\n", "<br>\n\t\t\t\t\t", $rjvTbXK["link"]["description"]) . "\n";
                            $tqoIz7u .= "            </p>\n        </blockquote><br><br>";
                            if (isset($rjvTbXK["link"]["photo"])) {
                                $YCEEbGM = array_pop($rjvTbXK["link"]["photo"]["sizes"]);
                                $YaXQFRL = $YCEEbGM["url"];
                                $tqoIz7u .= "\t\t\t" . "<a href=\"" . $YaXQFRL . "\" target=\"_blank\"><img src=\"" . $YaXQFRL . "\" class=\"img-responsive img-thumbnail\"></a>" . "<br><br>\n";
                            }
                            break;
                        case "photo":
                            $YCEEbGM = array_pop($rjvTbXK["photo"]["sizes"]);
                            $YaXQFRL = $YCEEbGM["url"];
                            $tqoIz7u .= "\t\t\t" . "<a href=\"" . $YaXQFRL . "\" target=\"_blank\"><img src=\"" . $YaXQFRL . "\" class=\"img-responsive img-thumbnail\"></a>" . "<br><br>\n";
                            break;
                        case "doc":
                            $tqoIz7u .= "\t\t\t" . "<span class=\"glyphicon glyphicon-file small text-info\"></span> Файл <a href=\"" . $rjvTbXK["doc"]["url"] . "\" target=\"_blank\">" . $rjvTbXK["doc"]["title"] . "</a><br><br>\n";
                            break;
                        case "video":
                            $OV9DEXc = "https://api.vk.com/method/video.get?videos=" . $rjvTbXK["video"]["owner_id"] . "_" . $rjvTbXK["video"]["id"] . "_" . $rjvTbXK["video"]["access_key"] . "&v=5.50&access_token=" . $this->getVKaccessToken();
                            $fVnERyv = $this->getContent($OV9DEXc);
                            usleep(250000);
                            $fVnERyv = json_decode($fVnERyv, true);
                            $tqoIz7u .= "                                        <span class=\"glyphicon glyphicon-film small text-info\"></span> <a href=\"{$fVnERyv["response"]["items"][0]["player"]}\" target=\"_blank\">{$rjvTbXK["video"]["title"]}</a><br>\n                                        <div class=\"embed-responsive embed-responsive-16by9\">\n                                            <iframe class=\"embed-responsive-item\" src=\"{$fVnERyv["response"]["items"][0]["player"]}\"></iframe>\n                                        </div>\n                                        <div class=\"embed-description\">{$rjvTbXK["video"]["description"]}\n                                        </div>\n                                        <div class=\"embed-thumbnail\"><img src=\"{$rjvTbXK["video"]["photo_320"]}\" class=\"img-responsive img-thumbnail\"></div>\n                                        <br><br>";
                            break;
                        default:
                            break;
                    }
                }
                $tqoIz7u .= "        </div>\n        </div>";
            }
            $tqoIz7u .= "        </div>";
            if ($hXNv_zp["thread"]["count"] > 0) {
                $tqoIz7u .= $this->ImportCommentThread($hXNv_zp["thread"]);
            }
        }
        $tqoIz7u .= "</div>";
        return $tqoIz7u;
    }
    function ImportCommentThread($voeF2vG)
    {
        $tqoIz7u = "<div class=\"replies_wrap_deep\"><div class=\"replies_list_deep\">";
        foreach ($voeF2vG["items"] as $q0vQgMn => $hXNv_zp) {
            $tqoIz7u .= "<div id=\"post" . $hXNv_zp["owner_id"] . "_" . $hXNv_zp["id"] . "\" class=\"reply reply_replieable clear\">";
            $Hhg199e = date("F j, Y, H:i", $hXNv_zp["date"]);
            $tqoIz7u .= "<div class=\"reply_content clear_fix\">";
            $tqoIz7u .= "        <div class=\"reply_author\">\n            vk{$hXNv_zp["from_id"]}\n        </div>";
            $tqoIz7u .= "        <div class=\"reply_date\">{$Hhg199e}</div>";
            if (!empty($hXNv_zp["text"])) {
                $tqoIz7u .= "\t\t\t<div class=\"reply_text\">" . str_replace("\n", "<br>\n\t\t\t", $hXNv_zp["text"]) . "</div><br><br>\n";
            }
            if (isset($hXNv_zp["attachments"])) {
                foreach ($hXNv_zp["attachments"] as $rjvTbXK) {
                    switch ($rjvTbXK["type"]) {
                        case "audio":
                            break;
                        case "link":
                            $tqoIz7u .= "        <blockquote>\n            <p><strong><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["title"]}</a></strong></p>\n            <p class=\"small\"><a href=\"{$rjvTbXK["link"]["url"]}\">{$rjvTbXK["link"]["url"]}</a></p>\n            <p>\n";
                            $tqoIz7u .= "\t\t\t\t\t" . str_replace("\n", "<br>\n\t\t\t\t\t", $rjvTbXK["link"]["description"]) . "\n";
                            $tqoIz7u .= "            </p>\n        </blockquote><br><br>";
                            if (isset($rjvTbXK["link"]["photo"])) {
                                $YCEEbGM = array_pop($rjvTbXK["link"]["photo"]["sizes"]);
                                $YaXQFRL = $YCEEbGM["url"];
                                $tqoIz7u .= "\t\t\t" . "<a href=\"" . $YaXQFRL . "\" target=\"_blank\"><img src=\"" . $YaXQFRL . "\" class=\"img-responsive img-thumbnail\"></a>" . "<br><br>\n";
                            }
                            break;
                        case "photo":
                            $YCEEbGM = array_pop($rjvTbXK["photo"]["sizes"]);
                            $YaXQFRL = $YCEEbGM["url"];
                            $tqoIz7u .= "\t\t\t" . "<a href=\"" . $YaXQFRL . "\" target=\"_blank\"><img src=\"" . $YaXQFRL . "\" class=\"img-responsive img-thumbnail\"></a>" . "<br><br>\n";
                            break;
                        case "doc":
                            $tqoIz7u .= "\t\t\t" . "<span class=\"glyphicon glyphicon-file small text-info\"></span> Файл <a href=\"" . $rjvTbXK["doc"]["url"] . "\" target=\"_blank\">" . $rjvTbXK["doc"]["title"] . "</a><br><br>\n";
                            break;
                        case "video":
                            $OV9DEXc = "https://api.vk.com/method/video.get?videos=" . $rjvTbXK["video"]["owner_id"] . "_" . $rjvTbXK["video"]["id"] . "_" . $rjvTbXK["video"]["access_key"] . "&v=5.50&access_token=" . $this->getVKaccessToken();
                            $fVnERyv = $this->getContent($OV9DEXc);
                            usleep(250000);
                            $fVnERyv = json_decode($fVnERyv, true);
                            $tqoIz7u .= "                                        <span class=\"glyphicon glyphicon-film small text-info\"></span> <a href=\"{$fVnERyv["response"]["items"][0]["player"]}\" target=\"_blank\">{$rjvTbXK["video"]["title"]}</a><br>\n                                        <div class=\"embed-responsive embed-responsive-16by9\">\n                                            <iframe class=\"embed-responsive-item\" src=\"{$fVnERyv["response"]["items"][0]["player"]}\"></iframe>\n                                        </div>\n                                        <div class=\"embed-description\">{$rjvTbXK["video"]["description"]}\n                                        </div>\n                                        <div class=\"embed-thumbnail\"><img src=\"{$rjvTbXK["video"]["photo_320"]}\" class=\"img-responsive img-thumbnail\"></div>\n                                        <br><br>";
                            break;
                        default:
                            break;
                    }
                }
                $tqoIz7u .= "        </div>\n        </div>";
            }
            $tqoIz7u .= "        </div>";
        }
        $tqoIz7u .= "</div>\n</div>";
        return $tqoIz7u;
    }
    function vkImages($oyLhIzx)
    {
        $lg3kgYu = htmlspecialchars_decode($oyLhIzx[2]);
        $B3yd1jj = json_decode($lg3kgYu, true);
        if ($B3yd1jj["temp"]["z"]) {
            $cdD2dIu = "<img src=\"" . $B3yd1jj["temp"]["z"] . "\" alt=\"" . $oyLhIzx[1] . "\"/>";
        } elseif ($B3yd1jj["temp"]["y"]) {
            $cdD2dIu = "<img src=\"" . $B3yd1jj["temp"]["y"] . "\" alt=\"" . $oyLhIzx[1] . "\"/>";
        } else {
            $cdD2dIu = "<img src=\"" . $B3yd1jj["temp"]["x"] . "\" alt=\"" . $oyLhIzx[1] . "\"/>";
        }
        return $cdD2dIu;
    }
    protected function _saveLink($a14KMK_)
    {
        if ($this->feed["type"] == "rss" && $this->feed["params"]["rss_textmod"]) {
            $this->_echo("<br />RSS description tag");
            $j2bdYKi = $this->rssDescs[$a14KMK_];
        } else {
            $this->_echo("<br />link: <a target=\"_blank\" href=\"" . $a14KMK_ . "\">" . $a14KMK_ . "</a>");
            $j2bdYKi = $this->getContent($a14KMK_);
            $j2bdYKi = $this->userReplace("page", $j2bdYKi);
            $this->content[$a14KMK_]["location"] = $this->currentUrl;
            $j2bdYKi = $this->utf($j2bdYKi, $this->feed["html_encoding"]);
        }
        if (trim($j2bdYKi) == '') {
            $this->_echo("<font color=\"red\"> пустая страница!</font>");
            $this->_echo(" <font color=\"red\">(" . mb_strlen($j2bdYKi, "utf-8") . " Байт)</font>");
            return null;
        } else {
            $this->_echo(" <font color=\"green\">(" . mb_strlen($j2bdYKi, "utf-8") . " Байт)</font>");
        }
        $this->setBaseHref($this->currentUrl, $j2bdYKi);
        if ($this->feed["type"] == "rss" and trim($this->titles[$a14KMK_]) != '') {
            $this->content[$a14KMK_]["title"] = $this->titles[$a14KMK_];
        } else {
            preg_match("~" . $this->feed["title"] . "~is", $j2bdYKi, $UL9fLH3);
            if (count($UL9fLH3) == 0) {
                $this->_echo("<font color=\"red\"> Заголовок не найден! </font>");
                return null;
            }
            $this->content[$a14KMK_]["title"] = $UL9fLH3[1];
        }
        if ($this->feed["type"] == "rss" && $this->feed["params"]["rss_textmod"]) {
            $IgpU9ur[1] = $this->rssDescs[$a14KMK_];
        } else {
            preg_match("~" . addcslashes($this->feed["text_start"], "&|") . "(.*?)" . addcslashes($this->feed["text_end"], "&|") . "~is", $j2bdYKi, $IgpU9ur);
            if (count($IgpU9ur) == 0) {
                $this->_echo("<font color=\"red\"> текст не найден!</font>");
                return null;
            }
        }
        $this->content[$a14KMK_]["text"] = $IgpU9ur[1];
        $this->content[$a14KMK_]["tagsScrape"] = $this->makeTags($j2bdYKi);
        if ($this->feed["params"]["post_date_on"]) {
            preg_match("~" . addcslashes($this->feed["params"]["post_date_scrape"], "&|") . "~is", $j2bdYKi, $sm0nslx);
            if (count($sm0nslx) == 0) {
                $this->_echo("<font color=\"red\"> post_date не найден! </font>");
                return null;
            }
            $G8S1520 = $sm0nslx[1];
            $t8FVlGV = $G8S1520;
            $G8S1520 = date_parse($G8S1520);
            if (!is_integer($G8S1520["year"]) || !is_integer($G8S1520["month"]) || !is_integer($G8S1520["day"])) {
                $this->_echo("<br>date can not be parsed correctly. trying translations");
                $this->_echo("<font color=\"red\"> post_date не найден! </font>");
                return null;
                $G8S1520 = $t8FVlGV;
                $G8S1520 = $this->translate_months($G8S1520);
                $this->_echo("<br>date value: " . $G8S1520);
                $G8S1520 = date_parse($G8S1520);
                if (!is_integer($G8S1520["year"]) || !is_integer($G8S1520["month"]) || !is_integer($G8S1520["day"])) {
                    $this->_echo("<br>translation is not accepted valid");
                    $G8S1520 = '';
                    $this->_echo("<font color=\"red\"> post_date не найден! </font>");
                    return null;
                } else {
                    $this->_echo("<br>translation is accepted valid");
                    $G8S1520 = date("Y-m-d H:i:s", mktime($G8S1520["hour"], $G8S1520["minute"], $G8S1520["second"], $G8S1520["month"], $G8S1520["day"], $G8S1520["year"]));
                }
            } else {
                $this->_echo("<br>date parsed correctly");
                $G8S1520 = date("Y-m-d H:i:s", mktime($G8S1520["hour"], $G8S1520["minute"], $G8S1520["second"], $G8S1520["month"], $G8S1520["day"], $G8S1520["year"]));
            }
        } else {
            if ($this->feed["params"]["post_date_type"] == "runtime") {
                $G8S1520 = current_time("mysql");
            } else {
                if ($this->feed["params"]["post_date_type"] == "custom") {
                    $G8S1520 = $aV41PoB["scrape_date_custom"][0];
                } else {
                    if ($this->feed["params"]["post_date_type"] == "feed") {
                        $G8S1520 = $uyls0d_["post_date"];
                    } else {
                        $G8S1520 = '';
                    }
                }
            }
        }
        $this->content[$a14KMK_]["post_date_scrape"] = $G8S1520;
        $this->beforeSaveLoop($a14KMK_);
        $sMGHkPy = $this->save($a14KMK_);
        if (!$sMGHkPy) {
            $this->cleanImages();
            $this->content[$a14KMK_] = null;
            return $sMGHkPy;
        }
        return true;
    }
    function makeTags($j2bdYKi)
    {
        if ($this->feed["params"]["post_tags_on"] and !$this->feed["params"]["tags_mode"]) {
            preg_match_all("~" . addcslashes($this->feed["params"]["tagsScrape"], "&|") . "~is", $j2bdYKi, $Lkw0xib);
            if (count($Lkw0xib) == 0) {
                $this->_echo("<font color=\"red\"> tags не найден! </font>");
            }
            $WiVarwU = $Lkw0xib[1];
            if (!is_array($WiVarwU) || count($WiVarwU) == 0) {
                $odaeVS4 = '';
                if (isset($this->feed["params"]["tagsScrapeSeparator"])) {
                    $odaeVS4 = $this->feed["params"]["tagsScrapeSeparator"];
                    if ($odaeVS4 != '' && !empty($WiVarwU)) {
                        $WiVarwU = str_replace(" ", " ", $WiVarwU);
                        $WiVarwU = explode($odaeVS4, $WiVarwU);
                        $WiVarwU = array_map("trim", $WiVarwU);
                    }
                }
            }
            $this->_echo("<br> tags count: " . count($WiVarwU));
            $WiVarwU = array_slice($WiVarwU, 0, $this->feed["params"]["tagsScrapeCount"]);
        } elseif ($this->feed["params"]["tags_mode"]) {
            $this->_echo("<font color=\"blue\"> Берём теги из файла</font>");
            if ($this->feed["params"]["tags_file"]) {
                $FN2TyWe = file($this->feed["params"]["tags_file"]);
            } else {
                $FN2TyWe = file(wp_upload_dir()["basedir"] . "/post_tags.txt");
            }
            shuffle($FN2TyWe);
            shuffle($FN2TyWe);
            shuffle($FN2TyWe);
            $WiVarwU = explode(",", trim($FN2TyWe[0]));
            $this->_echo("<br> tags count: " . count($WiVarwU));
            $WiVarwU = array_slice($WiVarwU, 0, $this->feed["params"]["tagsScrapeCount"]);
        } else {
            $WiVarwU = '';
        }
        return $WiVarwU;
    }
    public function translate_months($stLAjYB)
    {
        $CaaXjVV = array("en" => array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"), "de" => array("Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"), "fr" => array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"), "tr" => array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"), "nl" => array("Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"), "id" => array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"), "pt-br" => array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"));
        $Y0eePbI = $CaaXjVV;
        foreach ($Y0eePbI as $bRrysUk => $QQR4zbN) {
            $Y0eePbI[$bRrysUk] = array_map(array($this, "month_abbr"), $QQR4zbN);
        }
        foreach ($CaaXjVV as $bRrysUk => $QQR4zbN) {
            $stLAjYB = str_ireplace($QQR4zbN, $CaaXjVV["en"], $stLAjYB);
        }
        foreach ($Y0eePbI as $bRrysUk => $QQR4zbN) {
            $stLAjYB = str_ireplace($QQR4zbN, $Y0eePbI["en"], $stLAjYB);
        }
        return $stLAjYB;
    }
    protected function _saveEmptyRecord($OV9DEXc)
    {
        return true;
    }
    function getMDNameFile($uHyzJ4K, $Kqoh_zY)
    {
        if ($this->feed["params"]["image_name_from_title_on"]) {
            $uHyzJ4K = $this->mso_slug($uHyzJ4K);
        } else {
            $uHyzJ4K = rawurlencode($uHyzJ4K);
        }
        if ($this->config->get("curlinfoHeaderOutOn")) {
            $this->_echo("<br />getMDNameFile file: <b>" . $uHyzJ4K . "</b>, file_ext: <b>" . $Kqoh_zY . "</b>");
        }
        if ($this->feed["params"]["image_name_from_title_on"]) {
            $uHyzJ4K = $this->rootPath . $this->config->get("imgPath") . $this->imageDir . substr($this->mso_slug($this->currentTitle), 0, 145) . "-" . substr(md5(microtime() + mt_rand(1, 100)), 0, 7) . ".{$Kqoh_zY}";
        } else {
            $uHyzJ4K = $this->rootPath . $this->config->get("imgPath") . $this->imageDir . md5(microtime() . strval(mt_rand(1, 100))) . ".{$Kqoh_zY}";
        }
        if (is_file($uHyzJ4K)) {
            if ($this->config->get("curlinfoHeaderOutOn")) {
                $this->_echo("<br />IS_FILE: <b>" . $uHyzJ4K . "</b>, file_ext: <b>" . $Kqoh_zY . "</b> or [No preg_replace]: <b>" . pathinfo($uHyzJ4K, PATHINFO_EXTENSION) . "</b><br/> ");
            }
            return $this->getMDNameFile($uHyzJ4K, $Kqoh_zY);
        }
        return $uHyzJ4K;
    }
    function imageResize($GbaccS4, $p_U1gJw, $PtBw0c2, $AarQtNo = 0, $UwLHcYn = 100)
    {
        $yldsW4K = getimagesize($GbaccS4);
        if ($AarQtNo == 0) {
            $oatgzYu = $yldsW4K[0] / $yldsW4K[1];
            $AarQtNo = $PtBw0c2 / $oatgzYu;
            if ($yldsW4K[0] < $PtBw0c2) {
                if ($GbaccS4 != $p_U1gJw) {
                    copy($GbaccS4, $p_U1gJw);
                }
                return true;
            }
        } else {
            $oatgzYu = $yldsW4K[0] / $yldsW4K[1];
            $FgYatNw = $PtBw0c2 / $AarQtNo;
            if ($FgYatNw < $oatgzYu) {
                $AarQtNo = $PtBw0c2 / $oatgzYu;
            } else {
                $PtBw0c2 = $AarQtNo * $oatgzYu;
            }
            if ($yldsW4K[0] < $PtBw0c2 && $yldsW4K[1] < $AarQtNo) {
                if ($GbaccS4 != $p_U1gJw) {
                    copy($GbaccS4, $p_U1gJw);
                }
                return true;
            }
        }
        $QISRIjZ = imagecreatetruecolor($PtBw0c2, $AarQtNo);
        if ($yldsW4K[2] == 1) {
            $CMCJxcH = imagecreatefromgif($GbaccS4);
        }
        if ($yldsW4K[2] == 2) {
            $CMCJxcH = imagecreatefromjpeg($GbaccS4);
        }
        if ($yldsW4K[2] == 3) {
            $CMCJxcH = imagecreatefrompng($GbaccS4);
        }
        if ($yldsW4K[2] == 18) {
            $CMCJxcH = imagecreatefromwebp($GbaccS4);
        }
        if (!imagecopyresampled($QISRIjZ, $CMCJxcH, 0, 0, 0, 0, $PtBw0c2, $AarQtNo, $yldsW4K[0], $yldsW4K[1])) {
            return false;
        }
        if (file_exists($p_U1gJw)) {
            unlink($p_U1gJw);
        }
        if ($yldsW4K[2] == 1) {
            imagegif($QISRIjZ, $p_U1gJw);
        }
        if ($yldsW4K[2] == 2) {
            imagejpeg($QISRIjZ, $p_U1gJw, $UwLHcYn);
        }
        if ($yldsW4K[2] == 3) {
            imagepng($QISRIjZ, $p_U1gJw);
        }
        if ($yldsW4K[2] == 18) {
            imagejpeg($QISRIjZ, $p_U1gJw);
        }
        imagedestroy($QISRIjZ);
        imagedestroy($CMCJxcH);
        return true;
    }
    function imageCrop($GbaccS4, $p_U1gJw, $PtBw0c2, $AarQtNo, $UwLHcYn = 100)
    {
        $yldsW4K = getimagesize($GbaccS4);
        if ($yldsW4K[2] == 1) {
            $JxzcJrO = imagecreatefromgif($GbaccS4);
        }
        if ($yldsW4K[2] == 2) {
            $JxzcJrO = imagecreatefromjpeg($GbaccS4);
        }
        if ($yldsW4K[2] == 3) {
            $JxzcJrO = imagecreatefrompng($GbaccS4);
        }
        if ($yldsW4K[2] == 18) {
            $CMCJxcH = imagecreatefromwebp($GbaccS4);
        }
        $BIZIrFc = imagesx($JxzcJrO);
        $T6nInLE = imagesy($JxzcJrO);
        if ($BIZIrFc / $T6nInLE > $PtBw0c2 / $AarQtNo) {
            $PdX1I5L = $BIZIrFc * ($AarQtNo / $T6nInLE);
            $e0cUaaA = $AarQtNo;
        } else {
            $PdX1I5L = $PtBw0c2;
            $e0cUaaA = $T6nInLE * ($PtBw0c2 / $BIZIrFc);
        }
        $uaeIYAE = imagecreatetruecolor($PdX1I5L, $e0cUaaA);
        imagecopyresampled($uaeIYAE, $JxzcJrO, 0, 0, 0, 0, $PdX1I5L, $e0cUaaA, $BIZIrFc, $T6nInLE);
        $koGWbw7 = imagecreatetruecolor($PtBw0c2, $AarQtNo);
        imagecopy($koGWbw7, $uaeIYAE, 0, 0, intval(($PdX1I5L - $PtBw0c2) / 2), intval(($e0cUaaA - $AarQtNo) / 2), $PtBw0c2, $AarQtNo);
        if (is_file($p_U1gJw)) {
            unlink($p_U1gJw);
        }
        if ($yldsW4K[2] == 1) {
            imagegif($koGWbw7, $p_U1gJw);
        }
        if ($yldsW4K[2] == 2) {
            imagejpeg($koGWbw7, $p_U1gJw, $UwLHcYn);
        }
        if ($yldsW4K[2] == 3) {
            imagepng($koGWbw7, $p_U1gJw);
        }
        if ($yldsW4K[2] == 18) {
            imagejpeg($QISRIjZ, $p_U1gJw);
        }
        imagedestroy($koGWbw7);
        imagedestroy($JxzcJrO);
        return true;
    }
    function getImageResize($JxzcJrO, $PtBw0c2, $AarQtNo = 0, $Xt6N5Eb)
    {
        $ZX0zoLE = getimagesize($JxzcJrO);
        if (!$ZX0zoLE[0] and !$ZX0zoLE[1]) {
        }
        $cdD2dIu["w"] = $ZX0zoLE[0];
        $cdD2dIu["h"] = $ZX0zoLE[1];
        if ($AarQtNo == 0) {
            $oatgzYu = $ZX0zoLE[0] / $ZX0zoLE[1];
            $AarQtNo = $PtBw0c2 / $oatgzYu;
            if ($ZX0zoLE[0] < $PtBw0c2) {
                $PtBw0c2 = $ZX0zoLE[0];
                $AarQtNo = $ZX0zoLE[1];
            }
        } else {
            $oatgzYu = $ZX0zoLE[0] / $ZX0zoLE[1];
            $FgYatNw = $PtBw0c2 / $AarQtNo;
            if ($FgYatNw < $oatgzYu) {
                $AarQtNo = $PtBw0c2 / $oatgzYu;
            } else {
                $PtBw0c2 = $AarQtNo * $oatgzYu;
            }
            if ($ZX0zoLE[0] < $PtBw0c2 && $ZX0zoLE[1] < $AarQtNo) {
                $PtBw0c2 = $ZX0zoLE[0];
                $AarQtNo = $ZX0zoLE[1];
            }
        }
        $DLaHr5T = " height=\"" . floor($AarQtNo) . "\" width=\"" . floor($PtBw0c2) . "\"";
        return $this->imageHtmlCode($JxzcJrO, $Xt6N5Eb, $DLaHr5T);
    }
    function imageHtmlCode($OV9DEXc, $Xt6N5Eb = '', $DLaHr5T = '')
    {
        if ($this->config->get("imageHtmlCodeLogsOn")) {
            $this->_echo("<br>imageHtmlCode %ADDS%: <b style=\"color:grey;\">" . $Xt6N5Eb . "</b>");
            $this->_echo("<br>imageHtmlCode %ATTR%: <i>" . $DLaHr5T . "</i>");
        }
        $this->imagesContentNoSave = $this->feed["params"]["no_save_without_pic"] ? true : false;
        if ($this->feed["params"]["image_save"] || $this->feed["params"]["img_path_method"]) {
            if ($this->feed["params"]["img_path_method"] == "1") {
                $OV9DEXc = ltrim($OV9DEXc, "/");
            }
            if ($this->feed["params"]["img_path_method"] == "2") {
                $OV9DEXc = rtrim(site_url(), "/") . $OV9DEXc;
            }
            if ($this->config->get("imageHtmlCodeLogsOn")) {
                $this->_echo("<br>imageHtmlCode img_path_method: <i>" . $this->feed["params"]["img_path_method"] . "</i>");
                $this->_echo("<br>imageHtmlCode url: <i>" . $OV9DEXc . "</i>");
            }
        }
        return strtr($this->feed["params"]["imageHtmlCode"], array("%TITLE%" => htmlentities($this->currentTitle, ENT_COMPAT, "UTF-8"), "%PATH%" => $OV9DEXc, "%ADDS%" => $Xt6N5Eb, "%ATTR%" => $DLaHr5T));
    }
    function introPicOn($uHyzJ4K, $drgMM3c = 0, $Xt6N5Eb = '')
    {
        $this->intro_pic_on = 0;
        if ($drgMM3c) {
            $uBByPgF = $this->getMDNameFile(basename($uHyzJ4K), $this->imageGetExt($uHyzJ4K));
            if ($this->copyUrlFile($uHyzJ4K, $uBByPgF)) {
                $this->picToIntro = $this->imageHtmlCode($this->config->get("imgPath") . $this->imageDir . basename($uBByPgF), $Xt6N5Eb);
                $this->imagesContent[] = $this->config->get("imgPath") . $this->imageDir . basename($uBByPgF);
                if ($this->feed["params"]["image_resize"]) {
                    if ($this->feed["params"]["img_intro_crop"]) {
                        $this->imageCrop($uBByPgF, $uBByPgF, $this->feed["params"]["intro_pic_width"], $this->feed["params"]["intro_pic_height"], $this->feed["params"]["intro_pic_quality"]);
                        $this->_echo("<br />imageCrop: " . $this->feed["params"]["intro_pic_width"] . " x " . $this->feed["params"]["intro_pic_height"]);
                    } else {
                        $this->imageResize($uBByPgF, $uBByPgF, $this->feed["params"]["intro_pic_width"], $this->feed["params"]["intro_pic_height"], $this->feed["params"]["intro_pic_quality"]);
                    }
                }
            }
        } else {
            if ($this->feed["params"]["image_resize"]) {
                $this->picToIntro = $this->getImageResize($uHyzJ4K, $this->feed["params"]["intro_pic_width"], $this->feed["params"]["intro_pic_height"], $Xt6N5Eb);
            } else {
                $this->picToIntro = $this->imageHtmlCode($uHyzJ4K, $Xt6N5Eb);
            }
        }
    }
    function get_extension($ks2o9tm = null)
    {
        $TO18Bz5 = explode("|", array_search($ks2o9tm, wp_get_mime_types()));
        if (empty($TO18Bz5[0])) {
            return false;
        }
        return $TO18Bz5[0];
    }
    function imageGetExt($uHyzJ4K)
    {
        $vruThyc = '';
        $YetpbuG = wp_get_image_mime($uHyzJ4K);
        $vruThyc = $this->get_extension($YetpbuG);
        if (!$vruThyc) {
            $vruThyc = "jpg";
        }
        if ($this->config->get("curlinfoHeaderOutOn")) {
            $this->_echo("<br>imageGetExt file: " . $uHyzJ4K);
            $this->_echo("<br>imageGetExt type_image: " . $vruThyc);
        }
        return $vruThyc;
    }
    function imageParser($X3JJ6Iw)
    {
        $X3JJ6Iw[3] = $this->getImageUrl($X3JJ6Iw[3]);
        $this->_echo("<br>imageParser src: <a target=\"_blank\" href=\"" . $X3JJ6Iw[3] . "\">" . $X3JJ6Iw[3] . "</a> ");
        if ($this->feed["params"]["image_save"]) {
            $X5TRj5K = $this->getMDNameFile(basename($X3JJ6Iw[3]), $this->imageGetExt($X3JJ6Iw[3]));
            if ($this->copyUrlFile($X3JJ6Iw[3], $X5TRj5K)) {
                if ($this->intro_pic_on and ($this->feed["params"]["intro_pic_on"] or @$this->feed["params"]["image_intro_on"])) {
                    $this->introPicOn($X5TRj5K, 1, "{$X3JJ6Iw[1]} {$X3JJ6Iw[4]}");
                }
                $X3JJ6Iw[3] = $this->config->get("imgPath") . $this->imageDir . basename($X5TRj5K);
                $this->imagesContent[] = $X3JJ6Iw[3];
                $this->_echo("<a href=\"" . site_url() . $X3JJ6Iw[3] . "\" style=\"color:green; font-weight: bold\">OK</a>" . " <br>imageParser <i style=\"color:Gold;background-color: black;\"><b>newfilename</b></i>:<b> " . basename($X5TRj5K) . "</b>");
                if ($this->feed["params"]["image_resize"]) {
                    if ($this->feed["params"]["img_text_crop"]) {
                        $this->imageCrop($X5TRj5K, $X5TRj5K, $this->feed["params"]["text_pic_width"], $this->feed["params"]["text_pic_height"], $this->feed["params"]["text_pic_quality"]);
                        $this->_echo("<br />imageCrop: " . $this->feed["params"]["text_pic_width"] . " x " . $this->feed["params"]["text_pic_height"]);
                    } else {
                        $this->imageResize($X5TRj5K, $X5TRj5K, $this->feed["params"]["text_pic_width"], $this->feed["params"]["text_pic_height"], $this->feed["params"]["text_pic_quality"]);
                    }
                }
                return $this->imageHtmlCode($X3JJ6Iw[3], "{$X3JJ6Iw[1]} {$X3JJ6Iw[4]}");
            } else {
                $this->_echo(" - <b style=\"color:red\">Ошибка сохранения файла картинки!</b>");
            }
        } else {
            if ($this->feed["params"]["image_resize"]) {
                if ($this->intro_pic_on and $this->feed["params"]["intro_pic_on"]) {
                    $this->introPicOn($X3JJ6Iw[3], 0, "{$X3JJ6Iw[1]} {$X3JJ6Iw[4]}");
                }
                return $this->getImageResize($X3JJ6Iw[3], $this->feed["params"]["text_pic_width"], $this->feed["params"]["text_pic_height"], "{$X3JJ6Iw[1]} {$X3JJ6Iw[4]}");
            } else {
                if ($this->intro_pic_on and $this->feed["params"]["intro_pic_on"]) {
                    $this->introPicOn($X3JJ6Iw[3], 0, "{$X3JJ6Iw[1]} {$X3JJ6Iw[4]}");
                }
                return $this->imageHtmlCode($X3JJ6Iw[3], "{$X3JJ6Iw[1]} {$X3JJ6Iw[4]}");
            }
        }
    }
    function genALT($jgabtuO, $Tgy8GEO, $P3ef3vv)
    {
        if ($this->feed["params"]["image_alt_from_attr_title"]) {
            if (!empty($Tgy8GEO)) {
                $jgabtuO = '' . $Tgy8GEO . $P3ef3vv;
            } else {
                $jgabtuO = '' . $this->currentTitle . $P3ef3vv;
            }
        } else {
            $jgabtuO = '' . $this->currentTitle . $P3ef3vv;
        }
        return $jgabtuO;
    }
    function imageProcessor($mbqPvCu)
    {
        $rIU3lOz = str_get_html($mbqPvCu);
        if (!$rIU3lOz) {
            $this->_echo("<br>imageProcessor::str_get_html false<b>" . $rIU3lOz . "</b>" . '');
            return false;
        }
        foreach ($rIU3lOz->find("img") as $P3ef3vv => $Nvk6lab) {
            if ($this->feed["params"]["limit_image_output_on"] and $P3ef3vv != 0) {
                $Nvk6lab->outertext = '';
                continue;
            }
            $Nvk6lab->getAllAttributes();
            if ($this->feed["params"]["image_class_name_on"] and $this->feed["params"]["image_class_name_custom"]) {
                $Nvk6lab->attr["class"] = $this->feed["params"]["image_class_name_custom"];
            }
            if ($this->feed["params"]["image_alt_make_on"]) {
                $jgabtuO = $Nvk6lab->attr["alt"];
                $Tgy8GEO = $Nvk6lab->attr["title"];
                if ($this->feed["params"]["image_alt_replace"]) {
                    $jgabtuO = $this->genALT($jgabtuO, $Tgy8GEO, $P3ef3vv);
                } else {
                    if (empty($jgabtuO)) {
                        $jgabtuO = $this->genALT($jgabtuO, $Tgy8GEO, $P3ef3vv);
                    }
                }
                $Nvk6lab->attr["alt"] = $jgabtuO;
            }
            $Udf4emM = array();
            $G9EwFtt = array();
            if (preg_match("~data:image~", $Nvk6lab->src)) {
                $Nvk6lab->lazy = true;
            }
            if ($this->feed["params"]["image_attr_delete"]) {
                $JI_6Tjr = explode(",", $this->feed["params"]["image_attr_delete"]);
                $JI_6Tjr[] = "src";
            } else {
                $JI_6Tjr[] = "src";
            }
            foreach ($Nvk6lab->attr as $DLaHr5T => $rGoHrYY) {
                if (in_array($DLaHr5T, array("align", "alt", "border", "hspace", "ismap", "longdesc", "lowsrc", "vspace", "usemap"))) {
                    $G9EwFtt[] = $DLaHr5T . "=\"" . $rGoHrYY . "\"";
                } elseif (in_array($DLaHr5T, $JI_6Tjr)) {
                    if ($this->config->get("imageProcessorLogsOn")) {
                        $this->_echo("<br>imageProcessor attr_delete: " . $DLaHr5T . '' . "\n<br>");
                    }
                } else {
                    $Udf4emM[] = $DLaHr5T . "=\"" . $rGoHrYY . "\"";
                }
            }
            $oyLhIzx[0] = preg_replace("~[\\n\\r\\t]+~is", " ", $Nvk6lab->outertext);
            $oyLhIzx[1] = implode(" ", $Udf4emM);
            $oyLhIzx[2] = $P3ef3vv;
            $oyLhIzx[3] = trim($Nvk6lab->src);
            $oyLhIzx[4] = implode(" ", $G9EwFtt);
            $Nvk6lab->outertext = $this->imageParser($oyLhIzx);
            if ($this->feed["params"]["image_nextpage_quan"] > 1 and $P3ef3vv > 1) {
                if ($P3ef3vv % $this->feed["params"]["image_nextpage_quan"] == 0) {
                    $this->_echo(" где больше " . $this->feed["params"]["image_nextpage_quan"] . " img, вставляем &#60;!--nextpage--&#62;<br>");
                    $Nvk6lab->outertext .= "<!--nextpage-->";
                }
            }
            if ($this->config->get("imageProcessorLogsOn")) {
                $this->_echo("<br>imageProcessor src: <b>" . $Nvk6lab->src . "</b>" . '');
                $this->_echo("<br>imageProcessor class: <b>" . $Nvk6lab->attr["class"] . "</b>" . '');
                $this->_echo("<br>imageProcessor alt: <b>" . $Nvk6lab->attr["alt"] . "</b>" . '');
            }
            $this->_echo("<br>");
        }
        $mbqPvCu = $rIU3lOz->save();
        $rIU3lOz->clear();
        return $mbqPvCu;
    }
    function imageProcessor_old($mbqPvCu)
    {
        if ($this->feed["params"]["image_space_on"]) {
            $mbqPvCu = preg_replace_callback("|<img(.*?)src(.*?)=[\\s'\\\"]*(.*?)['\\\"](.*?)>|is", array(&$this, "imageParser"), $mbqPvCu);
        } else {
            $mbqPvCu = preg_replace_callback("|<img(.*?)src(.*?)=[\\s'\\\"]*(.*?)['\\\"\\s](.*?)>|is", array(&$this, "imageParser"), $mbqPvCu);
        }
        return $mbqPvCu;
    }
    function mso_slug($dDKai2V)
    {
        $Kdf53u5 = array("А" => "a", "Б" => "b", "В" => "v", "Г" => "g", "Д" => "d", "Е" => "e", "Ё" => "jo", "Ж" => "zh", "З" => "z", "И" => "i", "Й" => "j", "К" => "k", "Л" => "l", "М" => "m", "Н" => "n", "О" => "o", "П" => "p", "Р" => "r", "С" => "s", "Т" => "t", "У" => "u", "Ф" => "f", "Х" => "h", "Ц" => "c", "Ч" => "ch", "Ш" => "sh", "Щ" => "shh", "Ъ" => '', "Ы" => "y", "Ь" => '', "Э" => "e", "Ю" => "ju", "Я" => "ja", "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "jo", "ж" => "zh", "з" => "z", "и" => "i", "й" => "j", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "shh", "ъ" => '', "ы" => "y", "ь" => '', "э" => "e", "ю" => "ju", "я" => "ja", "Є" => "ye", "є" => "ye", "І" => "i", "і" => "i", "Ї" => "yi", "ї" => "yi", "Ґ" => "g", "ґ" => "g", "Ў" => "u", "ў" => "u", "'" => '', "ă" => "a", "î" => "i", "ş" => "sh", "ţ" => "ts", "â" => "a", "«" => '', "»" => '', "—" => "-", "`" => '', " " => "-", "[" => '', "]" => '', "{" => '', "}" => '', "<" => '', ">" => '', "?" => '', "," => '', "*" => '', "%" => '', "\$" => '', "@" => '', "!" => '', ";" => '', ":" => '', "^" => '', "\"" => '', "&" => '', "=" => '', "№" => '', "\\" => '', "/" => '', "#" => '', "(" => '', ")" => '', "~" => '', "|" => '', "+" => '', "”" => '', "“" => '', "'" => '', "’" => '', "—" => "-", "–" => "-", "™" => "tm", "©" => "c", "®" => "r", "…" => '', "“" => '', "”" => '', "„" => '');
        $dDKai2V = strtr(trim($dDKai2V), $Kdf53u5);
        $dDKai2V = htmlentities($dDKai2V);
        $dDKai2V = strtr(trim($dDKai2V), $Kdf53u5);
        $dDKai2V = strtolower($dDKai2V);
        $dDKai2V = str_replace(".htm", "@HTM@", $dDKai2V);
        $dDKai2V = str_replace(".", '', $dDKai2V);
        $dDKai2V = str_replace("@HTM@", ".htm", $dDKai2V);
        $dDKai2V = str_replace("---", "-", $dDKai2V);
        $dDKai2V = str_replace("--", "-", $dDKai2V);
        $dDKai2V = str_replace("-", " ", $dDKai2V);
        $dDKai2V = str_replace(" ", "-", trim($dDKai2V));
        return $dDKai2V;
    }
    function mkImageDir()
    {
        $this->imageDir = date("Ymd") . "/";
        $atMxz0o = $this->rootPath . $this->config->get("imgPath") . $this->imageDir;
        if (file_exists($atMxz0o)) {
            return;
        }
        if (!file_exists($this->rootPath . $this->config->get("imgPath"))) {
            mkdir($this->rootPath . $this->config->get("imgPath"), 0777);
        }
        mkdir($atMxz0o, 0777);
    }
    function getTitleFromVKText($mbqPvCu)
    {
        $mbqPvCu = strip_tags($mbqPvCu);
        $d7jzrz2 = preg_replace("/\\s{2,}/", " ", trim($mbqPvCu));
        $d7jzrz2 = explode(" ", $d7jzrz2);
        $d7jzrz2 = array_slice($d7jzrz2, 0, $this->feed["params"]["title_words_count"]);
        return implode(" ", $d7jzrz2);
    }
    function save($OV9DEXc)
    {
        $xMWlZzB =& $this->content[$OV9DEXc];
        if ($this->feed["params"]["autoIntroOn"] == 1) {
            $this->introTexts[$OV9DEXc] = $this->userReplace("intro", $this->introTexts[$OV9DEXc]);
            $xMWlZzB["text"] = $this->introTexts[$OV9DEXc] . "{{{MORE}}}" . $xMWlZzB["text"];
        }
        $this->_echo("<br />title: <a target=\"blank\" href=\"" . $OV9DEXc . "\">" . $xMWlZzB["title"] . "</a>");
        if ($this->feed["params"]["filter_words_on"]) {
            if ($this->feed["params"]["filter_words_where"] == "title") {
                $qaAtUVm = $xMWlZzB["title"];
            } elseif ($this->feed["params"]["filter_words_where"] == "text") {
                $qaAtUVm = $xMWlZzB["text"];
            } elseif ($this->feed["params"]["filter_words_where"] == "title+text") {
                $qaAtUVm = "{$xMWlZzB["title"]} {$xMWlZzB["text"]}";
            }
            preg_match_all("/(" . $this->filterWordsSave . ")/is", $qaAtUVm, $pXSclgE);
            if ($this->feed["params"]["filter_words_save"]) {
                if (count($pXSclgE[1])) {
                    $this->_echo("<br /><i>Материал будет не сохранен по причине наличия следующих фильтр-слов в нем: " . implode(", ", $pXSclgE[1]) . "</i>");
                    return null;
                } else {
                    $this->_echo("<br /><i>Материал будет сохранен по причине отсутствия фильтр-слов в нем" . "</i>");
                }
            } elseif (!$this->feed["params"]["filter_words_save"]) {
                if (count($pXSclgE[1])) {
                    $this->_echo("<br /><i>Материал будет сохранен по причине наличия следующих фильтр-слов в нем: " . implode(", ", $pXSclgE[1]) . "</i>");
                } else {
                    $this->_echo("<br /><i>Материал будет не сохранен по причине отсутствия фильтр-слов в нем" . "</i>");
                    return null;
                }
            }
        }
        $this->currentUrl = isset($xMWlZzB["location"]) ? $xMWlZzB["location"] : '';
        if (!$this->feed["params"]["js_script_no_del"]) {
            $xMWlZzB["text"] = preg_replace("|<script.*?</script>|is", '', $xMWlZzB["text"]);
        }
        if (!$this->feed["params"]["css_no_del"]) {
            $xMWlZzB["text"] = preg_replace("|<style.*?</style>|is", '', $xMWlZzB["text"]);
        }
        $xMWlZzB["text"] = $this->userReplace("text", $xMWlZzB["text"]);
        $xMWlZzB["title"] = $this->userReplace("title", $xMWlZzB["title"]);
        if ($this->feed["params"]["case_title"] == 1) {
            $xMWlZzB["title"] = mb_convert_case($xMWlZzB["title"], MB_CASE_TITLE);
        }
        if ($this->feed["params"]["case_title"] == 2) {
            $xMWlZzB["title"] = mb_convert_case($xMWlZzB["title"], MB_CASE_UPPER);
        }
        $xMWlZzB["title"] = strip_tags(html_entity_decode($xMWlZzB["title"], ENT_QUOTES, "utf-8"));
        $this->currentTitle = $xMWlZzB["title"];
        if ($this->feed["params"]["strip_tags"]) {
            $xMWlZzB["text"] = trim(strip_tags($xMWlZzB["text"], $this->feed["params"]["allowed_tags"]));
        }
        $this->_echo("<br /><b>Обработка изображений в тексте:</b>");
        if ($this->imagesContentNoSave) {
            if (preg_match_all("~<img[^>]+>~i", $xMWlZzB["text"])) {
                $this->_echo("<i><b>Изображение найдено.</b></i>");
            } else {
                $this->_echo("<i>Материл не будет сохранен по причине отсутсвия в нем картинок! (см. опцию: Не сохранять материал без картинок)</i><hr>");
                return null;
            }
        }
        $this->intro_pic_on = 1;
        if (!$this->testOn and $this->feed["params"]["image_save"]) {
            $this->mkImageDir();
        }
        $xMWlZzB["text"] = $this->imageProcessor($xMWlZzB["text"]);
        if ($this->feed["params"]["fulltext_size_on"] == 1) {
            $xMWlZzB["text"] = $this->postFullTextSize($xMWlZzB["text"]);
        }
        if ($this->config->get("getContentWriteLogsOn")) {
            file_put_contents($this->tmpDir . "content_url_" . md5($OV9DEXc) . ".html", var_export($xMWlZzB, true));
        }
        $this->_pluginTranslate($xMWlZzB);
        $this->_pluginSynonymize($xMWlZzB);
        if (empty($xMWlZzB["text"])) {
            $this->_echo("<br /><i>Материл не будет сохранен по причине отсутствия в нем контента</i>");
            return null;
        }
        return true;
    }
    function postFullTextSize($mbqPvCu)
    {
        if ($this->config->get("getContentWriteLogsOn")) {
            file_put_contents($this->tmpDir . "text_" . md5($OV9DEXc) . ".htm", $mbqPvCu);
            file_put_contents($this->tmpDir . "text_strip_tags_" . md5($OV9DEXc) . ".txt", strip_tags($mbqPvCu));
        }
        $mYrFDB0 = trim($this->feed["params"]["postFulltextSymbolEnd"]) == '' ? " " : $this->feed["params"]["postFulltextSymbolEnd"];
        $s0q3fPt = str_replace("&nbsp;", " ", strip_tags($mbqPvCu));
        $s0q3fPt = preg_replace("~[\\n\\r\\t\\0\\x0B]{1,}~is", " ", $s0q3fPt);
        $s0q3fPt = preg_replace("~[\\s]{2,}~is", " ", $s0q3fPt);
        $SP4dzrw = substr($s0q3fPt, 0, $this->feed["params"]["post_full_size"] + 10);
        if ($this->config->get("getContentWriteLogsOn")) {
            file_put_contents($this->tmpDir . "r_" . md5($OV9DEXc) . ".txt", $SP4dzrw);
        }
        $FO5rq3y = strripos($SP4dzrw, $mYrFDB0, 0);
        $s0q3fPt = substr($s0q3fPt, 0, $FO5rq3y);
        if ($this->config->get("getContentWriteLogsOn")) {
            $this->_echo("<br /><b>text: </b>" . strip_tags($mbqPvCu));
            $this->_echo("<br /><b>postFullTextSize: </b> <i>" . $s0q3fPt . "</i> ");
            file_put_contents($this->tmpDir . "fulltext_" . md5($OV9DEXc) . ".txt", $mbqPvCu);
        }
        if (trim($this->feed["params"]["postFulltextSymbolEnd"]) == '') {
            return $s0q3fPt . "...";
        } else {
            return $s0q3fPt . $this->feed["params"]["postFulltextSymbolEnd"];
        }
    }
    function userReplace($jDHxI9c, $mbqPvCu)
    {
        if (!$this->feed["params"]["user_replace_on"]) {
            return $mbqPvCu;
        }
        if (!is_array($this->feed["params"]["replace"])) {
            return $mbqPvCu;
        }
        if (isset($this->feed["params"]["replace"][$jDHxI9c]) and is_array($this->feed["params"]["replace"][$jDHxI9c])) {
            foreach ($this->feed["params"]["replace"][$jDHxI9c] as $QmsPJ5F => $iEPqlLA) {
                if ($iEPqlLA["limit"] == '') {
                    $iEPqlLA["limit"] = -1;
                }
                $mbqPvCu = preg_replace($iEPqlLA["search"], $iEPqlLA["replace"], $mbqPvCu, $iEPqlLA["limit"]);
                if ($this->config->get("getContentWriteLogsOn") and $this->config->get("curlinfoHeaderOutOn")) {
                    $this->_echo("<br>page:  <b>" . htmlspecialchars($jDHxI9c, ENT_QUOTES) . "</b>, ");
                    $this->_echo("№:  <b>" . htmlspecialchars($QmsPJ5F, ENT_QUOTES) . "</b>, ");
                    $this->_echo("search:  <b>" . htmlspecialchars($iEPqlLA["search"], ENT_QUOTES) . "</b>, ");
                    $this->_echo("replace:  <b>" . htmlspecialchars($iEPqlLA["replace"], ENT_QUOTES) . "</b> <br>");
                    file_put_contents($this->tmpDir . "userReplace_" . $jDHxI9c . "_" . md5($OV9DEXc) . ".html", $mbqPvCu);
                }
            }
        }
        return $mbqPvCu;
    }
    function textClean($mbqPvCu)
    {
        $mbqPvCu = preg_replace("~<script[^>]*?>.*?</script>~si", " ", $mbqPvCu);
        $mbqPvCu = preg_replace("~<style[^>]*?>.*?</style>~si", " ", $mbqPvCu);
        $EtD_7qB = array("\n", "\r", "\t", "`", "\"", ">", "<");
        $mbqPvCu = html_entity_decode($mbqPvCu);
        $mbqPvCu = str_replace($EtD_7qB, " ", strip_tags($mbqPvCu));
        return trim($mbqPvCu);
    }
    function translit($stLAjYB)
    {
        $Ztoa_n7 = array("а" => "a", "А" => "A", "б" => "b", "Б" => "B", "в" => "v", "В" => "V", "г" => "g", "Г" => "G", "д" => "d", "Д" => "D", "е" => "e", "Е" => "E", "ё" => "e", "Ё" => "E", "ж" => "j", "Ж" => "J", "з" => "z", "З" => "Z", "и" => "i", "И" => "I", "й" => "i", "Й" => "I", "к" => "k", "К" => "K", "л" => "l", "Л" => "L", "м" => "m", "М" => "M", "н" => "n", "Н" => "N", "о" => "o", "О" => "O", "п" => "p", "П" => "P", "р" => "r", "Р" => "R", "с" => "s", "С" => "S", "т" => "t", "Т" => "T", "у" => "y", "У" => "Y", "ф" => "f", "Ф" => "F", "х" => "h", "Х" => "H", "ц" => "c", "Ц" => "C", "ч" => "ch", "Ч" => "CH", "ш" => "sh", "Ш" => "SH", "щ" => "sh", "Щ" => "SH", "ъ" => '', "Ъ" => '', "ы" => "y", "Ы" => "Y", "ь" => '', "Ь" => '', "э" => "e", "Э" => "E", "ю" => "u", "Ю" => "U", "я" => "ia", "Я" => "IA", " " => "-");
        return strtr($stLAjYB, $Ztoa_n7);
    }
    function genTagKeywords($N32mybw)
    {
        $N32mybw = $this->textClean($N32mybw);
        if (function_exists("mb_strtolower")) {
            $N32mybw = mb_strtolower($N32mybw, "utf-8");
        } else {
            $N32mybw = strtolower($N32mybw);
        }
        preg_match_all("|[a-zA-Zа-яА-Я]{3,}|ui", $N32mybw, $Xk3x7Fh);
        $Xk3x7Fh = $Xk3x7Fh[0];
        if (!count($Xk3x7Fh)) {
            return '';
        }
        array_unique($Xk3x7Fh);
        $VJVb_lT = array_count_values($Xk3x7Fh);
        $VJVb_lT = array_keys($VJVb_lT);
        $jkgi0Xd = str_replace(array("\t", "\n", "\r"), '', $this->feed["params"]["metaKeysStopList"]);
        $jkgi0Xd = str_replace(array(", ", " ,"), ",", $jkgi0Xd);
        $jkgi0Xd = explode(",", $jkgi0Xd);
        if (count($jkgi0Xd)) {
            $VJVb_lT = array_diff($VJVb_lT, $jkgi0Xd);
        }
        $VJVb_lT = array_slice($VJVb_lT, 0, $this->feed["params"]["metaKeysSize"]);
        if (count($VJVb_lT) > 0) {
            return implode(", ", $VJVb_lT);
        }
    }
    function genTagDescription($N32mybw)
    {
        $N32mybw = $this->textClean($N32mybw);
        if (function_exists("mb_substr")) {
            $AN1OP3M = strripos(mb_substr($N32mybw, 0, $this->feed["params"]["metaDescSize"], "utf-8"), " ");
            return mb_substr($N32mybw, 0, $AN1OP3M, "utf-8");
        } else {
            $AN1OP3M = strripos(substr($N32mybw, 0, $this->feed["params"]["metaDescSize"]), " ");
            return substr($N32mybw, 0, $AN1OP3M);
        }
    }
    function cleanImages()
    {
        if (!count($this->imagesContent)) {
            return true;
        }
        $this->_echo("<br>Очистка не используемых файлов картинок...");
        foreach ($this->imagesContent as $uHyzJ4K) {
            @unlink($this->rootPath . $uHyzJ4K);
        }
    }
    function beforeSaveLoop($ESjIzDq)
    {
    }
    public final function execute($HrAL3Ba)
    {
        if ($this->_start_import === false) {
            $this->feed = $this->_getFeed($HrAL3Ba);
            if (empty($this->feed)) {
                $this->_echo("<b>Лента ID: </b>" . $HrAL3Ba . " не найдена<br />");
            } else {
                $this->_echo("<b>Лента ID: </b>" . $HrAL3Ba . " <br />");
            }
            $this->_beforeExecute($HrAL3Ba);
        }
        $sMGHkPy = $this->_import();
        if ($this->_isTransactionModel() and $sMGHkPy !== true) {
            return $sMGHkPy;
        }
        $this->_afterExecute($HrAL3Ba);
        return true;
    }
    protected function _getFeed($HrAL3Ba)
    {
        return array();
    }
    protected function _beforeExecute($HrAL3Ba)
    {
        $this->_start_import = (int) current_time("timestamp", 1);
        $this->_echo("<b>Импорт ленты: <a target=\"_blank\" href=\"" . $this->feed["url"] . "\">" . $this->feed["name"] . "</a> - " . date("H:i:s Y-m-d", $this->_start_import) . "</b><br />");
        $this->feed["params"] = unserialize(base64_decode($this->feed["params"]));
        if (trim($this->feed["params"]["imageHtmlCode"]) == '') {
            $this->feed["params"]["imageHtmlCode"] = "<img src=\"%PATH%\" %ATTR% />";
        }
        $this->requestMethod = $this->feed["params"]["requestMethod"] == "0" ? $this->config->get("getContentMethod") : (int) ($this->feed["params"]["requestMethod"] - 1);
        if ($this->feed["params"]["image_path"] and !$this->testOn) {
            $this->config->set("imgPath", $this->feed["params"]["image_path"]);
        }
        if ($this->feed["params"]["filter_words_on"]) {
            $this->filterWordsSave = '';
            $sz4fZ5w = @explode(",", $this->feed["params"]["filter_words_list"]);
            if (count($sz4fZ5w)) {
                array_walk($sz4fZ5w, function () use(&$rGoHrYY) {
                    return trim($rGoHrYY);
                });
                $sz4fZ5w = array_filter($sz4fZ5w);
                $this->filterWordsSave = implode("|", $sz4fZ5w);
            }
            if (trim($this->filterWordsSave) == '') {
                $this->feed["params"]["filter_words_on"] = 0;
                $this->_echo("<br /><br><b>Список фильтр-слов пуст! Обработка фильтр слов отключена для данного процесса импорта.</b><br />");
            }
        }
        $this->imagesContentNoSave = $this->feed["params"]["no_save_without_pic"] ? true : false;
    }
    protected function _afterExecute($HrAL3Ba)
    {
        if (is_iterable($this->content)) {
            $YBdTB7M = count($this->content);
        } else {
            $YBdTB7M = 0;
        }
        if ($YBdTB7M > 0) {
            $this->updateFeedData["last_url"] = "'" . key($this->content) . "'";
        }
        if ($this->testOn) {
            $this->_echo("<br /><br><b>Тестовый импорт ленты: <a target=\"_blank\" href=\"" . $this->feed["url"] . "\">" . $this->feed["name"] . "</a> - " . date("H:i:s Y-m-d", (int) current_time("timestamp", 1)) . " - завершен!</b><br /><br />");
        } else {
            $wB6mcGm = (int) current_time("timestamp", 1) - $this->_start_import;
            $this->updateFeedData["last_update"] = (int) current_time("timestamp", 1);
            $this->updateFeedData["work_time"] = (int) $wB6mcGm;
            $this->updateFeedData["last_count"] = (int) $YBdTB7M;
            $this->updateFeedData["link_count"] = (int) $this->feed["link_count"];
            if ($this->config->get("offFeedsModeOn")) {
                $this->updateFeedData["published"] = 1;
            }
        }
        $this->_start_import = false;
    }
    protected function _pluginSynonymize(&$xMWlZzB)
    {
        $this->_echo("<br /><b>Синонимизация:</b>");
        $tVTFzO8 = $this->config->get("textorobotEnabled");
        $XV5_uyT = $this->feed["params"]["synonymizeEnabled"];
        if (!$tVTFzO8 || !$XV5_uyT) {
            return null;
        }
        $LDmT_oL = $this->feed["params"]["textorobotApiKey"];
        if (!$LDmT_oL) {
            $LDmT_oL = $this->config->get("textorobotApiKey");
        }
        if (!$LDmT_oL) {
            $this->_echoError("Не задан API-ключ для синонимизации");
            return false;
        }
        $mbqPvCu = $xMWlZzB["text"];
        $Tgy8GEO = $xMWlZzB["title"];
        if (!$mbqPvCu) {
            $this->_echoError("Не задан текст для синонимизации");
            return false;
        }
        if (!$this->textNoTranslate[$this->currentUrl]) {
            $this->textNoTranslate[$this->currentUrl] = $mbqPvCu;
        }
        if (!$this->titleNoTranslate[$this->currentUrl]) {
            $this->titleNoTranslate[$this->currentUrl] = $Tgy8GEO;
        }
        $Gm1uZCW = (int) $this->feed["params"]["minSynonymPercentage"];
        $VxALfN9 = $this->feed["params"]["ignoreRecordOnSynonymizeError"];
        $xMWlZzB["percent_syn"] = 0;
        if ($Tgy8GEO) {
            $HMg0wxW = $this->_synonymizeTextorobot($Tgy8GEO, $LDmT_oL);
            $Gatafad = $HMg0wxW->processedText;
            if ($Gatafad) {
                $xMWlZzB["title"] = $Gatafad;
                $cAXLEfm = (int) $HMg0wxW->synonymPercentage;
                $this->_echoMessage("Заголовок синонимизирован на " . $cAXLEfm . "%, символы с баланса <b>списаны</b>.");
            } else {
                $this->_echoWarning("Синонимизация заголовка завершилась ошибкой. Символы с баланса не списаны.");
            }
        }
        $y82ik6P = $this->_synonymizeTextorobot($mbqPvCu, $LDmT_oL);
        $bQclWrL = $y82ik6P->processedText;
        $efm0GCN = (int) $y82ik6P->synonymPercentage;
        if ($bQclWrL) {
            $this->_echoMessage("Синонимизация произведена, символы с баланса <b>списаны</b>.");
            $this->_echoMessage("Процент синонимизации = " . $efm0GCN . "%, заданный лимит " . $Gm1uZCW . "%");
        } else {
            $this->_echoWarning("Синонимизация текста завершилась ошибкой. Символы с баланса <b>не списаны</b>.");
        }
        if ($efm0GCN < $Gm1uZCW) {
            $bQclWrL = false;
        }
        if ($bQclWrL) {
            $xMWlZzB["text"] = $bQclWrL;
            $xMWlZzB["percent_syn"] = $efm0GCN;
            $this->_echoMessage("В соответствии с настройками ленты: <b>Сохранён синонимизированный текст</b>!");
        } else {
            if ($VxALfN9) {
                $xMWlZzB["text"] = '';
                $this->_echoWarning("В соответствии с настройками ленты: <b>Текст не будет сохранён!</b>!");
            } else {
                $this->_echoWarning("В соответствии с настройками ленты: <b>Будет сохранён исходный текст</b>!");
            }
        }
        $this->_echoMessage("Остаток символов на балансе: " . $y82ik6P->synonymSymbolBalance . "<br />");
        return true;
    }
    public function _textorobotErrorHandler($w5G0syH, $pZhmuld)
    {
        if ($pZhmuld == "warning") {
            $this->_echoWarning("Textorobot.ru:" . $w5G0syH);
        } else {
            $this->_echoError("Textorobot.ru:" . $w5G0syH);
        }
    }
    protected function _synonymizeTextorobot($mbqPvCu, $LDmT_oL)
    {
        include_once WPGRABBER_PLUGIN_DIR . "textorobot/textorobotApi.php";
        $efIyiVO = new TextorobotApi($LDmT_oL, array($this, "_textorobotErrorHandler"));
        $FwB4oyS = $mbqPvCu;
        if ($this->feed["params"]["SynonymStrimWidth"]) {
            $mbqPvCu = mb_strimwidth($mbqPvCu, 0, $this->feed["params"]["SynonymStrimWidth"]);
            $pkAdn_5 = str_replace($mbqPvCu, '', $FwB4oyS);
        }
        $sMGHkPy = $efIyiVO->synonymize($mbqPvCu);
        if (!$sMGHkPy->processedText) {
            return false;
        }
        if ($this->feed["params"]["SynonymStrimWidth"]) {
            $sMGHkPy->processedText .= $pkAdn_5;
        }
        return $sMGHkPy;
    }
    protected function _pluginTranslate(&$xMWlZzB)
    {
        $GDwzPT3 = array();
        if ($this->feed["params"]["translate_on"]) {
            $k3WF3KP = (int) $this->feed["params"]["translate_method"];
            $rydeYca = array();
            if ($k3WF3KP == 0) {
                $k3WF3KP = "GoogleTranslateFree";
                $rydeYca["lang"] = $this->feed["params"]["translate_lang"];
            } elseif ($k3WF3KP == 1) {
                $k3WF3KP = "YandexTranslateFree";
                $rydeYca["lang"] = $this->feed["params"]["translate_lang"];
                $rydeYca["key"] = $this->getKeyYandexTranslateFree();
            } elseif ($k3WF3KP == 2) {
                $k3WF3KP = "YandexCloud";
                $rydeYca["lang"] = $this->feed["params"]["translate_lang"];
                $rydeYca["key"] = !empty($this->feed["params"]["yandexOauth"]) ? $this->feed["params"]["yandexOauth"] : $this->config->get("yandexOauth");
                $rydeYca["folder_id"] = !empty($this->feed["params"]["yandexFolderId"]) ? $this->feed["params"]["yandexFolderId"] : $this->config->get("yandexFolderId");
                $rydeYca["yandex_glossary_pairs"] = $this->feed["params"]["yandex_glossary_pairs"];
            } elseif ($k3WF3KP == 3) {
                $k3WF3KP = "GoogleCloud";
                $rydeYca["lang"] = $this->feed["params"]["translate_lang"];
                $rydeYca["key"] = !empty($this->feed["params"]["google_translate_api_key"]) ? $this->feed["params"]["google_translate_api_key"] : $this->config->get("google_translate_api_key");
            } elseif ($k3WF3KP == 4) {
                $k3WF3KP = "Deepl";
                $rydeYca["lang"] = $this->feed["params"]["translate_lang"];
                $rydeYca["key"] = !empty($this->feed["params"]["deepl_api_key"]) ? $this->feed["params"]["deepl_api_key"] : $this->config->get("deepl_api_key");
            } elseif ($k3WF3KP == 5) {
                $k3WF3KP = "Lingvanex";
                $rydeYca["lang"] = $this->feed["params"]["translate_lang"];
                $rydeYca["key"] = !empty($this->feed["params"]["lingvanex_api_key"]) ? $this->feed["params"]["lingvanex_api_key"] : $this->config->get("lingvanex_api_key");
            } elseif ($k3WF3KP == 6) {
                $k3WF3KP = "Bing";
                $Yz9qZ06 = explode("-", $this->feed["params"]["translate_lang"]);
                $rydeYca["from"] = str_replace("_", "-", $Yz9qZ06[0]);
                $rydeYca["to"] = isset($Yz9qZ06[1]) ? str_replace("_", "-", $Yz9qZ06[1]) : $Yz9qZ06[1];
                $rydeYca["key"] = $this->config->get("bingApiKey");
            } else {
                $GDwzPT3[] = "Ошибка первого перевода. Неправильно указана система перевода.";
            }
            if (!sizeof($GDwzPT3)) {
                $this->textNoTranslate[$this->currentUrl] = $xMWlZzB["text"];
                if (($mbqPvCu = $this->N3UyeV_($xMWlZzB["text"], $k3WF3KP, $rydeYca, $XsO5AGC)) !== false) {
                    if ($this->feed["params"]["nosave_if_not_translate"]) {
                        if (md5($mbqPvCu) == md5($xMWlZzB["text"])) {
                            $xMWlZzB["text"] = '';
                            $GDwzPT3[] = "Текст не был переведен! Включена опция не сохранять записи без перевода!";
                        } else {
                            $xMWlZzB["text"] = $mbqPvCu;
                        }
                    } else {
                        $xMWlZzB["text"] = $mbqPvCu;
                    }
                } else {
                    $GDwzPT3[] = "Ошибка первого перевода текста. " . current($XsO5AGC);
                    if ($this->feed["params"]["nosave_if_not_translate"]) {
                        $xMWlZzB["text"] = '';
                        $GDwzPT3[] = "Текст не был переведен! Включена опция не сохранять записи без перевода!";
                    }
                }
                $this->titleNoTranslate[$this->currentUrl] = $xMWlZzB["title"];
                $this->_echo("<br><b>Первый перевод заголовка</b>: " . $xMWlZzB["title"] . "<br>\n");
                if (($Tgy8GEO = $this->N3UyeV_($xMWlZzB["title"], $k3WF3KP, $rydeYca, $XsO5AGC)) !== false) {
                    if ($this->feed["params"]["nosave_if_not_translate"]) {
                        if (md5($Tgy8GEO) == md5($xMWlZzB["title"])) {
                            $xMWlZzB["title"] = '';
                            $GDwzPT3[] = "Заголовок не был переведен! Включена опция не сохранять записи без перевода!";
                        } else {
                            $xMWlZzB["title"] = $Tgy8GEO;
                        }
                    } else {
                        $xMWlZzB["title"] = $Tgy8GEO;
                    }
                } else {
                    $GDwzPT3[] = "Ошибка первого перевода заголовка. " . current($XsO5AGC);
                    if ($this->feed["params"]["nosave_if_not_translate"]) {
                        $xMWlZzB["title"] = '';
                        $GDwzPT3[] = "Заголовок не был переведен! Включена опция не сохранять записи без перевода!";
                    }
                }
            }
        }
        if (!sizeof($GDwzPT3)) {
            if ($this->feed["params"]["translate2_on"]) {
                $k3WF3KP = (int) $this->feed["params"]["translate2_method"];
                $rydeYca = array();
                if ($k3WF3KP == 0) {
                    $k3WF3KP = "GoogleTranslateFree";
                    $rydeYca["lang"] = $this->feed["params"]["translate2_lang"];
                } elseif ($k3WF3KP == 1) {
                    $k3WF3KP = "YandexCloudTranslateFree";
                    $rydeYca["lang"] = $this->feed["params"]["translate2_lang"];
                } elseif ($k3WF3KP == 2) {
                    $k3WF3KP = "YandexCloud";
                    $rydeYca["lang"] = $this->feed["params"]["translate2_lang"];
                    $rydeYca["key"] = !empty($this->feed["params"]["yandexOauth"]) ? $this->feed["params"]["yandexOauth"] : $this->config->get("yandexOauth");
                    $rydeYca["folder_id"] = !empty($this->feed["params"]["yandexFolderId"]) ? $this->feed["params"]["yandexFolderId"] : $this->config->get("yandexFolderId");
                    $rydeYca["yandex_glossary_pairs"] = $this->feed["params"]["yandex_glossary_pairs2"];
                } elseif ($k3WF3KP == 3) {
                    $k3WF3KP = "GoogleCloud";
                    $rydeYca["lang"] = $this->feed["params"]["translate2_lang"];
                    $rydeYca["key"] = !empty($this->feed["params"]["google_translate_api_key"]) ? $this->feed["params"]["google_translate_api_key"] : $this->config->get("google_translate_api_key");
                } elseif ($k3WF3KP == 4) {
                    $k3WF3KP = "Deepl";
                    $rydeYca["lang"] = $this->feed["params"]["translate2_lang"];
                    $rydeYca["key"] = !empty($this->feed["params"]["deepl_api_key"]) ? $this->feed["params"]["deepl_api_key"] : $this->config->get("deepl_api_key");
                } elseif ($k3WF3KP == 5) {
                    $k3WF3KP = "Lingvanex";
                    $rydeYca["lang"] = $this->feed["params"]["translate2_lang"];
                    $rydeYca["key"] = !empty($this->feed["params"]["lingvanex_api_key"]) ? $this->feed["params"]["lingvanex_api_key"] : $this->config->get("lingvanex_api_key");
                } elseif ($k3WF3KP == 6) {
                    $k3WF3KP = "Bing";
                    $Yz9qZ06 = explode("-", $this->feed["params"]["translate2_lang"]);
                    $rydeYca["from"] = str_replace("_", "-", $Yz9qZ06[0]);
                    $rydeYca["to"] = isset($Yz9qZ06[1]) ? str_replace("_", "-", $Yz9qZ06[1]) : $Yz9qZ06[1];
                    $rydeYca["key"] = $this->config->get("bingApiKey");
                } else {
                    $GDwzPT3[] = "Ошибка второго перевода. Неправильно указана система перевода.";
                }
                if (!sizeof($GDwzPT3)) {
                    if (($mbqPvCu = $this->n3uYev_($xMWlZzB["text"], $k3WF3KP, $rydeYca, $XsO5AGC)) !== false) {
                        if ($this->feed["params"]["nosave_if_not_translate"]) {
                            if (md5($mbqPvCu) == md5($xMWlZzB["text"])) {
                                $xMWlZzB["text"] = '';
                                $GDwzPT3[] = "Текст не был переведен во втором переводе! Включена опция не сохранять записи без перевода!";
                            } else {
                                $xMWlZzB["text"] = $mbqPvCu;
                            }
                        } else {
                            $xMWlZzB["text"] = $mbqPvCu;
                        }
                    } else {
                        $GDwzPT3[] = "Ошибка второго перевода текста. " . current($XsO5AGC);
                        if ($this->feed["params"]["nosave_if_not_translate"]) {
                            $xMWlZzB["text"] = '';
                            $GDwzPT3[] = "Текст не был переведен во втором переводе! Включена опция не сохранять записи без перевода!";
                        }
                    }
                    if (($Tgy8GEO = $this->N3UyeV_($xMWlZzB["title"], $k3WF3KP, $rydeYca, $XsO5AGC)) !== false) {
                        if ($this->feed["params"]["nosave_if_not_translate"]) {
                            if (md5($Tgy8GEO) == md5($xMWlZzB["title"])) {
                                $xMWlZzB["title"] = '';
                                $GDwzPT3[] = "Заголовок не был переведен! Включена опция не сохранять записи без перевода!";
                            } else {
                                $xMWlZzB["title"] = $Tgy8GEO;
                            }
                        } else {
                            $xMWlZzB["title"] = $Tgy8GEO;
                        }
                    } else {
                        $GDwzPT3[] = "Ошибка второго перевода заголовка. " . current($XsO5AGC);
                        if ($this->feed["params"]["nosave_if_not_translate"]) {
                            $xMWlZzB["title"] = '';
                            $GDwzPT3[] = "Заголовок не был переведен во втором переводе! Включена опция не сохранять записи без перевода!";
                        }
                    }
                }
            }
        }
        if (sizeof($GDwzPT3)) {
            foreach ($GDwzPT3 as $XsO5AGC) {
                $this->_echo("<br /><i>" . $XsO5AGC . "</i>");
            }
        }
    }
    protected function n3uYEv_($mbqPvCu, $k3WF3KP, $rydeYca, &$GDwzPT3)
    {
        if ($k3WF3KP !== '') {
            $WV0MbMA = "_panjarwa" . $k3WF3KP;
            if (method_exists($this, $WV0MbMA)) {
                return $this->{$WV0MbMA}($mbqPvCu, $rydeYca, $GDwzPT3);
            }
        }
        $GDwzPT3[] = "Система перевода не найдена.";
        return false;
    }
    function getParseYandexTranslateFreeKey($rIU3lOz)
    {
        preg_match("~SID: '(.*?)',~is", $rIU3lOz, $oyLhIzx);
        if ($oyLhIzx[1]) {
            $uVeHlNc = explode(".", strrev($oyLhIzx[1]));
            $jDHxI9c = implode(".", array_reverse($uVeHlNc));
            return $jDHxI9c . "-1-0";
        } else {
            if (preg_match("~checkcaptcha\\?key~is", $rIU3lOz)) {
                $this->_echo("<br><b>YandexTranslateFree::Captcha</b>: Нам очень жаль, но запросы, поступившие с вашего IP-адреса, похожи на автоматические.<br>");
            }
            return false;
        }
    }
    function getKeyYandexTranslateFree()
    {
        $sVvfzU1 = (int) current_time("timestamp", 1) + (int) 15 * MINUTE_IN_SECONDS;
        $uMbFLmZ = (int) get_option("wpg_key_yandex_lifespan");
        if ($sVvfzU1 > 0 && (int) current_time("timestamp", 1) > $uMbFLmZ) {
            $X2PyPHv = $this->getParseYandexTranslateFreeKey($this->getContent("https://translate.yandex.ru/"));
            if ($X2PyPHv) {
                $this->_echo("Пишем <i>новый</i> <b>wpg_key_yandex_translate_free</b> в базу<br>");
                update_option("wpg_key_yandex_lifespan", $sVvfzU1);
                update_option("wpg_key_yandex_translate_free", $X2PyPHv);
                return $X2PyPHv;
            }
        } else {
            $this->_echo("Получаем <b>wpg_key_yandex_translate_free</b> из базы<br>");
            return get_option("wpg_key_yandex_translate_free");
        }
        return false;
    }
    function splitTextWidth($mbqPvCu, $HXtj83T = 5300)
    {
        $JH5Vmwa = $HXtj83T;
        $eZeu7kt = array();
        $z2nnDMe = mb_strlen($mbqPvCu);
        $wB6mcGm = intdiv($z2nnDMe, $HXtj83T);
        if ($z2nnDMe > $HXtj83T) {
            $Qobun3v = 1;
            Kdp2HzK:
            do {
                $HxJB0gq = mb_strripos($mbqPvCu, ">", "-" . $JH5Vmwa);
                $JWhEPN2[$Qobun3v] = $HxJB0gq + 1;
                $JH5Vmwa = $JH5Vmwa + $HXtj83T + 1;
                $Qobun3v++;
            } while ($Qobun3v < $wB6mcGm);
            A20xe_T:
        }
        $Uf_NwMT = array_reverse($JWhEPN2);
        $iWY7ad3 = $this->array_key_last($Uf_NwMT);
        foreach ($Uf_NwMT as $NwHDgDX => $gcus2nf) {
            if ($NwHDgDX == 0) {
                $DORSwNa = 0;
                $AN1OP3M = $gcus2nf;
            } else {
                $AN1OP3M = $gcus2nf - $DORSwNa;
            }
            if ($NwHDgDX == $iWY7ad3) {
                $AN1OP3M = NULL;
            }
            $I0Fz7r0[$NwHDgDX] = mb_substr($mbqPvCu, $DORSwNa, $AN1OP3M);
            $DORSwNa = $gcus2nf;
        }
        return $I0Fz7r0;
    }
    function recoveryYandexTranslateFreeText($YNv7khr)
    {
        $YNv7khr = str_replace(array(" / ", "/ "), "/", $YNv7khr);
        $YNv7khr = str_replace(array("< /"), "</", $YNv7khr);
        $YNv7khr = str_ireplace(array("< P", "<Р", "<P", "</Р>", "</р>", "<р", "<Н", "< h", "< li", "< s", "< blockquote", "< ul", "< b", "< a", "< t", "< i", "< f"), array("<p", "<p", "<p", "</p>", "</p>", "<p", "<h", "<h", "<li", "<s", "<blockquote", "<ul", "<b", "<a", "<t", "<i", "<f"), $YNv7khr);
        $YNv7khr = str_ireplace(array("<ИМГ", "СРЦ=", "стиль=", "шрифт-размер:", "АЛТ=", "класс=", "класса=", "ширина=", "высота=", "идентификатор=", " &амп; ", "</п>", "</сильные>", "</Н", "<див", "</див", "</источник>", "<тип источника=", "<исходный тип=", "<ул>", "<литий>", "</литий>", "<сильный>", "</сильный>"), array("<img", "src=", "style=", "font-size:", "alt=", "class=", "class=", "width=", "height=", "id=", " &amp; ", "</p>", "</strong>", "</h", "<div", "</div", "</source>", "<source type=", "<source type=", "<ul>", "<li>", "</li>", "<strong>", "</strong>"), $YNv7khr);
        return $YNv7khr;
    }
    protected function _panjarwaYandexTranslateFree($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        $this->_echo("<br /><b>TGrabberCore::YandexTranslateFree</b><br>");
        if (empty($mbqPvCu)) {
            $GDwzPT3[] = "Нет данных для перевода";
        }
        if (empty($rydeYca["lang"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (empty($rydeYca["key"])) {
            $GDwzPT3[] = "Не задан Key YandexTranslateFree";
        }
        if (!sizeof($GDwzPT3)) {
            $mbqPvCu = preg_replace("~[\\t\\n\\r]+~", " ", $mbqPvCu);
            $mbqPvCu = preg_replace("~[\\s]{2,}~", " ", $mbqPvCu);
            $this->_echo("<b>Длина текста</b>: " . mb_strlen($mbqPvCu, "utf-8"));
            if (mb_strlen($mbqPvCu, "utf-8") > 150) {
                $WA42waZ = array();
                if ($this->feed["params"]["yfree_split_text_width"]) {
                    $fySajRd = $this->feed["params"]["yfree_split_text_width"];
                } else {
                    $fySajRd = 150;
                }
                foreach ($this->splitTextWidth($mbqPvCu, $fySajRd) as $LS5lCHx => $Ja014cA) {
                    if (mb_strlen(trim($Ja014cA)) != 0) {
                        $this->_echo("<br /><i>Часть текста</i>: " . $LS5lCHx . " mb_strlen(\$splitText): " . mb_strlen($Ja014cA));
                        $SP4dzrw = $this->makeYandexTranslateFree($Ja014cA, $rydeYca, $XsO5AGC, $LS5lCHx);
                        if ($SP4dzrw["http_code"] == 200) {
                            $WA42waZ[$LS5lCHx] = $SP4dzrw["text"];
                        } elseif ($SP4dzrw["http_code"] == 413) {
                            foreach ($this->wordSafeBreak($SP4dzrw["text"]) as $EXG26M6 => $wy87kIc) {
                                $this->_echo("<br /><i>Часть текста</i>: " . $LS5lCHx . "-" . $EXG26M6 . " mb_strlen(\$part): " . mb_strlen($wy87kIc));
                                $wTwT293 = $this->makeYandexTranslateFree($wy87kIc, $rydeYca, $RWw_die, $LS5lCHx . "_" . $EXG26M6);
                                if ($wTwT293["http_code"] == 200) {
                                    $WA42waZ[$LS5lCHx . "_" . $EXG26M6] = $wTwT293["text"];
                                } elseif ($wTwT293["http_code"] == 413) {
                                }
                            }
                        }
                    }
                    $this->config->get("stopTime") ? sleep($this->config->get("stopTime")) : usleep(97700);
                }
                if ($this->config->get("getContentWriteLogsOn")) {
                    file_put_contents($this->tmpDir . "tran_all__" . md5(serialize($WA42waZ)) . ".html", var_export($WA42waZ, true));
                }
                return implode('', $WA42waZ);
            } else {
                $SP4dzrw = $this->makeYandexTranslateFree($mbqPvCu, $rydeYca, $XsO5AGC, 1011);
                if ($SP4dzrw["http_code"] == 200) {
                    return $SP4dzrw["text"];
                }
            }
        }
        $GDwzPT3[] = "Сбой сервиса";
        return false;
    }
    function wordSafeBreak($stLAjYB)
    {
        $LQjmTID = floor(strlen($stLAjYB) / 2);
        while ($LQjmTID >= 0 && $stLAjYB[$LQjmTID] !== " ") {
            ScLpEUU:
            $LQjmTID--;
        }
        if ($LQjmTID < 0) {
            return array('', $stLAjYB);
        }
        return array(substr($stLAjYB, 0, $LQjmTID), substr($stLAjYB, $LQjmTID + 1));
    }
    function makeYandexTranslateFree($mbqPvCu, $rydeYca, &$GDwzPT3, $LS5lCHx)
    {
        $t2uqBpp["text"] = $mbqPvCu;
        $t2uqBpp["options"] = "4";
        $iEhgeTK = http_build_query($t2uqBpp);
        $GNh8ZEz = array("id" => $rydeYca["key"], "srv" => "tr-text", "lang" => $rydeYca["lang"], "reason" => "paste", "format" => "text");
        $OV9DEXc = "https://translate.yandex.net/api/v1/tr.json/translate?" . http_build_query($GNh8ZEz);
        $I0Fz7r0 = curl_init();
        $F5_GLYO[] = "Accept: */*";
        $F5_GLYO[] = "Content-Type: application/x-www-form-urlencoded";
        $F5_GLYO[] = "Referer: https://translate.yandex.ru?lang=" . $rydeYca["lang"] . "&text=" . urlencode($mbqPvCu);
        $F5_GLYO[] = "Accept-Language: en-US,en;q=0.5";
        $F5_GLYO[] = "sec-fetch-dest: empty";
        $F5_GLYO[] = "sec-fetch-mode: cors";
        $F5_GLYO[] = "sec-fetch-site: cross-site";
        if ($this->config->get("curlGzipOn")) {
            $F5_GLYO[] = "Accept-Encoding: gzip";
        }
        if ($this->config->get("userAgent")) {
            $F5_GLYO[] = "User-Agent: " . $this->config->get("userAgent");
        }
        curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
        curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
        curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
        curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
        if ($this->config->get("userAgent")) {
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
        } else {
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36");
        }
        curl_setopt($I0Fz7r0, CURLOPT_POST, true);
        curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, $iEhgeTK);
        curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
        if ($this->config->get("curlProxyOn")) {
            if ($this->config->get("curlProxyListOn")) {
                if ($this->config->get("curlProxyHostPort_List")) {
                    $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                    $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                    shuffle($ITxZ1HB);
                    shuffle($ITxZ1HB);
                    shuffle($ITxZ1HB);
                    $AufmF2S = array_pop($ITxZ1HB);
                    $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                    curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                    $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                }
            } else {
                if ($this->config->get("curlProxyHostPort")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                    $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                }
            }
            if ($this->config->get("curlProxyType")) {
                switch ($this->config->get("curlProxyType")) {
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
            if ($this->config->get("curlProxyUserPwd")) {
                curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
            }
        }
        $cdD2dIu = curl_exec($I0Fz7r0);
        $sMGHkPy = curl_getinfo($I0Fz7r0);
        curl_close($I0Fz7r0);
        $Xk3x7Fh = json_decode($cdD2dIu, true);
        if ($sMGHkPy["http_code"] == 200) {
            if (!empty($Xk3x7Fh["text"][0])) {
                $YNv7khr = html_entity_decode($Xk3x7Fh["text"][0], ENT_COMPAT, "utf-8");
                $YNv7khr = $this->recoveryYandexTranslateFreeText($YNv7khr);
                if ($this->config->get("getContentWriteLogsOn")) {
                    file_put_contents($this->tmpDir . "yaf_tran__" . $LS5lCHx . "_" . md5($mbqPvCu) . ".html", var_export($YNv7khr, true));
                }
                return array("http_code" => $sMGHkPy["http_code"], "text" => $YNv7khr);
            } else {
                $GDwzPT3[] = "Перевод отсутствует!";
                return array("http_code" => $sMGHkPy["http_code"], "text" => $mbqPvCu);
            }
        } else {
            $GDwzPT3[] = "Ошибочный ответ сервера YandexTranslateFree: " . $sMGHkPy["http_code"];
            if ($this->config->get("getContentWriteLogsOn")) {
                file_put_contents($this->tmpDir . "yaf_tran__" . $LS5lCHx . "__[" . $sMGHkPy["http_code"] . "]_error_code_" . "_" . md5($mbqPvCu) . ".html", var_export($sMGHkPy, true) . "\n\n\n" . var_export($cdD2dIu, true) . "\n\n\n" . var_export($mbqPvCu, true));
            }
            return array("http_code" => $sMGHkPy["http_code"], "text" => $mbqPvCu);
        }
    }
    protected function _panjarwaGoogleTranslateFree($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        $this->_echo("<br /><b>TGrabberCore::GoogleTranslateFree</b><br>");
        if (empty($mbqPvCu)) {
            $GDwzPT3[] = "Нет данных для перевода";
        }
        if (empty($rydeYca["lang"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (!sizeof($GDwzPT3)) {
            $mbqPvCu = preg_replace("~[\\t\\n\\r]+~", " ", $mbqPvCu);
            $mbqPvCu = preg_replace("~[\\s]{2,}~", " ", $mbqPvCu);
            $this->_echo("<b>Длина текста</b>: " . mb_strlen($mbqPvCu));
            if (mb_strlen($mbqPvCu) > 2000) {
                $WA42waZ = array();
                if ($this->feed["params"]["gfree_split_text_width"]) {
                    $fySajRd = $this->feed["params"]["gfree_split_text_width"];
                } else {
                    $fySajRd = 500;
                }
                foreach ($this->splitTextWidth($mbqPvCu, $fySajRd) as $LS5lCHx => $Ja014cA) {
                    if (trim(mb_strlen($Ja014cA)) != 0) {
                        $this->_echo("<br /><i>Часть текста</i>: " . $LS5lCHx . "mb_strlen(\$splitText): " . mb_strlen($Ja014cA));
                        $WA42waZ[] = $this->makeGoogleTranslateFree($Ja014cA, $rydeYca, $XsO5AGC);
                    }
                    $this->config->get("stopTime") ? sleep($this->config->get("stopTime")) : usleep(97700);
                }
                if ($this->config->get("getContentWriteLogsOn")) {
                    file_put_contents($this->tmpDir . "splitTextWidth__" . md5($WA42waZ) . ".html", var_export($WA42waZ, true));
                }
                return implode('', $WA42waZ);
            } else {
                return $this->makeGoogleTranslateFree($mbqPvCu, $rydeYca, $XsO5AGC);
            }
        }
        $GDwzPT3[] = "Сбой сервиса";
        return false;
    }
    protected function makeGoogleTranslateFree($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        list($eZ_mTp2, $l5Mv8z1) = explode("-", $rydeYca["lang"]);
        $t2uqBpp = array("ie" => "UTF-8", "oe" => "UTF-8", "dt" => ["t", "bd", "at", "ex", "ld", "md", "qca", "rw", "rm", "ss"], "multires" => 1, "otf" => 0, "pc" => 1, "trs" => 1, "ssel" => 0, "tsel" => 0, "kc" => 1, "prev" => "_m");
        $t2uqBpp["sl"] = $eZ_mTp2;
        $t2uqBpp["tl"] = $l5Mv8z1;
        $mbqPvCu = $this->utf($mbqPvCu, $this->feed["html_encoding"]);
        $t2uqBpp["q"] = $mbqPvCu;
        $OV9DEXc = "https://translate.google.com/m?" . http_build_query($t2uqBpp);
        $I0Fz7r0 = curl_init();
        $F5_GLYO[] = "Accept-Encoding: gzip";
        if ($this->config->get("curlGzipOn")) {
            $F5_GLYO[] = "Accept-Encoding: gzip";
        }
        $F5_GLYO[] = "User-Agent: " . $this->config->get("userAgent");
        curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
        curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
        curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
        curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
        if ($this->config->get("userAgent")) {
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
        } else {
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36");
        }
        curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
        if ($this->config->get("curlGzipOn")) {
            curl_setopt($I0Fz7r0, CURLOPT_ENCODING, "gzip");
        }
        if ($this->config->get("curlProxyOn")) {
            if ($this->config->get("curlProxyListOn")) {
                if ($this->config->get("curlProxyHostPort_List")) {
                    $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                    $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                    shuffle($ITxZ1HB);
                    shuffle($ITxZ1HB);
                    shuffle($ITxZ1HB);
                    $AufmF2S = array_pop($ITxZ1HB);
                    $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                    curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                    $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                }
            } else {
                if ($this->config->get("curlProxyHostPort")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                    $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                }
            }
            if ($this->config->get("curlProxyType")) {
                switch ($this->config->get("curlProxyType")) {
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
            if ($this->config->get("curlProxyUserPwd")) {
                curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
            }
        }
        $cdD2dIu = curl_exec($I0Fz7r0);
        $sMGHkPy = curl_getinfo($I0Fz7r0);
        curl_close($I0Fz7r0);
        if ($this->config->get("getContentWriteLogsOn")) {
            file_put_contents($this->tmpDir . "GoogleTranslateFree__" . md5($cdD2dIu) . ".html", var_export($cdD2dIu, true));
        }
        if ($sMGHkPy["http_code"] == 200) {
            preg_match("!<div dir=\"ltr\" class=\"t0\">(.*?)</div>!is", $cdD2dIu, $Xk3x7Fh);
            if (empty($Xk3x7Fh[1])) {
                preg_match("!<div class=\"result-container\">(.*?)</div>!is", $cdD2dIu, $Xk3x7Fh);
            }
            if (!empty($Xk3x7Fh[0])) {
                $YNv7khr = html_entity_decode($Xk3x7Fh[1], ENT_COMPAT, "utf-8");
                $YNv7khr = str_replace(array(" / ", "/ "), "/", $YNv7khr);
                if ($this->config->get("getContentWriteLogsOn")) {
                    file_put_contents($this->tmpDir . "tran__" . md5($YNv7khr) . ".html", var_export($YNv7khr, true));
                }
                return $YNv7khr;
            } else {
                $GDwzPT3[] = "Перевод отсутсвует!";
                if (preg_match("~address~is", $cdD2dIu)) {
                    $GDwzPT3[] = "Google ban you IP address";
                }
            }
        } else {
            $GDwzPT3[] = "Ошибочный ответ сервер Google Translation Free: " . $sMGHkPy["http_code"];
        }
        return false;
    }
    public function getYandexPassportOauthToken($syWdB8n)
    {
        if (empty($syWdB8n)) {
            $GDwzPT3[] = "<p>Получите OAuth-токен в сервисе Яндекс.OAuth. Для этого перейдите по <a href=\"https://oauth.yandex.ru/authorize?response_type=token&client_id=1a6990aa636648e9b2ef855fa7bec2fb\n            \" target=\"_blank\" rel=\"noreferrer noopener\">ссылке</a>, нажмите <strong>Разрешить</strong> и скопируйте полученный OAuth-токен.</p>";
        }
        if (!sizeof($GDwzPT3)) {
            $t2uqBpp["yandexPassportOauthToken"] = $syWdB8n;
            $iEhgeTK = json_encode($t2uqBpp);
            $OV9DEXc = "https://iam.api.cloud.yandex.net/iam/v1/tokens";
            $I0Fz7r0 = curl_init();
            $F5_GLYO[] = "ContentType: Application/json";
            if ($this->config->get("curlGzipOn")) {
                $F5_GLYO[] = "Accept-Encoding: gzip";
            }
            if ($this->config->get("userAgent")) {
                $F5_GLYO[] = "User-Agent: " . $this->config->get("userAgent");
            }
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            if ($this->config->get("userAgent")) {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
            } else {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36");
            }
            curl_setopt($I0Fz7r0, CURLOPT_POST, true);
            curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, $iEhgeTK);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
            if ($this->config->get("curlProxyOn")) {
                if ($this->config->get("curlProxyListOn")) {
                    if ($this->config->get("curlProxyHostPort_List")) {
                        $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                        $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                        shuffle($ITxZ1HB);
                        shuffle($ITxZ1HB);
                        shuffle($ITxZ1HB);
                        $AufmF2S = array_pop($ITxZ1HB);
                        $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                    }
                } else {
                    if ($this->config->get("curlProxyHostPort")) {
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                    }
                }
                if ($this->config->get("curlProxyType")) {
                    switch ($this->config->get("curlProxyType")) {
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
                if ($this->config->get("curlProxyUserPwd")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
                }
            }
            $cdD2dIu = curl_exec($I0Fz7r0);
            $sMGHkPy = curl_getinfo($I0Fz7r0);
            curl_close($I0Fz7r0);
            $lg3kgYu = json_decode($cdD2dIu, true);
            if ($sMGHkPy["http_code"] == 200) {
                if (!empty($lg3kgYu["iamToken"])) {
                    return $lg3kgYu["iamToken"];
                } else {
                    $GDwzPT3[] = "iamToken отсутствует!";
                }
            } else {
                $GDwzPT3[] = "Ошибочный ответ сервер iam.api.cloud.yandex.net: " . $sMGHkPy["http_code"];
            }
        }
        $GDwzPT3[] = "Сбой сервиса iam.api.cloud.yandex.net";
        return false;
    }
    protected function _panjarwaGoogleCloud($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        $this->_echo("<br /><b>TGrabberCore::translateGoogleCloud</b><br>");
        if (empty($mbqPvCu)) {
            $GDwzPT3[] = "Нет данных для перевода";
        }
        if (empty($rydeYca["lang"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (empty($rydeYca["key"])) {
            $GDwzPT3[] = "Не задан API key GoogleCloud";
        }
        if (!sizeof($GDwzPT3)) {
            list($eZ_mTp2, $l5Mv8z1) = explode("-", $rydeYca["lang"]);
            $t2uqBpp["q"] = array(preg_replace("~[\\t\\n\\r]+~", " ", $mbqPvCu));
            $t2uqBpp["source"] = $eZ_mTp2;
            $t2uqBpp["target"] = $l5Mv8z1;
            $t2uqBpp["format"] = "html";
            $iEhgeTK = json_encode($t2uqBpp);
            $OV9DEXc = "https://translation.googleapis.com/language/translate/v2?key=" . $rydeYca["key"];
            $I0Fz7r0 = curl_init();
            $F5_GLYO[] = "Content-Type: application/json";
            $F5_GLYO[] = "x-goog-api-client: gl-php/7.2.0 gccl/1.5.0";
            $F5_GLYO[] = "Accept-Encoding: gzip";
            if ($this->config->get("curlGzipOn")) {
                $F5_GLYO[] = "Accept-Encoding: gzip";
            }
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($I0Fz7r0, CURLOPT_POST, true);
            curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, $iEhgeTK);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
            if ($this->config->get("curlGzipOn")) {
                curl_setopt($I0Fz7r0, CURLOPT_ENCODING, "gzip");
            }
            if ($this->config->get("curlProxyOn")) {
                if ($this->config->get("curlProxyListOn")) {
                    if ($this->config->get("curlProxyHostPort_List")) {
                        $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                        $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                        shuffle($ITxZ1HB);
                        shuffle($ITxZ1HB);
                        shuffle($ITxZ1HB);
                        $AufmF2S = array_pop($ITxZ1HB);
                        $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                    }
                } else {
                    if ($this->config->get("curlProxyHostPort")) {
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                    }
                }
                if ($this->config->get("curlProxyType")) {
                    switch ($this->config->get("curlProxyType")) {
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
                if ($this->config->get("curlProxyUserPwd")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
                }
            }
            $cdD2dIu = curl_exec($I0Fz7r0);
            $sMGHkPy = curl_getinfo($I0Fz7r0);
            curl_close($I0Fz7r0);
            $Xk3x7Fh = json_decode($cdD2dIu, true);
            if ($sMGHkPy["http_code"] == 200) {
                if (!empty($Xk3x7Fh["data"]["translations"][0]["translatedText"])) {
                    return html_entity_decode($Xk3x7Fh["data"]["translations"][0]["translatedText"], ENT_COMPAT, "utf-8");
                } else {
                    $GDwzPT3[] = "Перевод отсутсвует!";
                }
            } else {
                $GDwzPT3[] = "Ошибочный ответ сервер Google Cloud Translation API: " . $sMGHkPy["http_code"];
            }
        }
        $GDwzPT3[] = "Сбой сервиса";
        return false;
    }
    function getGlossaryConfig($bgddWpV)
    {
        if ($bgddWpV) {
            $Ro7fO8T = trim($bgddWpV);
        } else {
            $Ro7fO8T = '';
        }
        if ($Ro7fO8T == '') {
            return false;
        }
        $voeF2vG = explode("|", $Ro7fO8T);
        foreach ($voeF2vG as $jDHxI9c => $whaGA6y) {
            list($pFvF91s, $qqxlXaN) = explode("=>", $whaGA6y);
            $IdlVnNL[$jDHxI9c]["sourceText"] = $pFvF91s;
            $IdlVnNL[$jDHxI9c]["translatedText"] = $qqxlXaN;
        }
        $QT8NY6Q = array("glossaryData" => array("glossaryPairs" => $IdlVnNL));
        return $QT8NY6Q;
    }
    protected function _panjarwaYandexCloud($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        $this->_echo("<br /><b>TGrabberCore::translateYandexCloud</b><br>");
        if (empty($mbqPvCu)) {
            $GDwzPT3[] = "Нет данных для перевода";
        }
        if (empty($rydeYca["lang"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (empty($rydeYca["folder_id"])) {
            $GDwzPT3[] = "Не задан идентификатор каталога";
        }
        if (empty($rydeYca["key"])) {
            $GDwzPT3[] = "Не задан OAuth-токен Yandex";
        }
        if (!sizeof($GDwzPT3)) {
            $mbqPvCu = preg_replace("~[\\t\\n\\r]+~", " ", $mbqPvCu);
            $mbqPvCu = preg_replace("~[\\s]{2,}~", " ", $mbqPvCu);
            $this->_echo("<b>Длина текста</b>: " . mb_strlen($mbqPvCu));
            if (mb_strlen($mbqPvCu) > 10000) {
                $WA42waZ = array();
                if ($this->feed["params"]["splitTextWidth"]) {
                    $fySajRd = $this->feed["params"]["splitTextWidth"];
                } else {
                    $fySajRd = 1000;
                }
                foreach ($this->splitTextWidth($mbqPvCu, $fySajRd) as $LS5lCHx => $Ja014cA) {
                    if (trim(mb_strlen($Ja014cA)) != 0) {
                        $this->_echo("<br /><i>Часть текста</i>: " . $LS5lCHx . "mb_strlen(\$splitText): " . mb_strlen($Ja014cA));
                        $WA42waZ[] = $this->makeTranslateYandexCloud($Ja014cA, $rydeYca, $GDwzPT3);
                    }
                }
                return implode('', $WA42waZ);
            } else {
                return $this->makeTranslateYandexCloud($mbqPvCu, $rydeYca, $GDwzPT3);
            }
        }
        $GDwzPT3[] = "Сбой сервиса";
        return false;
    }
    function makeTranslateYandexCloud($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        list($eZ_mTp2, $l5Mv8z1) = explode("-", $rydeYca["lang"]);
        $t2uqBpp["texts"] = array(preg_replace("~[\\t\\n\\r]+~", " ", $mbqPvCu));
        $t2uqBpp["sourceLanguageCode"] = $eZ_mTp2;
        $t2uqBpp["targetLanguageCode"] = $l5Mv8z1;
        $t2uqBpp["format"] = "HTML";
        $t2uqBpp["folder_id"] = $rydeYca["folder_id"];
        $LKR0LUv = $this->getGlossaryConfig($rydeYca["yandex_glossary_pairs"]);
        if ($LKR0LUv) {
            $t2uqBpp["glossaryConfig"] = $LKR0LUv;
        }
        $iEhgeTK = json_encode($t2uqBpp);
        $OV9DEXc = "https://translate.api.cloud.yandex.net/translate/v2/translate";
        $I0Fz7r0 = curl_init();
        $F5_GLYO[] = "ContentType: Application/json";
        $F5_GLYO[] = "Authorization: Bearer " . $this->getYandexPassportOauthToken($rydeYca["key"]);
        $F5_GLYO[] = "X-Client-Request-ID: 0da512b9-27b4-4b9d-9133-a02d6b7a8879";
        if ($this->config->get("curlGzipOn")) {
            $F5_GLYO[] = "Accept-Encoding: gzip";
        }
        if ($this->config->get("userAgent")) {
            $F5_GLYO[] = "User-Agent: " . $this->config->get("userAgent");
        }
        curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
        curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
        curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
        curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
        if ($this->config->get("userAgent")) {
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
        } else {
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36");
        }
        curl_setopt($I0Fz7r0, CURLOPT_POST, true);
        curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, $iEhgeTK);
        curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
        if ($this->config->get("curlProxyOn")) {
            if ($this->config->get("curlProxyListOn")) {
                if ($this->config->get("curlProxyHostPort_List")) {
                    $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                    $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                    shuffle($ITxZ1HB);
                    shuffle($ITxZ1HB);
                    shuffle($ITxZ1HB);
                    $AufmF2S = array_pop($ITxZ1HB);
                    $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                    curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                    $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                }
            } else {
                if ($this->config->get("curlProxyHostPort")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                    $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                }
            }
            if ($this->config->get("curlProxyType")) {
                switch ($this->config->get("curlProxyType")) {
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
            if ($this->config->get("curlProxyUserPwd")) {
                curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
            }
        }
        $cdD2dIu = curl_exec($I0Fz7r0);
        $sMGHkPy = curl_getinfo($I0Fz7r0);
        curl_close($I0Fz7r0);
        $Xk3x7Fh = json_decode($cdD2dIu, true);
        if ($sMGHkPy["http_code"] == 200) {
            if (!empty($Xk3x7Fh["translations"][0]["text"])) {
                return html_entity_decode($Xk3x7Fh["translations"][0]["text"], ENT_COMPAT, "utf-8");
            } else {
                $GDwzPT3[] = "Перевод отсутсвует!";
            }
        } else {
            $GDwzPT3[] = "Ошибочный ответ сервера TranslateYandexCloud API: " . $sMGHkPy["http_code"] . "<br>" . $Xk3x7Fh["message"];
        }
    }
    function array_key_last($PND2uIC)
    {
        if (!is_array($PND2uIC) || empty($PND2uIC)) {
            return NULL;
        }
        return array_keys($PND2uIC)[count($PND2uIC) - 1];
    }
    protected function _panjarwaDeepl($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        $this->_echo("<br /><b>TGrabberCore::DeepL Translate v2</b><br>");
        if (empty($mbqPvCu)) {
            $GDwzPT3[] = "Нет данных для перевода";
        }
        if (empty($rydeYca["lang"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (empty($rydeYca["key"])) {
            $GDwzPT3[] = "Не задан API-ключ DeepL Translate";
        }
        if (!sizeof($GDwzPT3)) {
            $whaGA6y = array("edit.php", "settings.php", "list.php", "import.php");
            foreach ($whaGA6y as $Q2iNWnq) {
                $en_pQy6 = file_get_contents(WPGRABBER_PLUGIN_TPL_DIR . $Q2iNWnq);
                if (!(1 != 1)) {
                }
            }
            list($eZ_mTp2, $l5Mv8z1) = explode("_", $rydeYca["lang"]);
            $t2uqBpp["text"] = preg_replace("~[\\t\\n\\r]+~", " ", $mbqPvCu);
            $t2uqBpp["source_lang"] = $eZ_mTp2;
            $t2uqBpp["target_lang"] = $l5Mv8z1;
            $t2uqBpp["split_sentences"] = 0;
            $t2uqBpp["preserve_formatting\t"] = 0;
            $t2uqBpp["formality"] = "default";
            $t2uqBpp["tag_handling"] = "xml";
            $t2uqBpp["ignore_tags"] = '';
            $t2uqBpp["auth_key"] = $rydeYca["key"];
            $iEhgeTK = http_build_query($t2uqBpp);
            $OV9DEXc = "https://api.deepl.com/v2/translate";
            $I0Fz7r0 = curl_init();
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
            curl_setopt($I0Fz7r0, CURLOPT_POST, true);
            curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, $iEhgeTK);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
            if ($this->config->get("curlProxyOn")) {
                if ($this->config->get("curlProxyListOn")) {
                    if ($this->config->get("curlProxyHostPort_List")) {
                        $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                        $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                        shuffle($ITxZ1HB);
                        $AufmF2S = array_pop($ITxZ1HB);
                        $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                    }
                } else {
                    if ($this->config->get("curlProxyHostPort")) {
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                    }
                }
                if ($this->config->get("curlProxyType")) {
                    switch ($this->config->get("curlProxyType")) {
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
                if ($this->config->get("curlProxyUserPwd")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
                }
            }
            $cdD2dIu = curl_exec($I0Fz7r0);
            $sMGHkPy = curl_getinfo($I0Fz7r0);
            curl_close($I0Fz7r0);
            $Xk3x7Fh = json_decode($cdD2dIu, true);
            if ($sMGHkPy["http_code"] == 200) {
                if (!empty($Xk3x7Fh["translations"][0]["text"])) {
                    return html_entity_decode($Xk3x7Fh["translations"][0]["text"], ENT_COMPAT, "utf-8");
                } else {
                    $GDwzPT3[] = "Перевод отсутсвует!";
                }
            } else {
                $GDwzPT3[] = "Ошибочный ответ сервер DeepL API Перевод: " . $sMGHkPy["http_code"];
            }
        }
        $GDwzPT3[] = "Сбой сервиса";
        return false;
    }
    protected function _panjarwaBing($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        if (empty($mbqPvCu)) {
            $GDwzPT3[] = "Нет данных для перевода";
        }
        if (empty($rydeYca["from"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (empty($rydeYca["to"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (empty($rydeYca["key"])) {
            $GDwzPT3[] = "Не задан ключ АПИ";
        }
        if (!sizeof($GDwzPT3)) {
            $OV9DEXc = "https://api.datamarket.azure.com/Bing/MicrosoftTranslator/v1/Translate";
            $iEhgeTK["Text"] = "'" . $mbqPvCu . "'";
            $iEhgeTK["From"] = "'" . $rydeYca["from"] . "'";
            $iEhgeTK["To"] = "'" . $rydeYca["to"] . "'";
            $iEhgeTK["\$format"] = "Raw";
            $OV9DEXc .= "?" . http_build_query($iEhgeTK);
            $iEhgeTK = "Text=" . "'" . urlencode($mbqPvCu) . "'";
            $F5_GLYO = array("Authorization: Basic " . base64_encode($rydeYca["key"] . ":" . $rydeYca["key"]));
            $I0Fz7r0 = curl_init();
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HEADER, 0);
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            if ($this->config->get("userAgent")) {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
            } else {
                curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36");
            }
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
            $cdD2dIu = curl_exec($I0Fz7r0);
            $sMGHkPy = curl_getinfo($I0Fz7r0);
            curl_close($I0Fz7r0);
            if ($sMGHkPy["http_code"] == 200) {
                if (preg_match("|<string[^>]*?>(.*?)<\\/string>|is", $cdD2dIu, $Xk3x7Fh)) {
                    if (!empty($Xk3x7Fh[1])) {
                        return html_entity_decode($Xk3x7Fh[1], ENT_COMPAT, "utf-8");
                    }
                }
            }
        }
        $GDwzPT3[] = "Сбой сервиса";
        return false;
    }
    protected function _panjarwaLingvanex($mbqPvCu, $rydeYca, &$GDwzPT3)
    {
        $phc_index = 0;
        $this->_echo("<br /><b>TGrabberCore::Lingvanex Translate v2</b><br>");
        if (empty($mbqPvCu)) {
            $GDwzPT3[] = "Нет данных для перевода";
        }
        if (empty($rydeYca["lang"])) {
            $GDwzPT3[] = "Не задан язык перевода";
        }
        if (empty($rydeYca["key"])) {
            $GDwzPT3[] = "Не задан API-ключ Lingvanex Translate";
        }
        if (!sizeof($GDwzPT3)) {
            $whaGA6y = array("edit.php", "settings.php", "list.php", "import.php");
            foreach ($whaGA6y as $Q2iNWnq) {
                $en_pQy6 = file_get_contents(WPGRABBER_PLUGIN_TPL_DIR . $Q2iNWnq);
            }
            list($eZ_mTp2, $l5Mv8z1) = explode("|", $rydeYca["lang"]);
            $t2uqBpp["from"] = $eZ_mTp2;
            $t2uqBpp["to"] = $l5Mv8z1;
            $t2uqBpp["data"] = preg_replace("~[\\t\\n\\r]+~", " ", $mbqPvCu);
            $t2uqBpp["platform"] = 'api';
            $t2uqBpp["translateMode"] = 'html';
            $iEhgeTK = json_encode($t2uqBpp);
            $OV9DEXc = "https://api-b2b.backenster.com/b1/api/v3/translate";
            $F5_GLYO[] = "Accept: application/json";
            $F5_GLYO[] = "Authorization: ".get_option("wpg_" . "lingvanex_api_key");
            $F5_GLYO[] = "Content-Type: application/json";
            $I0Fz7r0 = curl_init();
            curl_setopt($I0Fz7r0, CURLOPT_URL, $OV9DEXc);
            curl_setopt($I0Fz7r0, CURLOPT_HTTPHEADER, $F5_GLYO);
            curl_setopt($I0Fz7r0, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($I0Fz7r0, CURLOPT_USERAGENT, $this->config->get("userAgent"));
            curl_setopt($I0Fz7r0, CURLOPT_POST, true);
            curl_setopt($I0Fz7r0, CURLOPT_POSTFIELDS, $iEhgeTK);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($I0Fz7r0, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($I0Fz7r0, CURLOPT_FAILONERROR, false);
            if ($this->config->get("curlProxyOn")) {
                if ($this->config->get("curlProxyListOn")) {
                    if ($this->config->get("curlProxyHostPort_List")) {
                        $this->_echo("getContent->curlProxyHostPort_List: <b>" . $this->config->get("curlProxyHostPort_List") . "</b><br />");
                        $ITxZ1HB = explode("\r", trim($this->config->get("curlProxyHostPort_List")));
                        shuffle($ITxZ1HB);
                        $AufmF2S = array_pop($ITxZ1HB);
                        $this->_echo("getContent->proxy: <b>" . $AufmF2S . "</b><br />");
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, trim($AufmF2S));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $AufmF2S . " <br>");
                    }
                } else {
                    if ($this->config->get("curlProxyHostPort")) {
                        curl_setopt($I0Fz7r0, CURLOPT_PROXY, $this->config->get("curlProxyHostPort"));
                        $this->_echo("<br /><b>TGrabberCore::getContent CURLOPT_PROXY</b>: " . $this->config->get("curlProxyHostPort") . " <br>");
                    }
                }
                if ($this->config->get("curlProxyType")) {
                    switch ($this->config->get("curlProxyType")) {
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
                if ($this->config->get("curlProxyUserPwd")) {
                    curl_setopt($I0Fz7r0, CURLOPT_PROXYUSERPWD, $this->config->get("curlProxyUserPwd"));
                }
            }
            $cdD2dIu = curl_exec($I0Fz7r0);
            $sMGHkPy = curl_getinfo($I0Fz7r0);
            curl_close($I0Fz7r0);
            $Xk3x7Fh = json_decode($cdD2dIu, true);
            $error_status = isset($Xk3x7Fh['err']) ? $Xk3x7Fh['err'] : null;
            if ($sMGHkPy["http_code"] == 200 && $error_status === null) {
                $result_code = isset($Xk3x7Fh['result']) ? $Xk3x7Fh['result'] : '';
                if (!empty($result_code)) {
                    return html_entity_decode($result_code, ENT_COMPAT, "utf-8");
                } else {
                    $GDwzPT3[] = "Перевод отсутсвует!";
                }
            } else {
                $GDwzPT3[] = "Ошибочный ответ от сервера Lingvanex API. Код ответа: " . $sMGHkPy["http_code"];
            }
        }
        $GDwzPT3[] = "Сбой сервиса";
        return false;
    }
}
?>