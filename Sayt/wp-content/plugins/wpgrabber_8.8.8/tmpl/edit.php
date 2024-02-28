<style>
    .update-nag
    {
        display:none !important;
    }

    .button-panel {
        padding-top: 30px;
        padding-left: 10px;
        border-top: 1px solid #cacaca;
        margin-top: 30px;
    }

    .button-panel p.submit {
        float: left;
        margin-right: 10px;
        padding: 0px;
        margin: 0px;
        margin-right: 10px;
    }

    .button-panel input.button {
        margin-right: 10px;
        float: left;
        display: block;
    }

    div.tab-content {
        display: none;
        padding: 5px;
        padding-top: 20px;
    }

    .tab-content-table tr td, .tab-content-table tr th {
        padding-top: 3px;
        padding-bottom: 3px;
    }

    div.tab-content fieldset {
        padding: 10px;
        border: 1px solid #cacaca;
        margin-top: 15px;
    }

    div.tab-content fieldset legend {
        font-weight: bold;
    }
</style>
<?php
if($_GET['id']) {     $isNew = False; } else {     $isNew = True; }
#print_r($_GET);
?>
<div class="wrap">
    <form method="post" id="editForm" action="?page=wpgrabber-index&action=Save">
        <div id="icon-edit" class="icon32"></div>
        <h3>WPGrabber > <?php  echo $isNew ? 'Новая лента *' : '#' . $_GET['id'];      ?> </h3><hr>
		
        <input type="hidden" name="tab" id="tab-active" value="<?php  echo $tab; ?>"/>
        <h2 class="nav-tab-wrapper">
            <a href="#tab1" id="tab1" class="nav-tab<?php
            echo $tab == 1 ? ' nav-tab-active' : '';            ?>">Основные</a>
            <a href="#tab2" id="tab2" class="nav-tab<?php
            echo $tab == 2 ? ' nav-tab-active' : '';            ?>">Контент</a>
            <a href="#tab3" id="tab3" class="nav-tab<?php
            echo $tab == 3 ? ' nav-tab-active' : '';            ?>">Картинки</a>
            <a href="#tab4" id="tab4" class="nav-tab<?php
            echo $tab == 4 ? ' nav-tab-active' : '';            ?>">Синонимизация</a>
            <a href="#tab5" id="tab5" class="nav-tab<?php
            echo $tab == 5 ? ' nav-tab-active' : '';            ?>">Перевод</a>
            <a href="#tab6" id="tab6" class="nav-tab<?php
            echo $tab == 6 ? ' nav-tab-active' : '';            ?>">Таксономия</a>
            <a href="#tab7" id="tab7" class="nav-tab<?php
            echo $tab == 7 ? ' nav-tab-active' : '';            ?>">Обработка</a>
            <a href="#tab8" id="tab8" class="nav-tab<?php
            echo $tab == 8 ? ' nav-tab-active' : '';            ?>">Вид</a>
            <a href="#tab9" id="tab9" class="nav-tab<?php
            echo $tab == 9 ? ' nav-tab-active' : '';            ?>">Дополнительно</a>
        </h2>
        <script>
            jQuery(document).ready(function ($) {
                $('.nav-tab-wrapper a').click(function () {
                    $('.nav-tab-wrapper a').attr('class', 'nav-tab');
                    $('.tab-content').hide();
                    $('#div_' + $(this).attr('id')).show();
                    $(this).attr('class', 'nav-tab nav-tab-active');
                    $('#tab-active').val($(this).attr('id').replace('tab', ''));
                });
            });
            function __get(id) {
                return document.getElementById(id);
            }
            function __hideEl(id) {
                document.getElementById(id).style.display = 'none';
            }
            function __showEl(id) {
                document.getElementById(id).style.display = '';
            }
            function __setFeedType(type) {
                if (type == 'html') {
                    __get('tr-rss_encoding').style.display = 'none';
                    __get('tr-html_encoding').style.display = '';
                    __get('span-url-rss').style.display = 'none';
                    __get('tr-title-words').style.display = 'none';
                    __get('span-url-html').style.display = 'inline';
                    __get('span-url-vk').style.display = 'none';
                    __get('span-title-vk').style.display = 'none';
                    __get('tr-link-tmpl').style.display = '';
                    __get('tr-autoIntroOn').style.display = '';
                    __get('tr-title').style.display = '';
                    __get('span-url-vkap').style.display = 'none';
                    __get('span-url-vkap2').style.display = 'none';
                    __get('tr-vk_title_len').style.display = 'none';
                    __get('tr-vk_profile_photo').style.display = 'none';
                    __get('tr-vk_title_addon').style.display = 'none';
                    __get('tr-vk_access_token').style.display = 'none';
                    __get('tr-vk_offset').style.display = 'none';
                    __get('tr-vk_count').style.display = 'none';
                    __get('tr-vk_filter').style.display = 'none';
                    __get('tr-vk_get_comments').style.display = 'none';
                    __get('tr-vk_del_emoji').style.display = 'none';
                }
                if (type == 'rss') {
                    <?php
                        if ($isNew)
                        {
                        ?>
                            __hideEl('tr-html_encoding');
                            __hideEl('tr-text_start');
                            __hideEl('tr-text_end');
                        <?php
                        }
                        ?>
                    __get('tr-html_encoding').style.display = '';
                    __get('tr-rss_encoding').style.display = '';
                    __get('tr-rss_textmod').style.display = '';
                    __get('span-url-html').style.display = 'none';
                    __get('tr-title-words').style.display = 'none';
                    __get('span-url-rss').style.display = 'inline';
                    __get('span-url-vk').style.display = 'none';
                    __get('tr-link-tmpl').style.display = 'none';
                    __get('span-title-vk').style.display = 'none';
                    __get('tr-autoIntroOn').style.display = 'none';
                    __get('tr-title').style.display = 'none';
                    __get('span-url-vkap').style.display = 'none';
                    __get('span-url-vkap2').style.display = 'none';
                    __get('tr-vk_title_len').style.display = 'none';
                    __get('tr-vk_profile_photo').style.display = 'none';
                    __get('tr-vk_title_addon').style.display = 'none';
                    __get('tr-vk_access_token').style.display = 'none';
                    __get('tr-vk_offset').style.display = 'none';
                    __get('tr-vk_count').style.display = 'none';
                    __get('tr-vk_filter').style.display = 'none';
                    __get('tr-vk_get_comments').style.display = 'none';
                    __get('tr-vk_del_emoji').style.display = 'none';
                }
                if (type == 'vk') {
                    __get('tr-text_start').style.display = 'none';
                    __get('tr-text_end').style.display = 'none';
                    __get('tr-link-tmpl').style.display = 'none';
                    __get('tr-autoIntroOn').style.display = 'none';
                    __get('tr-html_encoding').style.display = 'none';
                    __get('tr-rss_encoding').style.display = 'none';
                    __get('tr-title').style.display = '';
                    __get('span-url-rss').style.display = 'none';
                    __get('tr-title-words').style.display = '';
                    __get('span-title-vk').style.display = '';
                    __get('span-url-html').style.display = 'none';
                    __get('span-url-vk').style.display = 'inline';
                    __get('span-url-vkap').style.display = 'none';
                    __get('span-url-vkap2').style.display = 'none';
                    __get('tr-vk_title_len').style.display = 'none';
                    __get('tr-vk_profile_photo').style.display = 'none';
                    __get('tr-vk_title_addon').style.display = 'none';
                    __get('tr-vk_access_token').style.display = 'none';
                    __get('tr-vk_offset').style.display = 'none';
                    __get('tr-vk_count').style.display = 'none';
                    __get('tr-vk_filter').style.display = 'none';
                    __get('tr-vk_get_comments').style.display = 'none';
                    __get('tr-vk_del_emoji').style.display = 'none';
                }

                if (type == 'vk_api') {
                    __get('tr-text_start').style.display = 'none';
                    __get('tr-text_end').style.display = 'none';
                    __get('tr-link-tmpl').style.display = 'none';
                    __get('tr-autoIntroOn').style.display = 'none';
                    __get('tr-html_encoding').style.display = 'none';
                    __get('tr-rss_encoding').style.display = 'none';
                    __get('tr-title').style.display = '';
                    __get('span-url-rss').style.display = 'none';
                    __get('tr-title-words').style.display = 'none';
                    __get('span-title-vk').style.display = 'none';
                    __get('span-url-html').style.display = 'none';
                    __get('span-url-vkap').style.display = 'inline';
                    __get('span-url-vkap2').style.display = 'inline';
                    __get('tr-vk_title_len').style.display = 'inline';
                    __get('tr-vk_profile_photo').style.display = 'inline';
                    __get('tr-vk_title_addon').style.display = 'inline';
                    __get('tr-vk_access_token').style.display = 'inline';
                    __get('tr-vk_offset').style.display = 'inline';
                    __get('tr-vk_count').style.display = 'inline';
                    __get('tr-vk_filter').style.display = 'inline';
                    __get('tr-vk_get_comments').style.display = 'inline';
                    __get('tr-vk_del_emoji').style.display = 'inline';
                }
            }
        </script>
        <!--Основные-->
        <div class="tab-content" id="div_tab1"<?php
        echo $tab == 1 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td width="210">Наименование ленты</td>
                    <td><input type="text" name="row[name]" size="80" value="<?php
                        echo $row['name'];
                        ?>"/></td>
                </tr>
                <tr>
                    <td><b>Тип ленты</b></td>
                    <td><?php
                        echo WPGHelper::selectList('row[type]', array(
                            'html',
                            'rss',
                            'vk',
                            'vk_api'
                        ), $row['type'], false, 'onchange=__setFeedType(this.value);');
                        ?> </td>
                </tr>
                <tr>
                    <td>
                        <span id="span-url-rss" <?php
                        if ($row['type'] == 'html' or $row['type'] == 'vk' or $row['type'] == 'vk_api')
                        {
                        ?>style="display:none;"<?php
                        }
                        ?>><b>URL RSS-ленты</b></span>
                        <span id="span-url-html" <?php
                        if ($row['type'] == 'rss' or $row['type'] == 'vk' or $row['type'] == 'vk_api')
                        {
                        ?>style="display:none;"<?php
                        }
                        ?>><b>URL индексной страницы</b></span>
                        <span id="span-url-vk" <?php
                        if ($row['type'] == 'html' or $row['type'] == 'rss' or $row['type'] == 'vk_api')
                        {
                        ?>style="display:none;"<?php
                        }
                        ?>><b>URL VK-стены</b></span>
                        <span id="span-url-vkap" <?php
                        if ($row['type'] == 'html' or $row['type'] == 'rss' or $row['type'] == 'vk')
                        {
                        ?>style="display:none;"<?php
                        }
                        ?>>Идентификатор</span>
                    </td>
                    <td><input type="text" name="row[url]" value="<?php
                        echo $row['url'];
                        ?>" size="80"/>
                        <span id="span-url-vkap2" <?php
                        if ($row['type'] == 'html' or $row['type'] == 'rss' or $row['type'] == 'vk')
                        {
                        ?>style="display:none;"<?php
                        }
                        ?>><small>со стены которого необходимо получить записи, <i>группы/паблики необходимо указывать со знаком "<b>-</b>"</span>
                    </td>
                </tr>
                <tr id="tr-rss_encoding" <?php
                if ($row['type'] == 'html' or $row['type'] == 'vk' or $row['type'] == 'vk_api')
                {
                ?>style="display:none;"<?php
                }
                ?>>
                    <td>Кодировка RSS-ленты</td>
                    <td><?php
                        echo WPGHelper::selectList('row[rss_encoding]', WPGHelper::charsetList(), $row['rss_encoding']);
                        ?></td>
                </tr>
                <tr id="tr-rss_textmod" <?php
                if ($row['type'] != 'rss')
                    echo 'style="display:none;"';
                ?>>
                    <td>Брать текст</td>
                    <td><?php
                        echo WPGHelper::selectList('params[rss_textmod]', array(
                            '0' => 'cо страницы',
                            '1' => 'из описания RSS-потока'
                        ), $row['params']['rss_textmod'], 1, 'onchange="if (this.value==1){__hideEl(\'tr-html_encoding\');__hideEl(\'tr-text_start\');__hideEl(\'tr-text_end\');} else {__showEl(\'tr-html_encoding\');__showEl(\'tr-text_start\');__showEl(\'tr-text_end\');}"');
                        ?></td>
                </tr>
                <tr id="tr-html_encoding" <?php
                if ($row['type'] == 'vk' || ($row['type'] == 'rss' && $row['params']['rss_textmod']) or $row['type'] == 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Кодировка HTML-страницы</td>
                    <td><?php
                        echo WPGHelper::selectList('row[html_encoding]', WPGHelper::charsetList(), $row['html_encoding']);
                        ?></td>
                </tr>
                <tr id="tr-autoIntroOn" <?php
                if ($row['type'] == 'rss' or $row['type'] == 'vk' or $row['type'] == 'vk_api')
                {
                ?>style="display:none;"<?php
                }
                ?>>
                    <td>Определять анонс</td>
                    <td><?php
                        echo WPGHelper::selectList('params[autoIntroOn]', array(
                            'автоматически',
                            'вручную',
                            'без анонса'
                        ), $row['params']['autoIntroOn'], 1, 'onchange="if (this.value==1){document.getElementById(\'tr-link-tmpl\').style.display=\'none\';document.getElementById(\'tr-link-tmpl-ext\').style.display=\'\';}else{document.getElementById(\'tr-link-tmpl\').style.display=\'\';document.getElementById(\'tr-link-tmpl-ext\').style.display=\'none\';} "');
                        ?></td>
                </tr>
                <tr id="tr-link-tmpl" <?php
                if ($row['params']['autoIntroOn'] or $row['type'] == 'rss' or $row['type'] == 'vk' or $row['type'] == 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Шаблон ссылок</td>
                    <td><input type="text" name="row[links]" value="<?php
                        echo htmlentities($row['links'], ENT_COMPAT, 'UTF-8');
                        ?>" size="80"/></td>
                </tr>
                <tr id="tr-link-tmpl-ext" <?php
                if ($row['params']['autoIntroOn'] != 1 or $row['type'] == 'rss')
                    echo 'style="display:none;"';
                ?>>
                    <td valign="top">Расширенный шаблон поиска<br/>ссылок вместе с анонсами</td>
                    <td><textarea name="params[introLinkTempl]" style="width: 421px; height: 50px;"><?php
                            echo $row['params']['introLinkTempl'];
                            ?></textarea>
                        <br>порядок следования: <?php
                        echo WPGHelper::selectList('params[orderLinkIntro]', array(
                            '0' => 'ссылка, анонс',
                            '1' => 'анонс, ссылка'
                        ), $row['params']['orderLinkIntro'], true);
                        ?>
                        <br/>
                        <small>данный шаблон должен быть обязательно обрамлен в символы ~ ~is . <br/>Ссылку и текст анонса
                            - заключите в круглые скобки в таком виде: (.*?)
                        </small>
                    </td>
                </tr>
                <tr id="tr-title" <?php  if ($row['type'] == 'rss' or $row['type'] == 'vk_api')  echo 'style="display:none;"';   ?>>
                    <td>Шаблон заголовка

                    <!-- <span id="span-title-vk" <?php
                        if ($row['type'] != 'vk' )
                        {
                        ?>style="display:none;"<?php
                        }
                        ?>></span> -->
                    </td>
                    <td><input type="text" name="row[title]" value="<?php
                        echo htmlentities($row['title'], ENT_COMPAT, 'UTF-8');
                        ?>" size="80"/></td>
                </tr>
                <tr id="tr-title-words" <?php
                if ($row['type'] != 'vk')
                    echo 'style="display:none;"';
                ?>>
                    <td>Кол-во слов в заголовке</td>
                    <td><input type="text" name="params[title_words_count]" value="<?php
                        echo htmlentities($row['params']['title_words_count'], ENT_COMPAT, 'UTF-8');
                        ?>" size="5" style="text-align: center;"/> <i>( если не указан Шаблон заголовока или заголовок
                            не определен! )</i></td>
                </tr>
                <tr id="tr-text_start" <?php
                if ($row['type'] == 'vk' || ($row['type'] == 'rss' && $row['params']['rss_textmod'])  or $row['type'] == 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Начальная точка полного текста</td>
                    <td><input type="text" name="row[text_start]" value="<?php
                        echo htmlentities($row['text_start'], ENT_COMPAT, 'UTF-8');
                        ?>" size="80"/></td>
                </tr>
                <tr id="tr-text_end" <?php
                if ($row['type'] == 'vk' || ($row['type'] == 'rss' && $row['params']['rss_textmod']) or $row['type'] == 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Конечная точка полного текста</td>
                    <td><input type="text" name="row[text_end]" value="<?php
                        echo htmlentities($row['text_end'], ENT_COMPAT, 'UTF-8');
                        ?>" size="80"/></td>
                </tr>
                <tr id="tr-vk_title_len" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Заголовок символов</td>
                    <td><input type="text" name="params[vk_title_len]" value="<?php
                        echo $row['params']['vk_title_len'] ? $row['params']['vk_title_len'] : '120';
                        ?>" size="10"/> <small>количество символов для заголовка, обрезает по целому слову, из текста поста </small>
                        </td>
                </tr>
                <tr id="tr-vk_profile_photo" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Фото </td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[vk_profile_photo]', $row['params']['vk_profile_photo']);
                        ?> <small> профиля или группы <b>(photo_200_orig/photo_50)</b> </small></td>
                </tr>
                <tr id="tr-vk_title_addon" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Заголовок поста</td>
                    <td><?php
                        echo WPGHelper::selectList('params[vk_title_addon]', array(
                                '0'=> 'Без изменений..',
                                '1'=> 'Добавить ID поста',
                                '2'=> 'Добавить |Заголовок сообщества',
                                '3'=> 'Добавить ID поста, Заголовок сообщества',
                                '4'=> 'Добавить #ID поста |Заголовок сообщества',
                                #'5'=> 'Добавить Заголовок сообщества + ID поста',

                        ), $row['params']['vk_title_addon'], 1);
                        ?></td>
                </tr>


                <tr id="tr-vk_access_token" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Маркер доступа</td>
                    <td><input type="text" name="params[vk_access_token]" value="<?php
                        echo $row['params']['vk_access_token'];
                        ?>" size="80"/> <small><b>Access Token</b> если не указан здесь, будет использован из <strong>WPGrabber > Настройки > Дополнительно</strong>             </small>
                        </td>
                </tr>
                <tr id="tr-vk_offset" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Смещение</td>
                    <td><input type="text" name="params[vk_offset]" value="<?php
                        echo $row['params']['vk_offset'];
                        ?>" size="10"/> <small>необходимое для выборки определенного подмножества записей </small>
                        </td>
                </tr>
                <tr id="tr-vk_count" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Количество записей</td>
                    <td><input type="text" name="params[vk_count]" value="<?php
                        echo $row['params']['vk_count'] ? $row['params']['vk_count'] : '20';
                        ?>" size="10"/> <small>Максимальное значение: 100 </small>
                        </td>
                </tr>
                <tr id="tr-vk_get_comments" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Парсить коментарии</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[vk_get_comments]', $row['params']['vk_get_comments']);
                        ?></td>
                </tr>
                <tr id="tr-vk_del_emoji" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Удалять emoji</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[vk_del_emoji]', $row['params']['vk_del_emoji']);
                        ?></td>
                </tr>
                <tr id="tr-vk_filter" <?php
                if ($row['type'] != 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td>Фильтр</td>
                    <td>
                        <?php
                            echo WPGHelper::selectList('params[vk_filter]', array(
                                    'all'=> 'Все',
                                    'owner'=> 'Владелец',
                                    'others'=> 'Остальные',
                            ), $row['params']['vk_filter'], 1);
                            ?>
                         <small>определяет, какие типы записей на стене необходимо получить. </small>
                        </td>
                </tr>


                <tr>
                    <td>Просмотр ссылок сверху вниз</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[start_top]', $row['params']['start_top']);
                        ?></td>
                </tr>
                <tr>
                    <td>Начать с ссылки</td>
                    <td><input type="text" name="params[start_link]" value="<?php
                        echo (int)$row['params']['start_link'];
                        ?>" size="5"/>
                        <small>0 - с первой ссылки</small>
                    </td>
                </tr>
                <tr>
                    <td>Пропускать ранее не загруженные (ошибочные) ссылки</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[skip_error_urls]', $row['params']['skip_error_urls']);
                        ?></td>
                </tr>
                <tr>
                    <td>Включить ленту</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('row[published]', $row['published']);
                        ?></td>
                </tr>
                <?php
                if (get_option('wpg_methodUpdateSort') == 1) {
                    ?>
                    <tr>
                        <td>Период обновления ленты (сек.)</td>
                        <td><input type="text" name="row[interval]" value="<?php
                            echo $row['interval'];
                            ?>" size="5"/></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <!--Контент-->
        <div class="tab-content" id="div_tab2"<?php
        echo $tab == 2 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td width="315">За один запуск сохранять не более (записей)</td>
                    <td><input style="text-align: center;" type="text" name="params[max_items]" size="5" value="<?php
                        echo $row['params']['max_items'];
                        ?>"/> (0 - неограничено)
                    </td>
                </tr>
                <tr>
                    <td>Сохранять записи только уникальными (не повторяющимися) заголовками</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[titleUniqueOn]', $row['params']['titleUniqueOn']);
                        ?></td>
                </tr>
                <tr>
                    <td>Сохранять записи в Рубрике</td>
                    <td><?php
                        echo WPGHelper::getCategoriesList('params[catid]', $row['params']['catid']);
                        ?></td>
                </tr>
                <tr>
                    <td>Тип</td>
                    <td><?php
                        echo WPGHelper::selectList('params[postType]', WPGHelper::getPostTypes(), $row['params']['postType'], true);
                        ?></td>
                </tr>
                <tr>
                    <td>Автор записей</td>
                    <td><?php
                        echo WPGHelper::selectList('params[user_id]', WPGHelper::getAuthors(), $row['params']['user_id'], true);
                        ?></td>
                </tr>
                <tr>
                    <td>Статус создаваемых записей</td>
                    <td><?php
                        echo WPGHelper::selectList('params[post_status]', WPGHelper::getListPostStatus(), $row['params']['post_status'], true);
                        ?></td>
                </tr>
                    <tr>
                        <td>Разрешить комментарии</td>
                        <td><?php
                            echo WPGHelper::selectList('params[comment_status]', array(
                                    'open'=> 'да',
                                    'closed'=> 'нет',
                            ), $row['params']['comment_status'], 1);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Разрешить пинг</td>
                        <td><?php
                            echo WPGHelper::selectList('params[ping_status]', array(
                                    'open'=> 'да',
                                    'closed'=> 'нет',
                            ), $row['params']['ping_status'], 1);
                            ?></td>
                    </tr>
            </table>

            <fieldset>
                <legend>Настройка Заголовка</legend>
                <table>
                    <tr>
                        <td>Метод генерации</td>
                        <td><?php
                            echo WPGHelper::selectList('params[case_title]', array(
                                    '0'=> 'Без изменений',
                                    '1'=> 'Верхний регистр первый символ каждого слова', # MB_CASE_TITLE
                                    '2'=> 'Все слова в верхний регистр', # MB_CASE_UPPER
                            ), $row['params']['case_title'], 1);
                            ?></td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend>Настройка генерации даты поста</legend>
                <table>
                    <!-- <tr>
                        <td width="300">Забирать дату с <b>донора</b></td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[post_date_on]', $row['params']['post_date_on']);
                            ?></td>
                    </tr>
                    <tr>
                        <td>RegEx для даты</td>
                        <td><input type="text" name="params[post_date_scrape]" style="text-align:left;" size="38" value="<?php
                            echo htmlentities($row['params']['post_date_scrape']);
                            ?>" placeholder="<date>(.*?)</date>"/></td>
                    </tr>
                    <tr>
                        <td>Вид</td>
                        <td><?php
                                echo WPGHelper::selectList('params[post_date_type]', array(
                                    #'scrape' => 'scrape',
                                    'runtime'=> 'runtime',
                                    'custom'=> 'custom',
                                    'feed' => 'feed'
                                ), $row['params']['post_date_type'], 1, 'style="float:none;"');
                            ?></td>
                    </tr> -->



                <tr id="tr-post_date_on">
                    <td>Определять дату</td>
                    <td><?php
                        echo WPGHelper::selectList('params[post_date_on]', array(
                            'автоматически,  текущую',
                            'парсить'
                        ), $row['params']['post_date_on'], 1,
                        'onchange="if (this.value==1)
                        {
                            document.getElementById(\'tr-post_date_scrape\').style.display=\'none\';
                            document.getElementById(\'tr-post_date_type\').style.display=\'\';
                        }
                        else
                        {
                            document.getElementById(\'tr-post_date_scrape\').style.display=\'\';
                            document.getElementById(\'tr-post_date_type\').style.display=\'none\';
                         } "'
                         );
                        ?></td>
                </tr>
                <tr id="tr-post_date_scrape" <?php
                if ($row['params']['post_date_on'])
                    echo 'style="display:none;"';
                ?>>
                    <td>
                    <input type="hidden" name="params[post_date_type]"value="runtime"/>
                        <!-- <br>Тип: <?php
                        echo WPGHelper::selectList('params[post_date_type]', array(
                            'runtime'=> 'current_time',
                            #'custom'=> 'custom',
                            #'feed' =>'из rss фида'
                        ), $row['params']['post_date_type'], true);
                        ?>
                        <br/> -->
                    </td>

                </tr>
                <tr id="tr-post_date_type" <?php
                if ($row['params']['post_date_on'] != 1 or $row['type'] == 'vk_api')
                    echo 'style="display:none;"';
                ?>>
                    <td valign="top">RegEx для даты</td>
                    <td><textarea name="params[post_date_scrape]" style="width: 421px; height: 50px;" placeholder='<time class="published" datetime="(.*?)"' /><?php
                            echo htmlentities($row['params']['post_date_scrape']);
                            ?></textarea>
                        <small><br/>Даты подобного формата: <b>"2018-12-27T17:38:35+00:00"</b>, <b>"11.04.2019 12:04 (UTC+9)"</b>, <b>"2019-06-17 17:20:12"</b> <br/>Текст даты заключите в круглые скобки в таком виде: (.*?)
                        </small>
                    </td>
                </tr>




                </table>
            </fieldset>

            <fieldset>
                <legend>Настройка генерации анонса</legend>
                <table>
                    <tr>
                        <td width="300">Для выделения анонса вставлять тег <b>Далее</b></td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[post_more_on]', $row['params']['post_more_on']);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Размер анонсовой части текст (кол-во символов)</td>
                        <td><input style="text-align: center;" type="text" name="params[intro_size]" size="5"
                                   value="<?php
                                   echo $row['params']['intro_size'];
                                   ?>"/></td>
                    </tr>
                    <tr>
                        <td>Конечный символ для отделения анонса</td>
                        <td><input style="text-align: center; float:none;" type="text" name="params[introSymbolEnd]"
                                   size="5" value="<?php
                            echo $row['params']['introSymbolEnd'];
                            ?>"/> -
                            <small>пустое значение в этом поле заменяется на пробел (для обрезки по предложению вставте
                                точку .)
                            </small>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend>Настройка полного текста (Удаляем теги)</legend>
                <table>
                    <tr>
                        <td width="300">Обрезать текст <b>поста</b></td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[fulltext_size_on]', $row['params']['fulltext_size_on']);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Размер полного текста (кол-во символов)</td>
                        <td><input style="text-align: center;" type="text" name="params[post_full_size]" size="5"
                                   value="<?php
                                   echo $row['params']['post_full_size'];
                                   ?>"/></td>
                    </tr>
                    <tr>
                        <td>Конечный символ для отделения текста</td>
                        <td><input style="text-align: center; float:none;" type="text"
                                   name="params[postFulltextSymbolEnd]" size="5" value="<?php
                            echo $row['params']['postFulltextSymbolEnd'];
                            ?>"/> -
                            <small>пустое значение в этом поле заменяется на пробел (для обрезки по предложению вставте
                                точку .)
                            </small>
                        </td>
                    </tr>
                </table>
            </fieldset>


            <fieldset>
                <legend>Настройки генерации постоянных ссылок</legend>
                <table>
                    <tr>
                        <td width="300">Формировать постоянные ссылки для записей</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[postSlugOn]', $row['params']['postSlugOn']);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Метод генерации</td>
                        <td><?php
                            echo WPGHelper::selectList('params[aliasMethod]', array(
                                'транслитерация заголовков'
                            ), $row['params']['aliasMethod'], 1);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Размер алиаса (кол-во символов)</td>
                        <td><input type="text" name="params[aliasSize]" style="text-align:center;" size="8" value="<?php
                            echo $row['params']['aliasSize'];
                            ?>"/>
                            <small>(0 - не обрезать!)</small>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>

        <!--Картинки-->
        <div class="tab-content" id="div_tab3"<?php
        echo $tab == 3 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td width="270">Не сохранять записи без картинок</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[no_save_without_pic]', $row['params']['no_save_without_pic']);
                        ?></td>
                </tr>
                <tr>
                    <td>Вырезать первую картинку в начало записи</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[intro_pic_on]', $row['params']['intro_pic_on']);
                        ?></td>
                </tr>
            </table>
            <fieldset>
                <legend>Настройки сохранения картинок на сервере</legend>
                <table class="tab-content-table">
                    <tr>
                        <td>Сохранять картинки на сервере <br></td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_save]', $row['params']['image_save'], array(
                                ' onchange="if (this.value==1){
                                    document.getElementById(\'tr-post_thumb_on\').style.display=\'\';
                                    document.getElementById(\'tr-image_name_from_title_on\').style.display=\'\';
                                    }else{
                                    document.getElementById(\'tr-post_thumb_on\').style.display=\'none\';
                                    document.getElementById(\'tr-image_name_from_title_on\').style.display=\'none\';
                                    }" ',
                                ' onchange="if (this.value==0){
                                    document.getElementById(\'tr-post_thumb_on\').style.display=\'none\';
                                    document.getElementById(\'tr-image_name_from_title_on\').style.display=\'none\';
                                    }else{
                                    document.getElementById(\'tr-post_thumb_on\').style.display=\'\';
                                    document.getElementById(\'tr-image_name_from_title_on\').style.display=\'\';
                                    }" '
                            ));
                            ?> &nbsp;&nbsp;&nbsp;<i>( включите данную опцию для создания миниатюр записей WordPress
                                )</i></td>
                    </tr>
                    <tr id="tr-post_thumb_on"<?php
                    if (!$row['params']['image_save'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>Назначить первую картинку в качестве миниатюры записи</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[post_thumb_on]', $row['params']['post_thumb_on']);
                            ?></td>
                    </tr>
                    <tr id="tr-image_name_from_title_on"<?php
                    if (!$row['params']['image_save'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>Сгенерировать имена файлов картинок из заголовка</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_name_from_title_on]', $row['params']['image_name_from_title_on']);
                            ?>&nbsp;&nbsp;&nbsp;<i></i></td>
                    </tr>
                    <tr>
                        <td>Ограничить захват картинок</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[limit_image_output_on]', $row['params']['limit_image_output_on']);
                            ?>&nbsp;&nbsp;&nbsp;<i>( будет сохранять только первую картинку
                                )</i></td>
                    </tr>
                    <tr>
                        <td>Картинок, если больше </td>
                        <td>
                            <input type="text" name="params[image_nextpage_quan]" value="<?php
                            echo htmlentities($row['params']['image_nextpage_quan']);
                            ?>" size="3"/>&nbsp;&nbsp;&nbsp;вставляем &#60;!--nextpage--&#62; <i>( пустое поле - выкл. )</i>
                        </td>
                    </tr>
                    <!--
                    <tr>
                        <td>Включить обработку пробелов в путях картинок</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_space_on]', $row['params']['image_space_on']);
                            ?></td>
                    </tr>
                    -->

                    <tr>
                        <td width="260">Каталог хранения картинок</td>
                        <td><input type="text" name="params[image_path]" value="<?php
                            echo htmlentities($row['params']['image_path']);
                            ?>" size="60"/></td>
                    </tr>
                    <tr>
                        <td>Генерация путей картинок</td>
                        <td><?php
                            echo WPGHelper::selectList('params[img_path_method]', array(
                                '0' => '/относительный путь',
                                '1' => 'относительный путь',
                                '2' => 'абсолютный путь'
                            ), $row['params']['img_path_method'], 1);
                            ?></td>
                    </tr>
                    <tr>
                        <td valign="top">Шаблон HTML-кода картинок</td>
                        <td>
            <textarea name="params[imageHtmlCode]" style="width: 421px; height: 50px;"><?php
                echo htmlentities($row['params']['imageHtmlCode'], ENT_COMPAT, 'UTF-8');
                ?></textarea><br/>
                            <small style="font-size: 10px;">по умолчанию: <b style="font-family: Tahoma;">&lt;img src=&quot;%PATH%&quot;
                                    /&gt;</b>
                                <br/>где %PATH% - путь до картинки, %ADDS% - атрибуты элемента IMG из исходника,<br/>
                                %TITLE% - заголовок материала, %ATTR% - дополнительные атрибуты картинок
                            </small>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Атрибуты картинок</legend>
                <table class="tab-content-table">
                    <tr>
                        <td>Свой атрибут <a href="http://htmlbook.ru/html/attr/class" target="_blank">class</a> </td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_class_name_on]', $row['params']['image_class_name_on']);
                            ?>&nbsp;&nbsp;&nbsp;<i>( Заменит все стилевые классы донора, работает если в шаблоне HTML-кода картинок есть %ADDS%)</i></td>
                    </tr>
                    <tr>
                        <td width="260">Название для атрибута class</td>
                        <td><input type="text" name="params[image_class_name_custom]" value="<?php
                            echo htmlentities($row['params']['image_class_name_custom']);
                            ?>" size="40"/> </td>
                    </tr>
                    <tr>
                        <td>Сгенерировать <a href="http://htmlbook.ru/html/img/alt" target="_blank">alt</a> </td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_alt_make_on]', $row['params']['image_alt_make_on'], array(
                                ' onchange="if (this.value==1){
                                    document.getElementById(\'tr-image_alt_replace\').style.display=\'\';
                                    document.getElementById(\'tr-image_alt_from_attr_title\').style.display=\'\';
                                    }else{
                                    document.getElementById(\'tr-image_alt_replace\').style.display=\'none\';
                                    document.getElementById(\'tr-image_alt_from_attr_title\').style.display=\'none\';
                                    }" ',
                                ' onchange="if (this.value==0){
                                    document.getElementById(\'tr-image_alt_replace\').style.display=\'none\';
                                    document.getElementById(\'tr-image_alt_from_attr_title\').style.display=\'none\';
                                    }else{
                                    document.getElementById(\'tr-image_alt_replace\').style.display=\'\';
                                    document.getElementById(\'tr-image_alt_from_attr_title\').style.display=\'\';
                                    }" '
                            ));
                            ?> &nbsp;&nbsp;&nbsp;<i>( включите данную опцию для генерации атрибута alt
                                )</i></td>
                    </tr>
                    <tr id="tr-image_alt_replace"<?php
                    if (!$row['params']['image_alt_make_on'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>Заменять alt <br></td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_alt_replace]', $row['params']['image_alt_replace']);
                            ?>&nbsp;&nbsp;&nbsp;<i>( если есть у донора )</i></td>
                    </tr>

                    <tr id="tr-image_alt_from_attr_title"<?php
                    if (!$row['params']['image_alt_make_on'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>alt из атрибута title картинки<br></td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_alt_from_attr_title]', $row['params']['image_alt_from_attr_title']);
                            ?>&nbsp;&nbsp;&nbsp;<i>( если нет, будет взят из заголовка статьи)</i></td>
                    </tr>


                    <tr>
                        <td>Удалять атрибуты</td>
                        <td><input type="text" name="params[image_attr_delete]" size="90" value="<?php
                            echo $row['params']['image_attr_delete'];
                            ?>"/></td>
                    </tr>
                    <!--
                    <tr>
                        <td>Сгенерировать title из заголовка</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_title_make_on]', $row['params']['image_title_make_on']);
                            ?>&nbsp;&nbsp;&nbsp;<i>( title)</i></td>
                    </tr>
                    -->
                </table>
            </fieldset>
            <fieldset>
                <legend>Изменение размеров картинок</legend>
                <table class="tab-content-table">
                    <tr>
                        <td width="260">Изменять размеры изображений</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[image_resize]', $row['params']['image_resize']);
                            ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                                <legend>Параметры картинок в анонсе</legend>
                                Метод масштабирования: <?php
                                echo WPGHelper::selectList('params[img_intro_crop]', array(
                                    'с сохранением пропорций',
                                    'кадрирование (точные размеры)'
                                ), $row['params']['img_intro_crop'], 1, 'style="float:none;"');
                                ?><br><br>
                                Ширина: <input style="text-align: center;" type="text" name="params[intro_pic_width]"
                                               value="<?php
                                               echo $row['params']['intro_pic_width'];
                                               ?>" size="6"/> Высота: <input style="text-align: center;" type="text"
                                                                             name="params[intro_pic_height]"
                                                                             value="<?php
                                                                             echo $row['params']['intro_pic_height'];
                                                                             ?>" size="6"/> Качество JPEG: <input
                                    style="text-align: center;" type="text" name="params[intro_pic_quality]"
                                    value="<?php
                                    echo $row['params']['intro_pic_quality'];
                                    ?>" size="6"/>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                                <legend>Параметры картинок в основном тексте</legend>
                                Метод масштабирования: <?php
                                echo WPGHelper::selectList('params[img_text_crop]', array(
                                    'с сохранением пропорций',
                                    'кадрирование (точные размеры)'
                                ), $row['params']['img_text_crop'], 1, 'style="float:none;"');
                                ?><br><br>
                                Ширина: <input style="text-align: center;" type="text" name="params[text_pic_width]"
                                               value="<?php
                                               echo $row['params']['text_pic_width'];
                                               ?>" size="6"/> Высота: <input style="text-align: center;" type="text"
                                                                             name="params[text_pic_height]" value="<?php
                                echo $row['params']['text_pic_height'];
                                ?>" size="6"/> Качество JPEG: <input style="text-align: center;" type="text"
                                                                     name="params[text_pic_quality]" value="<?php
                                echo $row['params']['text_pic_quality'];
                                ?>" size="6"/>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>

        <!--Синонимизация-->
        <div class="tab-content" id="div_tab4"<?php
        echo $tab == 4 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td width="230">Не сохранять записи если не получилось синонимизировать текст</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[ignoreRecordOnSynonymizeError]', $row['params']['ignoreRecordOnSynonymizeError']);
                        ?></td>
                </tr>
            </table>
            <fieldset>
                <legend>Синонимизация Textorobot.ru</legend>
                <table class="tab-content-table">
                    <tr>
                        <td width="220">Включить синонимизацию</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[synonymizeEnabled]', $row['params']['synonymizeEnabled']);
                            ?></td>
                    </tr>
                    <tr>
                        <td width="220">Синонимизировать</td>
                        <td>
                            <input style="text-align: center;" type="text" name="params[SynonymStrimWidth]" value="<?=(int)$row['params']['SynonymStrimWidth']?>" size="5"/>
                            <small>(Только первые X символов)</small>
                        </td>
                    </tr>
                    <tr>
                        <td width="220">Минимальный процент синонимизации</td>
                        <td>
                            <input style="text-align: center;" type="text" name="params[minSynonymPercentage]" value="<?=(int)$row['params']['minSynonymPercentage']?>" size="5"/>
                            <small>(Синонимизация будет игнорироваться, если процент синонимизации будет меньше, чем указанный здесь)</small>
                        </td>
                    </tr>
                    <tr id="textorobot-api-key">
                        <td>API-ключ для Textorobot<br/>&nbsp;</td>
                        <td>
                            <input type="text" name="params[textorobotApiKey]" value="<?php
                            echo WPGTools::esc($row['params']['textorobotApiKey']);
                            ?>" size="80"/>
                            <br/>
                            <small>Если не задано, то использует API-ключ из настроек плагина</small>
                        </td>
                    </tr>
                    <?php if (isset($textorobotBalance->synonymSymbolBalance)) { ?>
                    <tr>
                        <td valign="top"></td>
                        <td>
                                Ваш баланс: <a href="https://textorobot.ru/баланс.html" target="_blank"><?=$textorobotBalance->synonymSymbolBalance?></a> символов<br>
                        </td>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td valign="top"></td>
                        <td>
                                <a href="https://textorobot.ru/index.php?option=com_billing&partnername=wissta777" target="_blank">Получить бесплатный
                                    API-ключ Textorobot</a><br>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </fieldset>
            <fieldset>
                Обращаем внимание, что на указываемый процент синонимизации влияет
                наличие HTML-тегов в тексте (картинки, ссылки и т.п.). <br/>
                HTML-теги не синонимизируются, но учитываются при расчёте процента,
                поэтому реальный процент синонимизации самого текста зачастую выше. <br/>
                Это необходимо учесть, задавая пороговые значения.
            </fieldset>
        </div>

        <!--Перевод-->
        <div class="tab-content" id="div_tab5"<?php
        echo $tab == 5 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td width="230">Не сохранять записи если не получилось перевести заголовок или текст</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[nosave_if_not_translate]', $row['params']['nosave_if_not_translate']);
                        ?></td>
                </tr>
            </table>
            <fieldset>
                <legend>Первый перевод</legend>
                <script>
                    function setTranslateProviderInfo(e) {
                        var provider = jQuery(e).val();
                        jQuery('.translate-select-list').attr('disabled', true).hide();
                        jQuery('#translate-select-list-' + provider).attr('disabled', false).show();
                        if (provider == 0) {
                            jQuery('#gfree-split-text-width').show();
                        } else {
                            jQuery('#gfree-split-text-width').hide();
                        }
                        if (provider == 2) {
                            jQuery('#yandex-glossary').show();
                            jQuery('#yandex-split-text-width').show();
                        } else {
                            jQuery('#yandex-glossary').hide();
                            jQuery('#yandex-split-text-width').hide();
                        }

                    }
                </script>
                <table class="tab-content-table">
                    <tr>
                        <td width="220">Включить первый перевод записей</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[translate_on]', $row['params']['translate_on']);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Используемая система перевода</td>
                        <td>
                            <?php
                            echo WPGHelper::selectList('params[translate_method]', WPGHelper::translateProvidersList(), $row['params']['translate_method'], true, 'onchange="setTranslateProviderInfo(this);"');
                            ?></td>
                    </tr>
                    <?php
                    $selected_provider = (int)$row['params']['translate_method'];
                    ?>
                    <tr>
                        <td>Направление перевода</td>
                        <td>
                            <?php
                            foreach (WPGHelper::translateProvidersList() as $provider => $name):
                                ?>
                                <?php
                                echo WPGHelper::selectList('params[translate_lang]', WPGHelper::translateLangsList($provider), $row['params']['translate_lang'], true, 'class="translate-select-list" id="translate-select-list-' . $provider . '"' . (($provider != $selected_provider) ? ' disabled="disabled" style="display: none;"' : ''));
                                ?>
                                <?php
                            endforeach;
                            ?>
                        </td>
                    </tr>
                    <tr<?php
                    echo ($selected_provider != 2) ? ' style="display: none;"' : '';?> id="yandex-split-text-width">
                        <td>Разбивать текст, для обхода ограничения в 10k символов<br/>&nbsp;</td>
                        <td>
                            <input type="text" name="params[splitTextWidth]" value="<?php
                            echo WPGTools::esc($row['params']['splitTextWidth']);
                            ?>" size="20"/>
                            <br/>
                            <small>Если не задано, то будет разбивать по 1000 символов</small>
                        </td>
                    </tr>
                    <tr<?php
                    echo ($selected_provider != 2) ? ' style="display: none;"' : '';?> id="yandex-glossary">
                        <td>Собственный <a href="https://cloud.yandex.ru/docs/translate/operations/better-quality#with-glossary" target="_blank">глоссарий</a> для для Яндекс.Облако Translate</td>
                        <td><textarea name="params[yandex_glossary_pairs]" style="width: 450px; height: 70px;"><?php
                                echo $row['params']['yandex_glossary_pairs'] ? $row['params']['yandex_glossary_pairs'] : '';
                                ?></textarea><i><br>Глоссарий можно передать только в виде массива &#61;&#62; текстовых пар, разделитель пар &#124;, например: </i><br><b>oil=>нефть&#124;Self-driving cars=>беспилотные автомобили&#124;editors=>редакторы</b></td>
                    </tr>


                    <tr<?php
                    echo ($selected_provider != 1) ? ' style="display: none;"' : '';?> id="gfree-split-text-width">
                        <td>Разбивать текст, для обхода ограничения Yandex в 150 символов</td>
                        <td>
                            <input type="text" name="params[yfree_split_text_width]" value="<?php
                            echo WPGTools::esc($row['params']['yfree_split_text_width']);
                            ?>" size="20"/>
                            <br/>
                            <small>Если не задано, то будет разбивать по 150 символов, для второго перевода используется это же значение</small>
                        </td>
                    </tr>


                    <tr<?php
                    echo ($selected_provider != 0 || $selected_provider != 5) ? ' style="display: none;"' : '';?> id="gfree-split-text-width">
                        <td>Разбивать текст, для обхода ограничения Google в 2k символов</td>
                        <td>
                            <input type="text" name="params[gfree_split_text_width]" value="<?php
                            echo WPGTools::esc($row['params']['gfree_split_text_width']);
                            ?>" size="20"/>
                            <br/>
                            <small>Если не задано, то будет разбивать по 500 символов, для второго перевода используется это же значение</small>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Второй перевод</legend>
                <script>
                    function setTranslateProviderInfo2(e) {
                        var provider = jQuery(e).val();
                        jQuery('.translate-select-list2').attr('disabled', true).hide();
                        jQuery('#translate-select-list2-' + provider).attr('disabled', false).show();
                        if (provider == 9) {
                            jQuery('#yandex-api-key2').show();
                        } else {
                            jQuery('#yandex-api-key2').hide();
                        }
                        if (provider == 2) {
                            jQuery('#yandex-glossary2').show();
                        } else {
                            jQuery('#yandex-glossary2').hide();
                        }
                    }
                </script>
                <table class="tab-content-table">
                    <tr>
                        <td width="220">Включить второй перевод записей</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[translate2_on]', $row['params']['translate2_on']);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Используемая система перевода</td>
                        <td>
                            <?php
                            echo WPGHelper::selectList('params[translate2_method]', WPGHelper::translateProvidersList(), $row['params']['translate2_method'], true, 'onchange="setTranslateProviderInfo2(this);"');
                            ?></td>
                    </tr>
                    <?php
                    $selected_provider = (int)$row['params']['translate2_method'];
                    ?>
                    <tr>
                        <td>Направление перевода</td>
                        <td>
                            <?php
                            foreach (WPGHelper::translateProvidersList() as $provider => $name):
                                ?>
                                <?php
                                echo WPGHelper::selectList('params[translate2_lang]', WPGHelper::translateLangsList($provider), $row['params']['translate2_lang'], true, 'class="translate-select-list2" id="translate-select-list2-' . $provider . '"' . (($provider != $selected_provider) ? ' disabled="disabled" style="display: none;"' : ''));
                                ?>
                                <?php
                            endforeach;
                            ?>
                        </td>
                    </tr>
                    <tr<?php
                    echo ($selected_provider != 2) ? ' style="display: none;"' : '';?> id="yandex-glossary2">
                        <td>Собственный <a href="https://cloud.yandex.ru/docs/translate/operations/better-quality#with-glossary" target="_blank">глоссарий</a> для для Яндекс.Облако Translate</td>
                        <td><textarea name="params[yandex_glossary_pairs2]" style="width: 450px; height: 70px;"><?php
                                echo $row['params']['yandex_glossary_pairs2'] ? $row['params']['yandex_glossary_pairs2'] : '';
                                ?></textarea><i><br>Глоссарий можно передать только в виде массива &#61;&#62; текстовых пар, разделитель пар &#124;</i> <br><b>cars=>автомобили&#124;Gear-obsessed editors=>Редакторы, одержимые механизмами</b></td>
                    </tr>

                    <!-- <tr<?php
                    echo ($selected_provider != 9) ? ' style="display: none;"' : '';
                    ?> id="yandex-api-key2">
                        <td>API-ключ для Яндекс.Перевода</td>
                        <td>
                            <input type="text" name="params[yandex_api_key2]" value="<?php
                            echo WPGTools::esc($row['params']['yandex_api_key2']);
                            ?>" size="80"/>
                        </td>
                    </tr> -->

                </table>
            </fieldset>
        </div>

        <!--SEO-->
        <div class="tab-content" id="div_tab6"<?php
        echo $tab == 6 ? ' style="display: block;"' : '';
        ?>>
            <fieldset>
                <legend>Настройки генерации меток для записи</legend>
                <table>
                    <tr>
                        <td>Включить генерацию меток</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[post_tags_on]', $row['params']['post_tags_on'], array(
                                ' onchange="if (this.value==1){
                                    document.getElementById(\'tr-tags_mode\').style.display=\'\';
                                    document.getElementById(\'tr-tags_count\').style.display=\'\';
                                    }else{
                                    document.getElementById(\'tr-tags_mode\').style.display=\'none\';
                                    document.getElementById(\'tr-tags_count\').style.display=\'none\';
                                    }" ',
                                ' onchange="if (this.value==0){
                                    document.getElementById(\'tr-tags_mode\').style.display=\'none\';
                                    document.getElementById(\'tr-tags_count\').style.display=\'none\';
                                    }else{
                                    document.getElementById(\'tr-tags_mode\').style.display=\'\';
                                    document.getElementById(\'tr-tags_count\').style.display=\'\';
                                    }" '
                            ));
                            ?> </td>
                    </tr>

                    <tr id="tr-tags_mode"<?php
                    if (!$row['params']['post_tags_on'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>Сгенерировать теги из файла</b></td>
                    <td><?php
                        echo WPGHelper::selectList('params[tags_mode]', array(
                            'RexExp',
                            'из файла'
                        ), $row['params']['tags_mode'], 1,
                        'onchange="if (this.value==1)
                        {
                            document.getElementById(\'tr-post_tags_regexp\').style.display=\'none\';
                            document.getElementById(\'tr-post_tags_file\').style.display=\'\';
                        }
                        else
                        {
                            document.getElementById(\'tr-post_tags_regexp\').style.display=\'\';
                            document.getElementById(\'tr-post_tags_file\').style.display=\'none\';
                         } "'
                         );
                        ?></td>
                    </tr>


                    <tr id="tr-post_tags_regexp"<?php
                    if ($row['params']['tags_mode'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>RegEx для меток</td>
                        <td><input type="text" name="params[tagsScrape]" style="text-align:left;" size="78" value="<?php
                            echo htmlentities($row['params']['tagsScrape']);
                            ?>" placeholder='<a href="https://site.com/tag/.*?/" rel="tag">(.*?)</a>'/>

                            <!-- <textarea name="params[tagsScrape]" style="width: 421px; height: 50px;" placeholder='<a href="https://site.com/tag/.*?/" rel="tag">(.*?)</a>' /><?php
                            echo htmlentities($row['params']['tagsScrape']);
                            ?></textarea> -->
                        </td>
                    </tr>
                    <tr id="tr-post_tags_file"<?php
                    if (!$row['params']['tags_mode'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>Полный путь к файлу</td>
                        <td><!-- <textarea name="params[tags_file]" style="width: 421px; height: 50px;" placeholder="<?=wp_upload_dir()['basedir'];?>/post_tags.txt" /><?php
                            echo htmlentities($row['params']['tags_file']);
                            ?></textarea> -->
                            <input type="text" name="params[tags_file]" style="text-align:left;" size="78" value="<?php
                            echo htmlentities($row['params']['tags_file']);
                            ?>" placeholder="<?=wp_upload_dir()['basedir'];?>/post_tags.txt" />
                            <i><br>(по умолчанию: <?=wp_upload_dir()['basedir'];?>/post_tags.txt)</i>
                            </td>
                    </tr>


                    <tr id="tr-tags_count"<?php
                    if (!$row['params']['post_tags_on'])
                        echo ' style="display:none;"';
                    ?>>
                        <td>Количество меток</td>
                        <td><input type="text" name="params[tagsScrapeCount]" style="text-align:center;" size="4" value="<?php
                            echo $row['params']['tagsScrapeCount']  ? $row['params']['tagsScrapeCount'] : '5';
                            ?>"/></td>
                    </tr>
                    <!--
                    <tr>
                        <td>Разделитель меток</td>
                        <td><input type="text" name="params[tagsScrapeSeparator]" style="text-align:center;" size="4" value="<?php
                            echo $row['params']['tagsScrapeSeparator'];
                            ?>" placeholder="," /></td>
                    </tr>
                    <tr>
                        <td valign="top">Список стоп-слов через запятую<br/>исключаемых из меток</td>
                        <td><textarea name="params[metaKeysStopList]" style="width: 450px; height: 70px;"><?php
                                echo $row['params']['metaKeysStopList'] ? $row['params']['metaKeysStopList'] : 'без, более, бы, был, была, были, было, быть, вам, вас, ведь, весь, вдоль, вместо, вне, вниз, внизу, внутри, во, вокруг, вот, все, всегда, всего, всех, вы, где, да, давай, давать, даже, для, до, достаточно, его, ее, её, если, есть, ещё, же, за, за исключением, здесь, из, из-за, или, им, иметь, их, как, как-то, кто, когда, кроме, кто, ли, либо, мне, может, мои, мой, мы, на, навсегда, над, надо, наш, не, него, неё, нет, ни, них, но, ну, об, однако, он, она, они, оно, от, отчего, очень, по, под, после, потому, потому что, почти, при, про, снова, со, так, также, такие, такой, там, те, тем, то, того, тоже, той, только, том, тут, ты, уже, хотя, чего, чего-то, чей, чем, что, чтобы, чьё, чья, эта, эти, это';
                                ?></textarea></td>
                    </tr>
                     -->
                </table>
            </fieldset>
        </div>

        <!--Обработка-->
        <div class="tab-content" id="div_tab7"<?php
        echo $tab == 7 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td>Удалять HTML-теги</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[strip_tags]', $row['params']['strip_tags']);
                        ?></td>
                </tr>
                <tr>
                    <td>Разрешенные HTML-теги</td>
                    <td><input type="text" name="params[allowed_tags]" size="80" value="<?php
                        echo $row['params']['allowed_tags'];
                        ?>"/></td>
                </tr>
                <tr>
                <tr>
                    <td>Удалять JavaScript-код</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[js_script_no_del]', $row['params']['js_script_no_del'], '', 'Нет', 'Да');
                        ?> &nbsp;&nbsp;&nbsp;<i>( при включении в <b>Да</b>, добавьте в разрешенные HTML-теги: <b>&lt;script&gt;</b>
                            ) </i></td>
                </tr>
                <tr>
                    <td>Удалять CSS-код</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[css_no_del]', $row['params']['css_no_del'], '', 'Нет', 'Да');
                        ?> &nbsp;&nbsp;&nbsp;<i>( при включении в <b>Да</b>, добавьте в разрешенные HTML-теги: <b>&lt;style&gt;</b>
                            ) </i></td>
                </tr>
                <tr>
                    <td>Включить дополнительные шаблоны обработки</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[user_replace_on]', $row['params']['user_replace_on']);
                        ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <fieldset>
                            <legend>Дополнительные шаблоны ~<a href="https://www.exlab.net/tools/sheets/regexp.html" target="_blank"><b>шпаргалка</b></a>~is <a href="http://php.net/manual/ru/function.preg-replace.php" target="_blank">preg_replace</a> обработки:</legend>
                            <!-- <p>~<a href="https://www.exlab.net/tools/sheets/regexp.html" target="_blank"><b>шпаргалка</b></a>~is</p> -->
                            <div style="overflow: auto; height: 400px;">
                                <style>
                                    .truser tr td, tr th {
                                        padding: 3px;
                                        background: #e7e7e7;
                                        font-size: 12px;
                                    }

                                    .truser input, .truser select {
                                        font-size: 12px;
                                    }

                                    .truser tr th {
                                        text-align: center;
                                    }
                                </style>
                                <table class="truser">
                                    <tr>
                                        <th width="30px">#</th>
                                        <th>Объект применения</th>
                                        <th>Наименование шаблона</th>
                                        <th>Шаблон поиска</th>
                                        <th>Шаблон замены</th>
                                        <th>Кол-во замен</th>
                                    </tr>
                                    <?php
                                    for ($i = 0; $i < 50; $i++) {
                                        ?>
                                        <tr align="center">
                                            <td><?php
                                                echo($i + 1);
                                                ?></td>
                                            <td><?php
                                                echo WPGHelper::selectList("params[usrepl][$i][type]", array(
                                                    '0' => 'выключен',
                                                    'index' => 'индексная html-страница (rss-контент или vk-лента)',
                                                    'page' => 'страница контента до парсинга',
                                                    'intro' => 'анонс',
                                                    'text' => 'полный текст',
                                                    'title' => 'заголовок'
                                                ), $row['params']['usrepl'][$i]['type'], 1, 'style="width:150px;"');
                                                ?></td>
                                             <td><input size="30" type="text" name="params[usrepl][<?php
                                                echo $i;
                                                ?>][name]" value="<?php
                                                echo $row['params']['usrepl'][$i]['name'];
                                                ?>"/></td>
                                            <td><input size="60" type="text" name="params[usrepl][<?php
                                                echo $i;
                                                ?>][search]" placeholder="" value="<?php
                                                echo htmlspecialchars($row['params']['usrepl'][$i]['search']);
                                                ?>"/></td>
                                            <td><input size="50" type="text" name="params[usrepl][<?php
                                                echo $i;
                                                ?>][replace]" placeholder="" value="<?php
                                                echo htmlspecialchars($row['params']['usrepl'][$i]['replace']);
                                                ?>"/></td>
                                            <td><input style="text-align:center;" size="5" type="text"
                                                       name="params[usrepl][<?php
                                                       echo $i;
                                                       ?>][limit]" value="<?php
                                                echo $row['params']['usrepl'][$i]['limit'];
                                                ?>"/></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <b>~div.*?&lt;/div&gt;~is</b> - любые символы между <b>div и &lt;/div&gt;</b>
        </div>

        <!--Вид-->
        <div class="tab-content" id="div_tab8"<?php
        echo $tab == 8 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td>Использовать шаблон формирования записи</td>
                    <td><?php
                        echo WPGHelper::yesNoRadioList('params[template_on]', $row['params']['template_on']);
                        ?></td>
                </tr>
            </table>

            </fieldset>
            <fieldset>
                <legend>Шаблон записи</legend>
                <table>
                    <tr>
                        <td>Заголовок</td>
                        <td><input type="text" name="params[template_title]" style="width:410px" value="<?php
                            echo $row['params']['template_title'];
                            ?>"/></td>
                    </tr>
                    <tr>
                        <td valign="top">Текст</td>
                        <td>
                            <table cellpadding="0" cellspacing="0">
                                <tr valign="top">
                                    <td><textarea name="params[template_full_text]" style="width:410px" rows="13"><?php
                                            echo $row['params']['template_full_text'];
                                            ?></textarea></td>
                                    <td style="padding: 10px;">
                                        <b>%TITLE%</b> - Заголовок записи<br/>
                                        <b>%INTRO_TEXT%</b> - Анонсовая часть текста<br/>
                                        <b>%FULL_TEXT%</b> - Полный текст<br/>
                                        <b>%INTRO_PIC%</b> - Первая найденная картинка в тексте<br/>
                                        <b>%FEED%</b> - Наименование ленты<br/>
                                        <b>%FEED_URL%</b> - URL ленты<br/>
                                        <b>%SOURCE_URL%</b> - ссылка на источник материала<br/>
                                        <b>%SOURCE_SITE%</b> - URL-адрес сайта-источника<br/>
                                        <b>%TITLE_SOURCE%</b> - Заголовок до первого перевода<br/>
                                        <b>%TEXT_SOURCE%</b> - Текст до первого перевода<br/>
                                        <b>%NOW_DATE%</b> - Текущая дата в формате 06.08.2020<br/>
                                        <b>%NOW_TIME%</b> - Текущее время в формате 23:00<br/>
                                        <b>%PERCENT_SYN%</b> - Процент синонимизации<br/>
                                        <b>%TAGS_SCRAPE%</b> - Теги<br/>
                                        <b>%RNDKEY_1%</b> - Случайный кейворд1 <b>слово1|слово2|слово3</b><br/>
                                        <b>%RNDKEY_2%</b> - Случайный кейворд2 <b>слово4|слово5|слово6</b><br/><br/>
                                        <b><?php
                                            echo htmlentities('<br/><a href="%SOURCE_URL%">Источник</a>', 0, 'utf-8');
                                            ?></b> - пример ссылки на источник
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
            <legend>Cлучайный кейворд</legend>
            <table>
                <tr>
                    <td>%RNDKEY_1%</td>
                        <td><input type="text" name="params[rnd_keywrd_1]" style="width:850px" value="<?php
                            echo $row['params']['rnd_keywrd_1'];
                            ?>"/></td>
                </tr>
                <tr>
                    <td>%RNDKEY_2%</td>
                        <td><input type="text" name="params[rnd_keywrd_2]" style="width:850px" value="<?php
                            echo $row['params']['rnd_keywrd_2'];
                            ?>"/></td>
                </tr>
            </table>
        </div>


        <!--Дополнительно-->
        <div class="tab-content" id="div_tab9"<?php
        echo $tab == 9 ? ' style="display: block;"' : '';
        ?>>
            <table class="tab-content-table">
                <tr>
                    <td width="225">Для запросов использовать метод</td>
                    <td><?php
                        echo WPGHelper::selectList('params[requestMethod]', array(
                            '0' => 'по умолчанию',
                            '1' => 'CURL',
                            '2' => 'file_get_contents',
                            '3' => 'fsockopen'
                        ), $row['params']['requestMethod'], 1);
                        ?></td>
                </tr>
            </table>
            <fieldset>
                <legend>Обработка фильтр-слов</legend>
                <table>
                    <tr>
                        <td width="215">Включить обработку фильтр-слов</td>
                        <td><?php
                            echo WPGHelper::yesNoRadioList('params[filter_words_on]', $row['params']['filter_words_on']);
                            ?></td>
                    </tr>
                    <tr>
                        <td>Искать слова</td>
                        <td><?php
                            echo WPGHelper::selectList('params[filter_words_where]', array(
                                'title' => 'в заголовке',
                                'text' => 'в тексте',
                                'title+text' => 'в заголовке и тексте'
                            ), $row['params']['filter_words_where'], 1);
                            ?></td>
                    </tr>
                    <tr>
                        <td>При появлении слов</td>
                        <td><?php
                            echo WPGHelper::selectList('params[filter_words_save]', array(
                                'сохранять записи',
                                'не сохранять записи'
                            ), $row['params']['filter_words_save'], 1);
                            ?></td>
                    </tr>
                    <tr>
                        <td valign="top">Список фильтр-слов <br>(если несколько, то через запятую)</td>
                        <td><textarea name="params[filter_words_list]" style="width: 450px; height: 70px;"><?php
                                echo $row['params']['filter_words_list'];
                                ?></textarea></td>
                    </tr>
                </table>
            </fieldset>
            <?php
            if (wpgIsStandard()):
                ?>
                <fieldset>
                    <legend>Синонимизация через сервис Synonyma.ru</legend>
                    <table class="tab-content-table">
                        <tr>
                            <td width="220">Включить синонимизацию</td>
                            <td><?php
                                echo WPGHelper::yesNoRadioList('params[synonyma_on]', $row['params']['synonyma_on']);
                                ?></td>
                        </tr>
                    </table>
                </fieldset>
                <?php
            endif;
            ?>
        </div>
        <input type="hidden" name="row[id]" value="<?php
        echo $row['id'];
        ?>">

        <div class="button-panel">
            <?php
            submit_button($isNew ? 'Сохранить' : 'Сохранить изменения', 'primary');
            ?>
            <?php
            submit_button('Применить', 'secondary', 'apply', false, array(
                #'onclick' => "this.form.action='?page=wpgrabber-edit&act=apply';"
                'onclick' => "this.form.action='?page=wpgrabber-edit&act=apply&id=".$row['id']."';"
            ));
            ?>
            <?php
            if (!$isNew):
                ?>
                <?php
                submit_button('Тест импорта', 'secondary', 'ajax-button-test', false, array(
                    'onclick' => 'wpgrabberRun(' . $row['id'] . ', true); return false;'
                ));
                ?>
                <?php
                submit_button('Импорт', 'secondary', 'ajax-button-exec', false, array(
                    'onclick' => 'wpgrabberRun(' . $row['id'] . ', false); return false;'
                ));
                ?>
                <?php
            endif;
            ?>
            <?php
            submit_button('Отмена', 'secondary', 'cancel', false, array(
                'onclick' => "this.form.action='?page=wpgrabber-index';"
            ));
            ?>
        </div>
    </form>

</div><br><br>