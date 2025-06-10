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

            var blockName = $(this).find('input[name="page_custom_repeater[parents][' + parentIndex + '][block_name]"]').val();
            if (blockName && blockName.trim() !== '') {
                $(this).find('.parent-repeater-header').contents().first()[0].textContent = blockName.trim();
            } else {
                $(this).find('.parent-repeater-header').contents().first()[0].textContent = 'ブロック ' + (parentIndex + 1);
            }

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

            var subtitle = $(this).find('input[name="page_custom_repeater[parents][' + parentIndex + '][children][' + childIndex + '][subtitle]"]').val();
            if (subtitle && subtitle.trim() !== '') {
                $(this).find('.child-repeater-header').contents().first()[0].textContent = subtitle.trim();
            } else {
                $(this).find('.child-repeater-header').contents().first()[0].textContent = '子ブロック ' + (childIndex + 1);
            }

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
        if (!editorId) return;

        if (typeof tinymce !== 'undefined') {
            const existing = tinymce.get(editorId);
            if (existing) existing.remove();
        }

        if (typeof wp !== 'undefined' && wp.editor && wp.editor.initialize) {
            // Gutenberg (WP 5以降)
            wp.editor.initialize(editorId, {
                tinymce: {
                    toolbar1: 'bold italic underline | bullist | link unlink | removeformat',
                    menubar: false,
                    statusbar: false
                },
                quicktags: true,
                mediaButtons: false
            });
        } else if (typeof tinyMCEPreInit !== 'undefined' && tinyMCEPreInit.mceInit) {
            // Classic editor
            if (typeof tinymce !== 'undefined') {
                setTimeout(function () {
                    tinymce.init(Object.assign({}, tinyMCEPreInit.mceInit[editorId] || {}, {
                        selector: '#' + editorId,
                        menubar: false,
                        toolbar1: 'bold italic underline | bullist | link unlink | removeformat',
                        toolbar2: '',
                        statusbar: false
                    }));
                }, 100);
            }
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
        });

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


    // 親セッット複製ボタン
    $('.parent-repeater-wrapper').on('click', '.copy-parent-repeater', function (e) {
        e.preventDefault();

        var parentGroup = $(this).closest('.parent-repeater-group');
        var clonedGroup = parentGroup.clone();

        // clonedGroup.find('textarea').each(function () {
        //     var editorId = $(this).attr('id');
        //     if (typeof tinymce !== 'undefined' && tinymce.get(editorId)) {
        //         tinymce.get(editorId).remove();
        //     }
        // });

        clonedGroup.find('.wp-editor-wrap').each(function () {
            var textarea = $(this).find('textarea');
            var baseName = textarea.attr('name');
            var newId = baseName.replace(/\[|\]/g, '_').replace(/__+/g, '_').replace(/^_|_$/g, '');

            // .wp-editor-wrap ごと remove → textareaだけ残す
            $(this).replaceWith(textarea);

            // textareaに新しい id を付与
            textarea.attr('id', newId);
        });


        clonedGroup.find('.mce-tinymce, .wp-editor-tools').remove();

        $('.parent-repeater-wrapper').append(clonedGroup);

        refreshParentIndexes();

        var newParentIndex = $('.parent-repeater-group').length - 1;
        // var parentEditorId = 'page_custom_repeater_parents_' + newParentIndex + '_content';
        // reinitTinyMCE(parentEditorId);

        var newChildrenWrapper = $('.parent-repeater-wrapper .parent-repeater-group').last().find('.children-wrapper')[0];
        new Sortable(newChildrenWrapper, {
            handle: '.child-repeater-header',
            animation: 150,
            onEnd: function () {
                var parentIndex = $('.parent-repeater-group').index($(newChildrenWrapper).closest('.parent-repeater-group'));
                refreshChildIndexes(parentIndex);
            }
        });

        // スクロール移動
        $('html, body, .edit-post-layout__content, .interface-interface-skeleton__content').animate({
            scrollTop: $('.parent-repeater-group').last().offset().top - 20
        }, -100);
    });

    // 子セット複製ボタン
    $('.parent-repeater-wrapper').on('click', '.copy-child-repeater', function (e) {
        e.preventDefault();

        var parentGroup = $(this).closest('.parent-repeater-group');
        var parentIndex = $('.parent-repeater-group').index(parentGroup);

        var childGroup = $(this).closest('.child-repeater-group');
        var clonedChild = childGroup.clone();

        clonedChild.find('textarea').each(function () {
            var editorId = $(this).attr('id');
            if (typeof tinymce !== 'undefined' && tinymce.get(editorId)) {
                tinymce.get(editorId).remove();
            }
        });

        clonedChild.find('.mce-tinymce, .wp-editor-tools').remove();

        parentGroup.find('.children-wrapper').append(clonedChild);

        refreshChildIndexes(parentIndex);

        // クローン後の子セットを開いた状態にする
        var postId = $('input#post_ID').val();
        var newChildIndex = parentGroup.find('.children-wrapper .child-repeater-group').length - 1;
        var childKey = 'custom_repeater_child_' + postId + '_' + parentIndex + '_' + newChildIndex;
        var newChildGroup = parentGroup.find('.children-wrapper .child-repeater-group').last();
        newChildGroup.find('.child-repeater-content').show(); // 開く
        saveToggleState(childKey, true); // localStorageに保存

        // TinyMCE 再初期化
        // var childEditorId = 'page_custom_repeater_parents_' + parentIndex + '_children_' + newChildIndex + '_subcontent';
        // reinitTinyMCE(childEditorId);

        // スクロール移動
        $('html, body, .edit-post-layout__content, .interface-interface-skeleton__content').animate({
            scrollTop: newChildGroup.offset().top - 20
        }, -100);
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

});