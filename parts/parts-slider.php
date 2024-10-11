<?php
/*
 * This is slider parts.
 *
 * @package BOUTiQ
 */

// 現在の投稿のIDを取得
$post_id = get_the_ID();

// サブタイトルとページ概要を取得
$subTitle = get_post_meta($post_id, '_custom_subtitle', true);
$pageSummary = get_post_meta($post_id, '_custom_page_summary', true);

$fv_type = get_theme_mod('top_fv_type', '01');
$fv_text_animation = get_theme_mod('top_fv_text_animation', 'fade');

$fv_img1 = esc_url(get_theme_mod('top_fv_image_setting_1', ''));
$fv_img2 = esc_url(get_theme_mod('top_fv_image_setting_2', ''));
$fv_img3 = esc_url(get_theme_mod('top_fv_image_setting_3', ''));
$fv_img4 = esc_url(get_theme_mod('top_fv_image_setting_4', ''));
$fv_img5 = esc_url(get_theme_mod('top_fv_image_setting_5', ''));

$fv_img1_link = esc_url(get_theme_mod('top_fv_link_1', ''));
$fv_img2_link = esc_url(get_theme_mod('top_fv_link_2', ''));
$fv_img3_link = esc_url(get_theme_mod('top_fv_link_3', ''));
$fv_img4_link = esc_url(get_theme_mod('top_fv_link_4', ''));
$fv_img5_link = esc_url(get_theme_mod('top_fv_link_5', ''));

$fv_link_target_1 = get_theme_mod('top_fv_link_target_1', false);
$fv_link_target_2 = get_theme_mod('top_fv_link_target_2', false);
$fv_link_target_3 = get_theme_mod('top_fv_link_target_3', false);
$fv_link_target_4 = get_theme_mod('top_fv_link_target_4', false);
$fv_link_target_5 = get_theme_mod('top_fv_link_target_5', false);


$fv_heading1 = nl2br(esc_html(get_theme_mod('top_fv_heading_1', '')));
$fv_heading2 = nl2br(esc_html(get_theme_mod('top_fv_heading_2', '')));
$fv_heading3 = nl2br(esc_html(get_theme_mod('top_fv_heading_3', '')));
$fv_heading4 = nl2br(esc_html(get_theme_mod('top_fv_heading_4', '')));
$fv_heading5 = nl2br(esc_html(get_theme_mod('top_fv_heading_5', '')));

$fv_text1 = nl2br(esc_html(get_theme_mod('top_fv_text_1', '')));
$fv_text2 = nl2br(esc_html(get_theme_mod('top_fv_text_2', '')));
$fv_text3 = nl2br(esc_html(get_theme_mod('top_fv_text_3', '')));
$fv_text4 = nl2br(esc_html(get_theme_mod('top_fv_text_4', '')));
$fv_text5 = nl2br(esc_html(get_theme_mod('top_fv_text_5', '')));

$fv_text_color1 = get_theme_mod('top_fv_text_color1', '');
$fv_text_color2 = get_theme_mod('top_fv_text_color2', '');
$fv_text_color3 = get_theme_mod('top_fv_text_color3', '');
$fv_text_color4 = get_theme_mod('top_fv_text_color4', '');
$fv_text_color5 = get_theme_mod('top_fv_text_color5', '');

$fv_text_bottom_position1 = get_theme_mod('top_fv_text_bottom_position_1', '');
$fv_text_bottom_position2 = get_theme_mod('top_fv_text_bottom_position_2', '');
$fv_text_bottom_position3 = get_theme_mod('top_fv_text_bottom_position_3', '');
$fv_text_bottom_position4 = get_theme_mod('top_fv_text_bottom_position_4', '');
$fv_text_bottom_position5 = get_theme_mod('top_fv_text_bottom_position_5', '');

$fv_text_left_position1 = get_theme_mod('top_fv_text_left_position_1', '');
$fv_text_left_position2 = get_theme_mod('top_fv_text_left_position_2', '');
$fv_text_left_position3 = get_theme_mod('top_fv_text_left_position_3', '');
$fv_text_left_position4 = get_theme_mod('top_fv_text_left_position_4', '');
$fv_text_left_position5 = get_theme_mod('top_fv_text_left_position_5', '');

?>

