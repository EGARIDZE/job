<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)):?>

    <div class="col-xl-6 col-lg-7">
        <div class="main-menu  d-none d-lg-block">
            <nav>
                <ul id="navigation">
                    <?php
                    $prevDepth = 0;
                    foreach ($arResult as $item) {
                        // закрываем списки, если спустились вверх
                        if ($prevDepth > $item['DEPTH_LEVEL']) {
                            echo str_repeat('</ul></li>', $prevDepth - $item['DEPTH_LEVEL']);
                        }

                        if ($item['DEPTH_LEVEL'] == 1) {
                            // открываем новую <li>
                            echo '<li>';
                            // выводим ссылку; если есть дочерние — добавляем иконку и новый <ul>
                            echo '<a href="'.$item['LINK'].'">'.$item['TEXT']
                                . ($item['IS_PARENT'] ? ' <i class="ti-angle-down"></i>' : '')
                                . '</a>';
                            if ($item['IS_PARENT']) {
                                echo '<ul class="submenu">';
                            } else {
                                echo '</li>';
                            }
                        } else {
                            // пункт второго уровня
                            echo '<li><a href="'.$item['LINK'].'">'.$item['TEXT'].'</a></li>';
                        }

                        $prevDepth = $item['DEPTH_LEVEL'];
                    }
                    // в конце закрываем то, что осталось
                    if ($prevDepth > 1) {
                        echo str_repeat('</ul></li>', $prevDepth - 1);
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>


<?php endif?>





