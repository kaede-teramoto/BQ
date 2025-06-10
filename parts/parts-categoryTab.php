<?php
$theme_url = get_template_directory_uri();
$blog_url = get_post_type_archive_link('post');

$category = get_queried_object();
$category_slug = $category->slug;

$cms_design = esc_attr(get_theme_mod('archive_cms_design', '01'));
$categories = get_categories(array(
    'hide_empty' => true // 投稿がないカテゴリは除外
));

if (is_post_type_archive()) : ?>
    <div class="cms__cat cms<?php echo $cms_design; ?>__cat">
        <p class="cms__cat__title cms<?php echo $cms_design; ?>__cat__title">カテゴリー</p>
        え
    </div>

<?php else : ?>

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
            <?php if (is_tag()) { ?>
                <a href="<?php echo $blog_url; ?>">
                    ALL
                </a>

            <?php } else { ?>
                <a class="--active" href="<?php echo $blog_url; ?>">
                    ALL
                </a>
            <?php } ?>
        </li>
        <?php
        // 各タグをループして表示
        foreach ($tags as $tag) {
            $active_class = ($current_tag_id === $tag->term_id) ? ' --active' : ''; ?>
            <li class="cms__cat__item cms<?php echo $cms_design ?>__cat__item cms__tag__item cms<?php echo $cms_design ?>__tag__item">
    <?php
            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="' . $active_class . '">' . esc_html($tag->name)  . '</a>';
        }
        echo '</li>';
        echo '</ul>';
        echo '</div>';
    }
endif; ?>