<?php if ($fv_type == 01) :
    get_template_part('parts/parts', 'pageTitle'); ?>

<?php elseif ($fv_type == 02) : ?>
    <section class="p-top swiper">
        <ul class="swiper-wrapper">
            <?php if ($fv_img1) { ?>
                <li class="swiper-slide">
                    <?php if ($fv_img1_link) { ?>
                        <a href="<?php echo $fv_img1_link; ?>" <?php if ($fv_link_target_1) {
                                                                    echo ' target="_blank"';
                                                                } ?>>
                            <?php if ($fv_heading1 || $fv_text1) { ?>
                                <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color1; ?>;bottom:<?php echo $fv_text_bottom_position1; ?>;left:<?php echo $fv_text_left_position1; ?>;">
                                    <?php if ($fv_heading1) { ?>
                                        <h2 class="p-top__subtitle"><?php echo $fv_heading1; ?></h2>
                                    <?php } ?>
                                    <?php if ($fv_text1) { ?>
                                        <p class="p-top__text"><?php echo $fv_text1; ?></p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $fv_img1; ?>" alt="" />
                        </a>
                    <?php } else { ?>
                        <?php if ($fv_heading1 || $fv_text1) { ?>
                            <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color1; ?>;bottom:<?php echo $fv_text_bottom_position1; ?>;left:<?php echo $fv_text_left_position1; ?>;">
                                <?php if ($fv_heading1) { ?>
                                    <h2 class="p-top__subtitle"><?php echo $fv_heading1; ?></h2>
                                <?php } ?>
                                <?php if ($fv_text1) { ?>
                                    <p class="p-top__text"><?php echo $fv_text1; ?></p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <img src="<?php echo $fv_img1; ?>" alt="" />
                    <?php } ?>
                </li>
            <?php } ?>

            <?php if ($fv_img2) { ?>
                <li class="swiper-slide">
                    <?php if ($fv_img2_link) { ?>
                        <a href="<?php echo $fv_img2_link; ?>" <?php if ($fv_link_target_2) {
                                                                    echo ' target="_blank"';
                                                                } ?>>
                            <?php if ($fv_heading2 || $fv_text2) { ?>
                                <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color2; ?>;bottom:<?php echo $fv_text_bottom_position2; ?>;left:<?php echo $fv_text_left_position2; ?>;">
                                    <?php if ($fv_heading2) { ?>
                                        <h2 class="p-top__subtitle"><?php echo $fv_heading2; ?></h2>
                                    <?php } ?>
                                    <?php if ($fv_text2) { ?>
                                        <p class="p-top__text"><?php echo $fv_text2; ?></p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $fv_img2; ?>" alt="" />
                        </a>
                    <?php } else { ?>
                        <?php if ($fv_heading2 || $fv_text2) { ?>
                            <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color2; ?>;bottom:<?php echo $fv_text_bottom_position2; ?>;left:<?php echo $fv_text_left_position2; ?>;">
                                <?php if ($fv_heading2) { ?>
                                    <h2 class="p-top__subtitle"><?php echo $fv_heading2; ?></h2>
                                <?php } ?>
                                <?php if ($fv_text2) { ?>
                                    <p class="p-top__text"><?php echo $fv_text2; ?></p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <img src="<?php echo $fv_img2; ?>" alt="" />
                    <?php } ?>
                </li>
            <?php } ?>

            <?php if ($fv_img3) { ?>
                <li class="swiper-slide">
                    <?php if ($fv_img3_link) { ?>
                        <a href="<?php echo $fv_img3_link; ?>" <?php if ($fv_link_target_3) {
                                                                    echo ' target="_blank"';
                                                                } ?>>
                            <?php if ($fv_heading3 || $fv_text3) { ?>
                                <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color3; ?>;bottom:<?php echo $fv_text_bottom_position3; ?>;left:<?php echo $fv_text_left_position3; ?>;">
                                    <?php if ($fv_heading3) { ?>
                                        <h2 class="p-top__subtitle"><?php echo $fv_heading3; ?></h2>
                                    <?php } ?>
                                    <?php if ($fv_text3) { ?>
                                        <p class="p-top__text"><?php echo $fv_text3; ?></p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $fv_img3; ?>" alt="">
                        </a>
                    <?php } else { ?>
                        <?php if ($fv_heading3 || $fv_text3) { ?>
                            <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color3; ?>;bottom:<?php echo $fv_text_bottom_position3; ?>;left:<?php echo $fv_text_left_position3; ?>;">
                                <?php if ($fv_heading3) { ?>
                                    <h2 class="p-top__subtitle"><?php echo $fv_heading3; ?></h2>
                                <?php } ?>
                                <?php if ($fv_text3) { ?>
                                    <p class="p-top__text"><?php echo $fv_text3; ?></p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <img src="<?php echo $fv_img3; ?>" alt="">
                    <?php } ?>
                </li>
            <?php } ?>

            <?php if ($fv_img4) { ?>
                <li class="swiper-slide">
                    <?php if ($fv_img4_link) { ?>
                        <a href="<?php echo $fv_img4_link; ?>" <?php if ($fv_link_target_4) {
                                                                    echo ' target="_blank"';
                                                                } ?>>
                            <?php if ($fv_heading4 || $fv_text4) { ?>
                                <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color4; ?>;bottom:<?php echo $fv_text_bottom_position4; ?>;left:<?php echo $fv_text_left_position4; ?>;">
                                    <?php if ($fv_heading4) { ?>
                                        <h2 class="p-top__subtitle"><?php echo $fv_heading4; ?></h2>
                                    <?php } ?>
                                    <?php if ($fv_text4) { ?>
                                        <p class="p-top__text"><?php echo $fv_text4; ?></p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $fv_img4; ?>" alt="">
                        </a>
                    <?php } else { ?>
                        <?php if ($fv_heading4 || $fv_text4) { ?>
                            <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color4; ?>;bottom:<?php echo $fv_text_bottom_position4; ?>;left:<?php echo $fv_text_left_position4; ?>;">
                                <?php if ($fv_heading4) { ?>
                                    <h2 class="p-top__subtitle"><?php echo $fv_heading4; ?></h2>
                                <?php } ?>
                                <?php if ($fv_text4) { ?>
                                    <p class="p-top__text"><?php echo $fv_text4; ?></p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <img src="<?php echo $fv_img4; ?>" alt="">
                    <?php } ?>
                </li>
            <?php } ?>

            <?php if ($fv_img5) { ?>
                <li class="swiper-slide">
                    <?php if ($fv_img5_link) { ?>
                        <a href="<?php echo $fv_img5_link; ?>" <?php if ($fv_link_target_5) {
                                                                    echo ' target="_blank"';
                                                                } ?>>
                            <?php if ($fv_heading5 || $fv_text5) { ?>
                                <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color5; ?>;bottom:<?php echo $fv_text_bottom_position5; ?>;left:<?php echo $fv_text_left_position5; ?>;">
                                    <?php if ($fv_heading5) { ?>
                                        <h2 class="p-top__subtitle"><?php echo $fv_heading5; ?></h2>
                                    <?php } ?>
                                    <?php if ($fv_text5) { ?>
                                        <p class="p-top__text"><?php echo $fv_text5; ?></p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $fv_img5; ?>" alt="">
                        </a>
                    <?php } else { ?>
                        <?php if ($fv_heading5 || $fv_text5) { ?>
                            <div class="swiper-catch fv-<?php echo $fv_text_animation; ?>" style="color:<?php echo $fv_text_color5; ?>;bottom:<?php echo $fv_text_bottom_position5; ?>;left:<?php echo $fv_text_left_position5; ?>;">
                                <?php if ($fv_heading5) { ?>
                                    <h2 class="p-top__subtitle"><?php echo $fv_heading5; ?></h2>
                                <?php } ?>
                                <?php if ($fv_text5) { ?>
                                    <p class="p-top__text"><?php echo $fv_text5; ?></p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <img src="<?php echo $fv_img5; ?>" alt="">
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
        <div class="swiper-pagination"></div>
        <!-- 前後の矢印 -->
        <div class="swiper-btn">
            <div class="swiper-btn-prev swiper-btn-black"></div>
            <div class="swiper-btn-next swiper-btn-white"></div>
        </div>
    </section>
<?php elseif ($fv_type == 03) :
    get_template_part('parts/parts', 'originalSlider'); ?>

<?php else : ?>
<?php endif; ?>