<?php
/*
 * this is category page.
 *
 *
 * @package BOUTiQ
 */

// $site_url  = home_url();
$theme_url = get_template_directory_uri();
$blog_url = get_post_type_archive_link('post');

$category = get_queried_object();
$category_slug = $category->slug;

get_header();
if (!is_singular()) :
    $cms_design = esc_attr(get_theme_mod('archive_cms_design', '01'));
    $categories = get_categories(array(
        'hide_empty' => true // 投稿がないカテゴリは除外
    ));
?>
    <?php // Content for page
    get_template_part('parts/parts', 'cmsTitle'); ?>

    <div class="cms__wrapper cms<?php echo $cms_design; ?>__wrapper">
        <div class="cms cms<?php echo $cms_design; ?>">

            <div class="cms__cat cms<?php echo $cms_design; ?>__cat">
                <p class="cms__cat__title cms<?php echo $cms_design; ?>__cat__title">カテゴリー</p>
                <?php
                $catlists = get_categories(array(
                    'orderby' => 'name',
                    'order' => 'ASC'
                ));
                echo '<ul class="cms__cat__list cms' . $cms_design . '__cat__list">'; ?>
                <li class="cms__cat__item cms<?php echo $cms_design ?>__cat__item">
                    <a href="<?php echo $blog_url; ?>">
                        ALL
                    </a>
                </li>
                <?php
                foreach ($catlists as $catlist) {
                    if ($catlist->slug == $category_slug) : ?>
                        <li class="cms__cat__item cms<?php echo $cms_design ?>__cat__item">
                            <a class="--active" href="<?php echo get_category_link($catlist->term_id); ?>">
                                <?php echo $catlist->name; ?>
                            </a>
                        </li>
                    <?php
                    else : ?>
                        <li class="cms__cat__item cms<?php echo $cms_design ?>__cat__item">
                            <a href="<?php echo get_category_link($catlist->term_id); ?>">
                                <?php echo $catlist->name; ?>
                            </a>
                        </li>
                <?php endif;
                }
                echo '</ul>';
                ?>
            </div>
            <?php
            // タグがあるか確認
            $tags = get_tags(array(
                'orderby' => 'count', // カウント数で並び替え
                'order'   => 'DESC'   // 降順
            ));
            $current_tag_id = is_tag() ? get_queried_object_id() : null;

            // タグが存在する場合のみ実行
            if ($tags) {
                // タグを登録数の多い順にソート
                $tags = wp_list_sort($tags, 'count', 'DESC');
                echo '<div class="cms__cat cms' . $cms_design . '__cat cms__tag cms' . $cms_design . '__tag">';
                echo '<p class="cms__cat__title cms' . $cms_design . '__cat__title">タグ</p>';
                echo '<ul class="cms__cat__list cms' . $cms_design . '__cat__list cms__tag__list cms' . $cms_design . '__tag__list">'; ?>
                <li class="cms__cat__item cms<?php echo $cms_design ?>__cat__item cms__tag__item cms<?php echo $cms_design ?>__tag__item">
                    <a class="--active" href="<?php echo $blog_url; ?>">
                        ALL
                    </a>
                </li>
                <?php
                // 各タグをループして表示
                foreach ($tags as $tag) {
                    $active_class = ($current_tag_id === $tag->term_id) ? ' --active' : ''; ?>
                    <li class="cms__cat__item cms<?php echo $cms_design ?>__cat__item cms__tag__item cms<?php echo $cms_design ?>__tag__item">
                <?php
                    echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="' . $active_class . '">' . esc_html($tag->name) . '</a>';
                }
                echo '</li>';
                echo '</ul>';
                echo '</div>';
            }
                ?>

                <div class="cms__content cms<?php echo $cms_design; ?>__content">

                    <?php if (have_posts()): while (have_posts()): the_post(); ?>

                            <div class="cms__post cms<?php echo $cms_design; ?>__post">
                                <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                    <div class="cms__post__thumbnail cms<?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="cms__post__thumbnail__link cms<?php echo $cms_design; ?>__post__thumbnail__link" href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else : /* 登録されていなかったら */ ?>
                                    <div class="cms__post__thumbnail cms<?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="cms__post__thumbnail__link cms<?php echo $cms_design; ?>__post__thumbnail__link" href="<?php the_permalink() ?>">
                                            <img src="<?php echo $theme_url; ?>/assets/images/common/dummy.png" alt="" loading="lazy">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="cms__post__cat cms<?php echo $cms_design; ?>__post__cat">
                                    <?php cat_link(); ?>
                                </div>
                                <div class="cms__post__date cms<?php echo $cms_design; ?>__post__date"><?php the_time('Y.m.d'); ?></div>
                                <div class="cms__post__title cms<?php echo $cms_design; ?>__post__title">
                                    <a class="cms__post__link cms<?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                        <?php echo mb_substr($post->post_title, 0, 120) . ''; ?>
                                    </a>
                                </div>
                            </div>
                    <?php endwhile;
                    endif;
                    wp_reset_query(); ?>
                </div>
                <?php
                // ページネーションを生成する
                $pagination = get_the_posts_pagination(array(
                    'mid_size'  => 1,
                    'prev_text' => '前の一覧へ',
                    'next_text' => '次の一覧へ',
                    'type'      => 'list', // リスト形式のページネーション
                    'echo'      => false,  // 直接出力せずに、変数に格納
                ));

                // ページネーションが存在する場合、<div>で囲んで出力
                if (! empty($pagination)) {
                    echo '<div class="cms__pagination">';
                    echo $pagination;
                    echo '</div>';
                }
                ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('#itemTab a').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // すべてのタブから "active" クラスを削除する
                document.querySelectorAll('#itemTab a').forEach(tab => {
                    tab.classList.remove('--active');
                });

                // すべてのPanelから "active" クラスを削除する
                document.querySelectorAll('.tab__panel').forEach(tabPane => {
                    tabPane.classList.remove('--active');
                });

                // クリックされたタブに "active" クラスを追加する
                this.classList.add('--active');

                // 関連するタブコンテンツを表示する
                const activeTabId = this.getAttribute('href');
                const targetChar = "#";
                const tabId = activeTabId.replace(targetChar, "");
                const activeTabContent = document.getElementById(tabId);
                if (activeTabContent) {
                    activeTabContent.classList.add('--active');
                }
            });
        });
    </script>

<?php else : ?>
    <?php if (have_posts()) : ?>
        <div class="p-post">
            <?php while (have_posts()) : the_post(); ?>
                <article class="p-post__entry">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="p-post__entry__img"><?php the_post_thumbnail('full'); ?></div>
                    <?php endif; ?>
                    <?php
                    cat_link();
                    ?>
                    <div class="p-post__entry__date">
                        <?php the_time('Y.m.d'); ?>
                    </div>
                    <h1 class="p-post__entry__title"><?php the_title(); ?></h1>
                    <div class="p-post__entry__content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php endif ?>

<?php get_footer(); ?>