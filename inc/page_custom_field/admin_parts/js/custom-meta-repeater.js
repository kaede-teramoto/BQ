jQuery(document).ready(function ($) {

    function refreshParentIndexes() {
        $('.parent-repeater-wrapper .parent-repeater-group').each(function (parentIndex) {
            $(this).find('input, textarea').each(function () {
                var name = $(this).attr('name');
                if (name) {
                    name = name.replace(/page_custom_repeater\[parents\]\[\d+\]/, 'page_custom_repeater[parents][' + parentIndex + ']');
                    $(this).attr('name', name);
                }
            });

            updateParentHeaderTitle($(this), parentIndex);

            var postId = $('input#post_ID').val();
            var key = 'custom_repeater_parent_' + postId + '_' + parentIndex;
            var isOpen = $(this).find('.parent-repeater-content').is(':visible');
            saveToggleState(key, isOpen);

            refreshChildIndexes(parentIndex);
            refreshImagePreviews($(this));
        });
    }

    function refreshChildIndexes(parentIndex) {
        var parentGroup = $('.parent-repeater-group').eq(parentIndex);
        parentGroup.find('.children-wrapper .child-repeater-group').each(function (childIndex) {
            $(this).find('input, textarea').each(function () {
                var name = $(this).attr('name');
                if (name) {
                    name = name.replace(/page_custom_repeater\[parents\]\[\d+\]\[children\]\[\d+\]/, 'page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + ']');
                    $(this).attr('name', name);
                }
            });

            updateChildHeaderTitle($(this), parentIndex, childIndex);

            var postId = $('input#post_ID').val();
            var key = 'custom_repeater_child_' + postId + '_' + parentIndex + '_' + childIndex;
            var isOpen = $(this).find('.child-repeater-content').is(':visible');
            saveToggleState(key, isOpen);
        });

        refreshImagePreviews(parentGroup);
    }

    function saveToggleState(key, isOpen) {
        localStorage.setItem(key, isOpen ? '1' : '0');
    }

    function loadToggleState(key) {
        return localStorage.getItem(key) === '1';
    }

    function reinitTinyMCE(editorId) {
        if (typeof tinymce !== 'undefined') {
            if (tinymce.get(editorId)) {
                tinymce.get(editorId).remove();
            }
            tinymce.execCommand('mceAddEditor', false, editorId);
        }
    }

    function refreshImagePreviews(context) {
        context.find('.image-block').each(function () {
            var url = $(this).find('.image-url-field').val();
            var img = $(this).find('.image-preview-wrapper img');
            if (url && url.trim() !== '') {
                img.attr('src', url).show();
            } else {
                img.attr('src', '').hide();
            }
        });
    }

    function updateParentHeaderTitle($parentGroup, parentIndex) {
        var blockName = $parentGroup.find('input[name="page_custom_repeater[parents][' + parentIndex + '][block_name]"]').val();
        var title = blockName && blockName.trim() !== '' ? blockName.trim() : 'ブロック ' + (parentIndex + 1);
        $parentGroup.find('.parent-repeater-header').contents().first()[0].textContent = title;
    }

    function updateChildHeaderTitle($childGroup, parentIndex, childIndex) {
        var subtitle = $childGroup.find('input[name="page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + '][subtitle]"]').val();
        var title = subtitle && subtitle.trim() !== '' ? subtitle.trim() : '子ブロック ' + (childIndex + 1);
        $childGroup.find('.child-repeater-header').contents().first()[0].textContent = title;
    }

    // 初期ロード時 → 折りたたみ状態復元
    $('.parent-repeater-wrapper .parent-repeater-group').each(function (parentIndex) {
        var postId = $('input#post_ID').val();
        var key = 'custom_repeater_parent_' + postId + '_' + parentIndex;

        var content = $(this).find('.parent-repeater-content');
        if (loadToggleState(key)) {
            content.show();
        } else {
            content.hide();
        }

        $(this).find('.children-wrapper .child-repeater-group').each(function (childIndex) {
            var childKey = 'custom_repeater_child_' + postId + '_' + parentIndex + '_' + childIndex;
            var childContent = $(this).find('.child-repeater-content');
            if (loadToggleState(childKey)) {
                childContent.show();
            } else {
                childContent.hide();
            }

            updateChildHeaderTitle($(this), parentIndex, childIndex);
        });

        updateParentHeaderTitle($(this), parentIndex);
        refreshImagePreviews($(this));
    });

    // ブロック 折りたたみ
    $('.parent-repeater-wrapper').on('click', '.parent-repeater-header', function (e) {
        if (!$(e.target).hasClass('remove-parent-repeater')) {
            var parentIndex = $('.parent-repeater-group').index($(this).closest('.parent-repeater-group'));
            var postId = $('input#post_ID').val();
            var key = 'custom_repeater_parent_' + postId + '_' + parentIndex;

            var content = $(this).next('.parent-repeater-content');
            content.slideToggle(function () {
                saveToggleState(key, content.is(':visible'));
            });
        }
    });

    // ブロック 削除
    $('.parent-repeater-wrapper').on('click', '.remove-parent-repeater', function (e) {

        e.preventDefault();
        var group = $(this).closest('.parent-repeater-group');

        group.find('input, textarea, select').each(function () {
            $(this).removeAttr('name');
        });

        var parentIndex = $('.parent-repeater-group').index(group);
        var postId = $('input#post_ID').val();

        // 親のキー削除
        var parentKey = 'custom_repeater_parent_' + postId + '_' + parentIndex;
        localStorage.removeItem(parentKey);

        // 子のキー削除
        group.find('.children-wrapper .child-repeater-group').each(function (childIndex) {
            var childKey = 'custom_repeater_child_' + postId + '_' + parentIndex + '_' + childIndex;
            localStorage.removeItem(childKey);
        });

        group.remove();

        refreshParentIndexes();
    });

    // 子ブロック 折りたたみ
    $('.parent-repeater-wrapper').on('click', '.child-repeater-header', function (e) {
        if (!$(e.target).hasClass('remove-child-repeater')) {
            var parentIndex = $('.parent-repeater-group').index($(this).closest('.parent-repeater-group'));
            var childIndex = $(this).closest('.children-wrapper .child-repeater-group').index();
            var postId = $('input#post_ID').val();
            var key = 'custom_repeater_child_' + postId + '_' + parentIndex + '_' + childIndex;

            var content = $(this).next('.child-repeater-content');
            content.slideToggle(function () {
                saveToggleState(key, content.is(':visible'));
            });
        }
    });

    // 子ブロック 削除
    $('.parent-repeater-wrapper').on('click', '.remove-child-repeater', function (e) {
        e.preventDefault();
        var group = $(this).closest('.child-repeater-group');

        group.find('input, textarea, select').each(function () {
            $(this).removeAttr('name');
        });

        var parentIndex = $('.parent-repeater-group').index($(this).closest('.parent-repeater-group'));
        var childIndex = $(this).closest('.children-wrapper .child-repeater-group').index();
        var postId = $('input#post_ID').val();

        // 子のキー削除
        var childKey = 'custom_repeater_child_' + postId + '_' + parentIndex + '_' + childIndex;
        localStorage.removeItem(childKey);

        group.remove();

        var $childCountInput = $('input[name="page_custom_repeater[parents][' + parentIndex + '][child_count]"]');
        var currentChildCount = parseInt($childCountInput.val(), 10);
        if (currentChildCount > 0) {
            $childCountInput.val(currentChildCount - 1);
        }

        refreshChildIndexes(parentIndex);
    });

    // 画像選択
    $('.parent-repeater-wrapper').on('click', '.select-image-button', function (e) {
        e.preventDefault();
        var button = $(this);
        var imageBlock = button.closest('.image-block');
        var inputField = imageBlock.find('.image-url-field');
        var previewImg = imageBlock.find('.image-preview-wrapper img');

        var custom_uploader = wp.media({
            title: '画像を選択',
            button: {
                text: '画像を使用'
            },
            multiple: false
        }).on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            inputField.val(attachment.url);
            previewImg.attr('src', attachment.url).show();

            // ★ 親or子の該当 group のみ refresh
            refreshImagePreviews(button.closest('.parent-repeater-group, .child-repeater-group'));
        }).open();
    });

    // 画像クリア
    $('.parent-repeater-wrapper').on('click', '.remove-image-button', function (e) {
        e.preventDefault();
        var button = $(this);
        var imageBlock = button.closest('.image-block');
        var imageField = imageBlock.find('.image-url-field');
        var previewImg = imageBlock.find('.image-preview-wrapper img');

        imageField.val('');
        previewImg.attr('src', '').hide();

        // ★ 親or子の該当 group のみ refresh
        refreshImagePreviews(button.closest('.parent-repeater-group, .child-repeater-group'));
    });

    // 親セット複製ボタン
    $('.parent-repeater-wrapper').on('click', '.copy-parent-repeater', function (e) {
        e.preventDefault();

        const parentGroup = $(this).closest('.parent-repeater-group');

        // ラジオボタン name を一時的に変更して退避（複製元の保持対策）
        parentGroup.find('input[type="radio"]').each(function () {
            const name = $(this).attr('name');
            $(this).attr('data-original-name', name);
            $(this).removeAttr('name');
        });

        const clonedGroup = parentGroup.clone(true, true);

        // 複製元ラジオ name を復元
        parentGroup.find('input[type="radio"]').each(function () {
            const original = $(this).attr('data-original-name');
            if (original) {
                $(this).attr('name', original).removeAttr('data-original-name');
            }
        });

        // TinyMCEラッパー除去と textarea 復元
        clonedGroup.find('.wp-editor-wrap').each(function () {
            const textarea = $(this).find('textarea');
            const baseName = textarea.attr('name');
            const newId = baseName.replace(/\[|\]/g, '_').replace(/__+/g, '_').replace(/^_|_$/g, '');
            $(this).replaceWith(textarea);
            textarea.attr('id', newId);
        });

        clonedGroup.find('.mce-tinymce, .wp-editor-tools').remove();

        // 複製先を上に配置
        parentGroup.before(clonedGroup);

        // 全親閉じる
        $('.parent-repeater-group .parent-repeater-content').hide();

        // ✅ 複製先にラジオ checked 状態を引き継ぐ（name は clone に含まれている）
        parentGroup.find('input[type="radio"]').each(function () {
            if ($(this).is(':checked')) {
                const val = $(this).val();
                const suffix = $(this).attr('data-original-name')?.split(']').pop();
                clonedGroup.find('input[type="radio"][value="' + val + '"][name$="' + suffix + '"]').prop('checked', true);
            }
        });

        refreshParentIndexes();

        const newChildrenWrapper = clonedGroup.find('.children-wrapper')[0];
        new Sortable(newChildrenWrapper, {
            handle: '.child-repeater-header',
            animation: 150,
            onEnd: function () {
                const parentIndex = $('.parent-repeater-group').index($(newChildrenWrapper).closest('.parent-repeater-group'));
                refreshChildIndexes(parentIndex);
            }
        });

        refreshImagePreviews(clonedGroup);
        updateParentBlockBodyVisibility(clonedGroup);

        $('html, body, .edit-post-layout__content, .interface-interface-skeleton__content').animate({
            scrollTop: parentGroup.offset().top - 20
        }, 300);
    });

    // 子セット複製ボタン
    $('.parent-repeater-wrapper').on('click', '.copy-child-repeater', function (e) {
        e.preventDefault();

        const parentGroup = $(this).closest('.parent-repeater-group');
        const parentIndex = $('.parent-repeater-group').index(parentGroup);
        const childGroup = $(this).closest('.child-repeater-group');

        // ラジオ name を一時退避（複製元の保持対策）
        childGroup.find('input[type="radio"]').each(function () {
            const name = $(this).attr('name');
            $(this).attr('data-original-name', name);
            $(this).removeAttr('name');
        });

        const clonedChild = childGroup.clone();

        // 退避した name を復元
        childGroup.find('input[type="radio"]').each(function () {
            const original = $(this).attr('data-original-name');
            if (original) {
                $(this).attr('name', original).removeAttr('data-original-name');
            }
        });

        // TinyMCEエディタ除去
        clonedChild.find('textarea').each(function () {
            const editorId = $(this).attr('id');
            if (typeof tinymce !== 'undefined' && tinymce.get(editorId)) {
                tinymce.get(editorId).remove();
            }
        });

        clonedChild.find('.mce-tinymce, .wp-editor-tools').remove();

        // 複製を元の直前に挿入
        childGroup.before(clonedChild);

        refreshChildIndexes(parentIndex);

        const newChildGroup = childGroup.prev();
        const newChildIndex = parentGroup.find('.children-wrapper .child-repeater-group').index(newChildGroup);

        // ラジオの checked 状態を複製先に反映
        childGroup.find('input[type="radio"]').each(function () {
            if ($(this).is(':checked')) {
                const val = $(this).val();
                const suffix = $(this).attr('data-original-name')?.split(']').pop();
                newChildGroup.find('input[type="radio"][value="' + val + '"][name$="' + suffix + '"]').prop('checked', true);
            }
        });

        refreshImagePreviews(newChildGroup);

        const wasOpen = childGroup.find('.child-repeater-content').is(':visible');

        // 全て閉じる（希望動作）
        //newChildGroup.find('.child-repeater-content').hide();
        //clonedChild.find('.child-repeater-content').open();

        if (wasOpen) {
            // 複製元が開いていたら
            newChildGroup.find('.child-repeater-content').hide();
            childGroup.find('.child-repeater-content').open();
        } else {
            // 複製元が閉じていたら
            newChildGroup.find('.child-repeater-content').hide();
        }

        // 状態保存
        saveToggleState('custom_repeater_child_' + $('input#post_ID').val() + '_' + parentIndex + '_' + newChildIndex, false);

        // 複製元へスクロール
        $('html, body, .edit-post-layout__content, .interface-interface-skeleton__content').animate({
            scrollTop: childGroup.offset().top - 20
        }, 300);
    });

    // ブロック追加ボタン
    $('.add-parent-repeater').on('click', function (e) {
        e.preventDefault();

        var parentIndex = $('.parent-repeater-group').length;

        $.ajax({
            type: 'POST',
            url: customMetaRepeaterData.ajax_url,
            data: {
                action: 'get_parent_repeater_template',
                parentIndex: parentIndex,
                nonce: customMetaRepeaterData.nonce
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('.parent-repeater-wrapper').append(response.data.html);
                    refreshParentIndexes();

                    refreshImagePreviews($('.parent-repeater-wrapper'));

                    var newChildrenWrapper = $('.parent-repeater-wrapper .parent-repeater-group').last().find('.children-wrapper')[0];
                    new Sortable(newChildrenWrapper, {
                        handle: '.child-repeater-header',
                        animation: 150,
                        onEnd: function () {
                            var parentIndex = $('.parent-repeater-group').index($(newChildrenWrapper).closest('.parent-repeater-group'));
                            refreshChildIndexes(parentIndex);
                        }
                    });

                    // TinyMCE再初期化（親セット）
                    //var parentEditorId = 'page_custom_repeater_parents_' + parentIndex + '_content';
                    //reinitTinyMCE(parentEditorId);

                    // 親セット 自動展開＋スクロール
                    var newParentGroup = $('.parent-repeater-wrapper .parent-repeater-group').last();
                    refreshImagePreviews(newParentGroup);

                    newParentGroup.find('.parent-repeater-content').hide().slideDown('fast');
                    $('html, body').animate({
                        scrollTop: newParentGroup.offset().top - 100
                    }, 500);

                } else {
                    alert('エラー: ' + response.data);
                }
            },
            error: function (xhr, status, error) {
                alert('通信エラー: ' + error);
            }
        });
    });

    // 子ブロック追加ボタン
    $('.parent-repeater-wrapper').on('click', '.add-child-repeater', function (e) {
        e.preventDefault();

        var parentGroup = $(this).closest('.parent-repeater-group');
        var parentIndex = $('.parent-repeater-group').index(parentGroup);
        var childCountInput = parentGroup.find('input[name="page_custom_repeater[parents][' + parentIndex + '][child_count]"]');
        var currentChildCount = parseInt(childCountInput.val(), 10);
        var nextChildIndex = currentChildCount;

        $.ajax({
            type: 'POST',
            url: customMetaRepeaterData.ajax_url,
            data: {
                action: 'get_child_repeater_template',
                parentIndex: parentIndex,
                childIndex: nextChildIndex,
                nonce: customMetaRepeaterData.nonce
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    parentGroup.find('.children-wrapper').append(response.data.html);
                    childCountInput.val(currentChildCount + 1);
                    refreshChildIndexes(parentIndex);

                    // TinyMCE再初期化（子セット）
                    //var childEditorId = 'page_custom_repeater_parents_' + parentIndex + '_children_' + nextChildIndex + '_subcontent';
                    //reinitTinyMCE(childEditorId);

                    // ✅ ★★★ ここに↓追加すればOKです！★★★
                    var newChildGroup = parentGroup.find('.children-wrapper .child-repeater-group').last();
                    refreshImagePreviews(newChildGroup); // ← 追加

                } else {
                    alert('エラー: ' + response.data);
                }
            },
            error: function (xhr, status, error) {
                alert('通信エラー: ' + error);
            }
        });
    });

    // SortableJS ブロック
    new Sortable(document.querySelector('.parent-repeater-wrapper'), {
        handle: '.parent-repeater-header',
        animation: 150,
        onEnd: function () {
            refreshParentIndexes();
            updateParentToggleStates();
        }
    });

    // SortableJS 子ブロック
    document.querySelectorAll('.parent-repeater-wrapper .children-wrapper').forEach(function (el) {
        new Sortable(el, {
            handle: '.child-repeater-header',
            animation: 150,
            onEnd: function () {
                var parentIndex = $('.parent-repeater-group').index($(el).closest('.parent-repeater-group'));
                refreshChildIndexes(parentIndex);
                updateChildToggleStates(parentIndex);
            }
        });
    });

    function updateChildToggleStates(parentIndex) {
        $('.parent-repeater-group').eq(parentIndex).find('.children-wrapper .child-repeater-group').each(function (childIndex) {
            var postId = $('input#post_ID').val();
            var key = 'custom_repeater_child_' + postId + '_' + parentIndex + '_' + childIndex;
            var isOpen = $(this).find('.child-repeater-content').is(':visible');
            saveToggleState(key, isOpen);
        });
    }

    function updateParentToggleStates() {
        $('.parent-repeater-wrapper .parent-repeater-group').each(function (parentIndex) {
            var postId = $('input#post_ID').val();
            var key = 'custom_repeater_parent_' + postId + '_' + parentIndex;
            var isOpen = $(this).find('.parent-repeater-content').is(':visible');
            saveToggleState(key, isOpen);

            // 子も更新
            updateChildToggleStates(parentIndex);
        });
    }

    // 保存時：TinyMCE対応
    $('form#post').on('submit', function () {

        // TinyMCE 全保存
        if (typeof tinymce !== 'undefined') {
            tinymce.triggerSave();
        }

        // バリデーションチェック
        var isValid = true;
        var errorMessages = [];

        // 親セット
        $('.parent-repeater-wrapper .parent-repeater-group').each(function (parentIndex) {
            var blockName = $(this).find('input[name="page_custom_repeater[parents][' + parentIndex + '][block_name]"]').val();
            if (!blockName || blockName.trim() === '') {
                isValid = false;
                errorMessages.push('親セット ' + (parentIndex + 1) + ' の「ブロック名」は必須です。');
            }

            // 子セット
            $(this).find('.children-wrapper .child-repeater-group').each(function (childIndex) {
                var hasValue = false;

                var subtitle = $(this).find('input[name="page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + '][subtitle]"]').val();
                var subtitleSub = $(this).find('textarea[name="page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + '][subtitle_sub]"]').val();
                var subcontent = $(this).find('textarea[name="page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + '][subcontent]"]').val();
                var image = $(this).find('input[name="page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + '][image]"]').val();
                var buttonText = $(this).find('input[name="page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + '][button_text]"]').val();

                if ((subtitle && subtitle.trim() !== '') ||
                    (subtitleSub && subtitleSub.trim() !== '') ||
                    (subcontent && subcontent.trim() !== '') ||
                    (image && image.trim() !== '') ||
                    (buttonText && buttonText.trim() !== '')) {
                    hasValue = true;
                }

                // もし全項目空ならアラート対象
                if (!hasValue) {
                    isValid = false;
                    errorMessages.push('親セット ' + (parentIndex + 1) + ' - 子セット ' + (childIndex + 1) + ' はいずれかの項目を入力してください。');
                }
            });

        });

        // エラーがあればアラート
        if (!isValid) {
            alert(errorMessages.join('\n'));
            return false; // フォーム送信キャンセル
        }

    });

    // ★ TinyMCE 全保存 on previewクリック対応
    $('form#post').on('click', 'input#post-preview', function () {
        if (typeof tinymce !== 'undefined') {
            tinymce.triggerSave();
        }
    });

    // ★ コンテンツ種別 切り替え時に .parent-block-body を表示/非表示
    function updateParentBlockBodyVisibility(parentGroup) {
        var selectedValue = parentGroup.find('input[name^="page_custom_repeater"][name$="[content_type]"]:checked').val();
        var parentBlockBody = parentGroup.find('.parent-block-body');

        if (selectedValue === 'r_news' || selectedValue === 'r_common') {
            parentBlockBody.hide();
        } else {
            parentBlockBody.show();
        }
    }

    // ★ イベントリスナー
    $('.parent-repeater-wrapper').on('change', 'input[name^="page_custom_repeater"][name$="[content_type]"]', function () {
        var parentGroup = $(this).closest('.parent-repeater-group');
        updateParentBlockBodyVisibility(parentGroup);
    });

    // ★ 初期ロード時に全親ブロックで実行
    $('.parent-repeater-wrapper .parent-repeater-group').each(function () {
        updateParentBlockBodyVisibility($(this));
    });

    // ✅ Gutenberg公式対応 Preview 完全版 hook (修正版)
    if (typeof wp !== 'undefined' && wp.data && wp.data.subscribe) {
        let isPreviewing = false;
        let previewClicked = false; // ⭐️ フラグ追加

        // ⭐️ Previewボタン click時にフラグ立てる
        $(document).on('click', '.editor-post-preview, .editor-post-publish-panel__header-preview', function (e) {
            e.preventDefault(); // ⭐️ デフォルト遷移防止
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
            previewClicked = true; // ⭐️ フラグ ON

            // SortableJS disable（念のため）
            window.__previewSortables = [];
            $('.parent-repeater-wrapper').each(function () {
                var sortable = Sortable.get(this);
                if (sortable) {
                    sortable.option("disabled", true);
                    window.__previewSortables.push(sortable);
                }
            });
            $('.parent-repeater-wrapper .children-wrapper').each(function () {
                var sortable = Sortable.get(this);
                if (sortable) {
                    sortable.option("disabled", true);
                    window.__previewSortables.push(sortable);
                }
            });

            console.log('✅ Preview click → savePost(isPreview:true) 開始');

            // savePost 呼び出し
            wp.data.dispatch('core/editor').savePost({ isPreview: true });
        });

        wp.data.subscribe(() => {
            const isSaving = wp.data.select('core/editor').isSavingPost();
            const isAutosaving = wp.data.select('core/editor').isAutosavingPost();
            const isPreview = wp.data.select('core/editor').isPreviewingPost();

            if (previewClicked && isPreview && !isSaving && !isAutosaving && !isPreviewing) {
                isPreviewing = true;
                console.log('✅ Preview save complete → do redirect');

                // SortableJS 再有効化
                if (window.__previewSortables) {
                    window.__previewSortables.forEach(s => {
                        s.option("disabled", false);
                    });
                }

                // TinyMCE 全保存
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                }

                // previewページへリダイレクト
                const previewButton = document.querySelector('.editor-post-preview');
                if (previewButton && previewButton.href) {
                    window.location.href = previewButton.href;
                }
            }

            // Savingが終わったら isPreviewing / previewClicked をリセット
            if (!isSaving && !isAutosaving) {
                isPreviewing = false;
                previewClicked = false;
            }
        });
    }

});