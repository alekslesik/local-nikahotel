<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?if (!empty($arResult)):?>
    <div id='section_element_menu'>
        <ul id="vertical-multilevel-menu" class="vertical-multilevel-menu">

    <?php
    $previousLevel = 0;
	
	?><pre style='display: none;'>[<?print_r($arParams["MAX_LEVEL"]);?>]</pre><?
	
	foreach ($arResult as $k => $arItem)
	{
		if ($arItem["DEPTH_LEVEL"] > $arParams["MAX_LEVEL"])
		{
			unset($arResult[$k]);
		}
		else if ($arItem["DEPTH_LEVEL"] == $arParams["MAX_LEVEL"] && $arItem["IS_PARENT"])
		{
			$arResult[$k]["IS_PARENT"] = false;
			$arResult[$k]["PARAMS"]["IS_PARENT"] = false;
		}
		
	}
    
    foreach($arResult as $arItem):?>
            <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                    <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <?endif?>

            <?if ($arItem["IS_PARENT"]):?>

                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
        <?php 
//showme_var($arItem);
?>
                            <li class="<?if ($arItem['SELECTED']):?>menu-section-active2<?else:?>menu-section<?endif?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem['SELECTED']):?>menu-name menu-name-active2<?else:?>menu-name<?endif?>"><?=$arItem["TEXT"]?></a>
                                    <ul class="<?if ($arItem['SELECTED']):?>menu-element-list-active2<?else:?>menu-element-list<?endif?>">
                    <?else:?>
                            <li class="<?if ($arItem['SELECTED']):?>menu-element-items-active2<?else:?>menu-element-items<?endif?>"><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem['SELECTED']):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
                                    <ul class="<?if ($arItem['SELECTED']):?>menu-element-list-active3<?else:?>menu-element-list<?endif?>">
                    <?endif?>

            <?else:?>  
                    <?if ($arItem["PERMISSION"] > "D"):?>

                            <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                    <li class="<?if ($arItem['SELECTED']):?>menu-section-drive-active<?else:?>menu-section<?endif?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem['SELECTED']):?>menu-name menu-name-active2<?else:?>menu-name<?endif?>"><?=$arItem["TEXT"]?></a></li>
                            <?else:?>
                                    <li class="<?if ($arItem['SELECTED']):?>menu-element-items-active2<?else:?>menu-element-items<?endif?>"><a href="<?=$arItem['LINK']?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
                            <?endif?>

                    <?else:?>

                            <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                    <li class="<?if ($arItem['SELECTED']):?>menu-section-drive-active<?else:?>menu-section<?endif?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem['SELECTED']):?>menu-name menu-name-active2<?else:?>menu-name<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                            <?else:?>
                                    <li class="<?if ($arItem['SELECTED']):?>menu-element-items-active2<?else:?>menu-element-items<?endif?>"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                            <?endif?>

                    <?endif?>

            <?endif?>

            <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

    <?endforeach?>

    <?if ($previousLevel > 1)://close last item tags?>
            <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
    <?endif?>

    </ul>
</div>
<?endif?>