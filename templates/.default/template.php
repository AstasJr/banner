<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="slider">
    <div class="swiper-container intro delay-1 hidden">
        <div class="swiper-wrapper">
            <?php foreach ($arResult['ITEMS'] as $arItem):?>
            <div class="swiper-slide" style="background-image:url(<?=$arItem['PREVIEW_PICTURE_SRC']?>);">
                <div class="main-banner-bg">
                    <div class="main-banner-bg-wrap">
                        <h2><?=$arItem['PROPERTY_TITLE_VALUE']?></h2>
                        <h5><?=$arItem['~PREVIEW_TEXT']?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</div>