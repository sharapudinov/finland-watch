<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arParams);
$this->setFrameMode(true);

/*$arAllMapOptions = array_merge($arResult['ALL_MAP_OPTIONS'], $arResult['ALL_MAP_CONTROLS']);
$arMapOptions = array_merge($arParams['OPTIONS'], $arParams['CONTROLS']);
*/?><!--
<script type="text/javascript">
    if (!window.GLOBAL_arMapObjects)
        window.GLOBAL_arMapObjects = {};

    function init_<?/*echo $arParams['MAP_ID']*/?>() {
        if (!window.google && !window.google.maps)
            return;

        var opts = {
            zoom: <?/*echo $arParams['INIT_MAP_SCALE']*/?>,
            center: new google.maps.LatLng(<?/*echo $arParams['INIT_MAP_LAT']*/?>, <?/*echo $arParams['INIT_MAP_LON']*/?>),
            <?/*
            foreach ($arAllMapOptions as $option => $method)
            {

                echo "\t\t".(
                    in_array($option, $arMapOptions)
                    ? str_replace(array('#true#', '#false#'), array('true', 'false'), $method)
                    : str_replace(array('#false#', '#true#'), array('true', 'false'), $method)
                ).",\r\n";
            }
            */?>

            mapTypeId: google.maps.MapTypeId.<?/*echo $arParams['INIT_MAP_TYPE']*/?>

        };

        window.GLOBAL_arMapObjects['<?/*echo $arParams['MAP_ID']*/?>'] = new window.google.maps.Map(BX("BX_GMAP_<?/*echo $arParams['MAP_ID']*/?>"), opts);

        var myLatlng = new google.maps.LatLng(55.76, 37.64);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: window.GLOBAL_arMapObjects['<?/*echo $arParams['MAP_ID']*/?>'],
            title: "Finland watch"
        });
        <?/*
        if ($arParams['DEV_MODE'] == 'Y'):
        */?>
        window.bGoogleMapScriptsLoaded = true;
        <?/*
        endif;
        */?>
    }

    <?/*
    if ($arParams['DEV_MODE'] == 'Y'):
    */?>
    function BXMapLoader_<?/*echo $arParams['MAP_ID']*/?>(MAP_KEY) {
        if (null == window.bGoogleMapScriptsLoaded) {
            if (window.google && window.google.maps) {
                window.bGoogleMapScriptsLoaded = true;
                BX.ready(init_<?/*echo $arParams['MAP_ID']*/?>);
            }
            else {
                if (window.bGoogleMapsScriptLoading) {
                    window.bInt<?/*echo $arParams['MAP_ID']*/?> = setInterval(
                        function () {
                            if (window.bGoogleMapScriptsLoaded) {
                                clearInterval(window.bInt<?/*echo $arParams['MAP_ID']*/?>);
                                init_<?/*echo $arParams['MAP_ID']*/?>();
                            }
                            else
                                return;
                        },
                        500
                    );

                    return;
                }

                window.bGoogleMapsScriptLoading = true;

                <?/*$scheme = (CMain::IsHTTPS() ? "https" : "http");*/?>

                BX.loadScript(
                    '<?/*=$scheme*/?>://www.google.com/jsapi?rnd=' + Math.random(),
                    function () {
                        if (BX.browser.IsIE())
                            setTimeout("window.google.load('maps', <?/*= intval($arParams['GOOGLE_VERSION'])*/?>, {callback: init_<?/*echo $arParams['MAP_ID']*/?>, other_params: 'sensor=false&language=<?/*= LANGUAGE_ID*/?>'})", 1000);
                        else
                            google.load('maps', <?/*echo intval($arParams['GOOGLE_VERSION'])*/?>, {
                                callback: init_<?/*echo $arParams['MAP_ID']*/?>,
                                other_params: 'sensor=false&language=<?/*=LANGUAGE_ID*/?>'
                            });
                    }
                );
            }
        }
        else {
            init_<?/*echo $arParams['MAP_ID']*/?>();
        }
    }
    <?/*
        if (!$arParams['WAIT_FOR_EVENT']):
    */?>
    BXMapLoader_<?/*echo $arParams['MAP_ID']*/?>('<?/*echo $arParams['KEY']*/?>');
    <?/*
        else:
            echo CUtil::JSEscape($arParams['WAIT_FOR_EVENT']),' = BXMapLoader_',$arParams['MAP_ID'],';';
        endif;
    else:
    */?>
    BX.ready(init_<?/*echo $arParams['MAP_ID']*/?>);
    <?/*
    endif;
    */?>

    /* if map inits in hidden block (display:none),
     *  after the block showed,
     *  for properly showing map this function must be called
     */
    function BXMapGoogleAfterShow(mapId) {
        if (google.maps !== undefined && window.GLOBAL_arMapObjects[mapId] !== undefined)
            google.maps.event.trigger(window.GLOBAL_arMapObjects[mapId], 'resize');
    }

</script>-->


<div id="service-centr-block" class="link-map">
    <div class="tabulator pickup-link-map">
        <ul class="a_tabulator">
            <li class="a_active"><i></i><span src="https://www.google.com/maps/d/embed?mid=z7Mv27iIHK0M.kUguOEhwaB_A" onmousedown="switchComm(this)">Санкт-Петербург</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.kNyK-ZSfsF-o&hl=ru" onmousedown="switchComm(this)">Нижний Новгород</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.kffRMIdYQW2c&hl=ru" onmousedown="switchComm(this)">Екатеринбург</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.kqDaNH9OTwNA&hl=ru" onmousedown="switchComm(this)">Ростов-на-Дону</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.kcMYJHeAyHHw&hl=ru" onmousedown="switchComm(this)">Тюмень</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.k_KJn1HQemlc&hl=ru" onmousedown="switchComm(this)">Челябинск</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.kciIe-JUyDSM&hl=ru" onmousedown="switchComm(this)">Тверь</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.k8rknEl7LgbY&hl=ru" onmousedown="switchComm(this)">Калуга</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.kr77E5_MM9ME&hl=ru" onmousedown="switchComm(this)">Орел</span></li>
            <li><i></i><span src="https://www.google.com/maps/d/embed?mid=zexNMgH_shr4.k2yloBYwvZE8&hl=ru" onmousedown="switchComm(this)">Ярославль</span></li>
        </ul>
        <div class="a_content">
            <div class="map-two">
                <iframe id="map-samovivoz" src="https://www.google.com/maps/d/embed?mid=z7Mv27iIHK0M.kUguOEhwaB_A" width="640" height="480"></iframe>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
    function switchComm(tab){
        parent = tab.parentNode;
        if(jQuery(parent).hasClass('a_active')) return true;
        jQuery('.a_active').toggleClass('a_active');
        jQuery(parent).toggleClass('a_active');
        jQuery("#map-samovivoz").attr('src',jQuery(tab).attr('src'));
    }

</script>
