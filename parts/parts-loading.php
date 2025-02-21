<?php
/*
 * this is default page.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();

$loading_logo_image = esc_html(get_theme_mod('loading_logo_image', false));
$loading_alt = esc_textarea(get_theme_mod('loading_alt_setting', false));
$loading_text = esc_textarea(get_theme_mod('loading_text_setting', false));
$loading_time_setting = esc_html(get_theme_mod('loading_time_setting', 1));
$loading_time = $loading_time_setting . '000';

?>

<div class="loading">
    <?php if ($loading_logo_image) : ?>
        <div class="loading__logo">
            <div class="loading__logo__inner">
                <img src="<?php echo $loading_logo_image; ?>" alt=" <?php echo $loading_alt; ?>" loading="eager">
            </div>
        </div>
    <?php endif; ?>

    <?php if ($loading_text) : ?>
        <div class="loading__text">
            <div class="loading__text__inner">
                <p><?php echo $loading_text; ?></p>
            </div>
        </div>
    <?php endif; ?>

    <span class="loader"><span class="loader-inner"></span></span>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const webStorage = function() {
            const loadingBg = document.querySelector(".loading");
            setTimeout(() => {
                loadingBg.classList.add("show"); // クラスを追加
            }, 500);

            if (sessionStorage.getItem('visit')) {
                // ローディング画面を即座に非表示
                loadingBg.style.display = "none";
            } else {
                // 初めての訪問としてフラグをセット
                sessionStorage.setItem('visit', 'true');

                // 4秒後にクラスを追加
                setTimeout(() => {
                    loadingBg.classList.add("hidden"); // クラスを追加

                    // さらに1秒後に非表示にする
                    setTimeout(() => {
                        loadingBg.style.display = "none";
                    }, 3000); // 1秒（1000ミリ秒）遅延
                }, <?php echo $loading_time; ?>); // 4秒（4000ミリ秒）遅延
            }
        };
        webStorage();
    });
</script>