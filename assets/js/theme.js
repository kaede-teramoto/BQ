'use strict';

const setVw = function () {
    const vw = document.documentElement.clientWidth / 100;
    document.documentElement.style.setProperty('--vw', `${vw}px`);
}
window.addEventListener('DOMContentLoaded', setVw);
window.addEventListener('resize', setVw);


// smooth scroll
window.addEventListener('DOMContentLoaded', () => {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    const anchorLinksArr = Array.prototype.slice.call(anchorLinks);

    anchorLinksArr.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const targetId = link.hash;

            // targetId が空でないことを確認
            if (targetId && targetId !== "#") {
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    const targetOffsetTop = window.scrollY + targetElement.getBoundingClientRect().top - 150; // 余白150px追加
                    window.scrollTo({
                        top: targetOffsetTop,
                        behavior: "smooth"
                    });
                }
            }
        });
    });
});


// trigger
document.querySelectorAll('.js-toggle').forEach(toggle => {
    toggle.addEventListener('click', function () {
        // toggleの次の兄弟要素がjs-targetかどうかをチェック
        const nextElement = this.nextElementSibling;
        if (nextElement && nextElement.classList.contains('js-target')) {
            this.classList.toggle('--active');
            nextElement.classList.toggle('--active');
        }
    });
});

// ハンバーガーメニュー：トグル処理
document.querySelectorAll('.js-hm-toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
        const target = toggle.nextElementSibling;
        if (!target?.classList.contains('js-hm-target')) return;

        toggle.classList.toggle('--active');
        target.classList.toggle('--active');
    });
});

// サブメニュー開閉：メニュー内に子メニューがある場合
document.querySelectorAll('.menu-item-has-children > a').forEach(anchor => {
    anchor.addEventListener('click', event => {
        event.preventDefault();
        event.stopPropagation();

        const subMenu = anchor.nextElementSibling;
        const parent = anchor.parentElement;

        if (subMenu?.classList.contains('sub-menu')) {
            subMenu.classList.toggle('--active');
            parent.classList.toggle('--active');
        }
    });
});

// アンカーリンククリック時：ハンバーガーメニューとサブメニューを閉じる + スクロール
document.querySelectorAll('.menu-item a').forEach(link => {
    link.addEventListener('click', event => {
        const href = link.getAttribute('href');
        if (!href) return;

        let url;
        try {
            url = new URL(href, window.location.origin);
        } catch {
            return;
        }

        const isSamePageAnchor =
            url.origin === window.location.origin &&
            url.pathname === window.location.pathname &&
            url.hash?.startsWith('#') &&
            url.hash.length > 1;

        if (isSamePageAnchor) {
            event.preventDefault();

            const targetId = url.hash.slice(1);
            const anchorEl = document.getElementById(targetId);
            if (anchorEl) {
                anchorEl.scrollIntoView({ behavior: 'smooth' });
            }

            document.querySelectorAll('.js-hm-toggle.--active, .js-hm-target.--active, .sub-menu.--active, .menu-item-has-children.--active')
                .forEach(el => el.classList.remove('--active'));
        }
    });
});



// // ハンバーガーメニューコンテンツ内の開閉式メニュー
// document.querySelectorAll('.menu-item-has-children > a').forEach(function (anchor) {
//     anchor.addEventListener('click', function (event) {
//         event.preventDefault();
//         event.stopPropagation();

//         var subMenu = anchor.nextElementSibling;
//         var parentMenuItem = anchor.parentElement;

//         if (subMenu && subMenu.classList.contains('sub-menu')) {
//             if (subMenu.classList.contains('--active')) {
//                 subMenu.classList.remove('--active');
//                 parentMenuItem.classList.remove('--active');
//             } else {
//                 subMenu.classList.add('--active');
//                 parentMenuItem.classList.add('--active');
//             }
//         }
//     });
// });

// document.querySelectorAll('.menu-item a').forEach(link => {
//     link.addEventListener('click', event => {
//         const href = link.getAttribute('href');
//         if (!href) return;

//         let url;
//         try {
//             url = new URL(href, window.location.origin);
//         } catch (e) {
//             return;
//         }

//         const isSamePageAnchor = (
//             url.origin === window.location.origin &&
//             url.pathname === window.location.pathname &&
//             url.hash.startsWith('#') &&
//             url.hash.length > 1
//         );

//         if (isSamePageAnchor) {
//             document.querySelectorAll('.js-hm-toggle.--active').forEach(el => el.classList.remove('--active'));
//             document.querySelectorAll('.js-hm-target.--active').forEach(el => el.classList.remove('--active'));
//             document.querySelectorAll('.sub-menu.--active').forEach(el => el.classList.remove('--active'));
//         }
//     });
// });


// document.querySelectorAll('.js-hm-toggle').forEach(toggle => {
//     toggle.addEventListener('click', function () {

//         const nextElement = this.nextElementSibling;

//         if (nextElement && nextElement.classList.contains('js-hm-target')) {
//             this.classList.toggle('--active');
//             nextElement.classList.toggle('--active');
//         }
//     });
// });

// marker
document.addEventListener("DOMContentLoaded", () => {
    const fadeInElements = document.querySelectorAll('.js-marker');

    const handleScroll = () => {
        const viewportHeight = window.innerHeight;

        fadeInElements.forEach(element => {
            const rect = element.getBoundingClientRect();
            if (rect.top <= viewportHeight / 1.5) {
                element.classList.add('is-active');
            }
        });
    };

    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll);
    window.addEventListener('load', handleScroll);

    // Initial check in case elements are already in position
    handleScroll();
});


window.onload = function () {
    // 全てのmenu__drop要素を取得
    const menuDrops = document.querySelectorAll('.menu__drop');

    // 各menu__drop要素にクリックイベントを設定
    menuDrops.forEach(function (menuDrop) {
        menuDrop.addEventListener('click', function () {
            // クリックされたmenu__drop要素の直下の.menuSub要素を取得
            const menuSub = this.querySelector('.menuSub');
            if (menuSub) {
                // スライドトグルの効果を再現するために、表示/非表示を切り替える
                if (menuSub.style.display === 'none' || menuSub.style.display === '') {
                    menuSub.style.display = 'block';
                    menuSub.style.maxHeight = menuSub.scrollHeight + 'px';
                    menuSub.style.transition = 'max-height 0.5s ease-in-out';
                } else {
                    menuSub.style.maxHeight = '0';
                    setTimeout(function () {
                        menuSub.style.display = 'none';
                    }, 500); // アニメーションの時間と一致させる
                }
            }
        });
    });
};

// タブ切替
document.addEventListener('DOMContentLoaded', () => {
    const panels = document.querySelectorAll('.tab__panel');
    const contents = document.querySelectorAll('.tab__content');

    panels.forEach((panel, index) => {
        panel.addEventListener('click', () => {
            // パネルの active クラスをリセット
            panels.forEach(p => p.classList.remove('is-active'));
            panel.classList.add('is-active');

            // コンテンツの active クラスをリセット
            contents.forEach(c => c.classList.remove('is-active'));
            contents[index].classList.add('is-active');
        });
    });
});



// header固定
// const headerFix = () => {
//     var header = document.getElementById('header');
//     if (window.scrollY >= 100) {
//         header.classList.add('is-hide');
//     } else {
//         header.classList.remove('is-hide');
//     }

//     if (window.scrollY >= 200) {
//         header.classList.add('is-fixed');
//     } else {
//         header.classList.remove('is-fixed');
//     }

// };
// window.addEventListener('scroll', headerFix);
// window.addEventListener('resize', headerFix);
// window.addEventListener('load', headerFix);

// gsap.to(".slideBg_blue", {
//     x: -1000, // 下に100px移動
//     duration: .5, // 2秒間アニメーション
//     ease: "back.out(5)", // イージングなし(等速)
//     stagger: .2, // 0.5秒遅れて順番に再生
//     scrollTrigger: {
//         trigger: ".slideBg_blue",
//         start: "top 80%",
//         end: "top 20%",
//         toggleActions: "play none none none",
//     }
// });

// fadeIn
const fadeIns = document.querySelectorAll('.js-fadeIn');
fadeIns.forEach(fadeIn => {
    gsap.from(fadeIn, {
        y: 20,
        opacity: 0,
        scrollTrigger: {
            trigger: fadeIn,
            start: "top 80%",
            end: "top 20%",
            toggleActions: "play none none none",
        }
    });
});

// rightIn
const rightIns = document.querySelectorAll('.js-rightIn');
rightIns.forEach(rightIn => {
    gsap.from(rightIn, {
        x: 20,
        opacity: 0,
        scrollTrigger: {
            trigger: rightIn,
            start: "top 80%",
            end: "top 20%",
            toggleActions: "play none none none",
        }
    });
});

// leftIn
const leftIns = document.querySelectorAll('.js-leftIn');
leftIns.forEach(leftIn => {
    gsap.from(leftIn, {
        x: -20,
        opacity: 0,
        scrollTrigger: {
            trigger: leftIn,
            start: "top 80%",
            end: "top 20%",
            toggleActions: "play none none none",
        }
    });
});

// bgColor
// const setBgColors = document.querySelectorAll('.js-bgColor');
// setBgColors.forEach(bgColor => {
//     gsap.set(bgColor, {
//         backgroundColor: 'transparent', // Fully transparent
//     });
// });


// bgColor
const bgColors = document.querySelectorAll('.js-bgColor');
bgColors.forEach(bgColor => {
    gsap.from(bgColor, {
        backgroundColor: 'rgba(0, 0, 0, 0)', // Fully transparent
        duration: 1,
        scrollTrigger: {
            //markers: true,
            trigger: bgColor,
            start: "top 80%",
            end: "top 0",
            toggleActions: "play none none none",
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const btnWrapper = document.querySelector('.sp__btn__wrapper');

    if (btnWrapper) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 100) {
                // 100pxスクロールしたらクラスを追加
                btnWrapper.classList.add('--active');
            } else {
                // 100px未満の場合、クラスを削除
                btnWrapper.classList.remove('--active');
            }
        });
    }
});


// スクロール時にクラスを追加する処理
document.addEventListener('DOMContentLoaded', function () {
    const followbtns = document.querySelectorAll('.follow_btn');
    let isClosedMap = new Map(); // 各ボタンの状態を管理

    function toggleActiveClass() {
        followbtns.forEach(function (btn) {
            if (!isClosedMap.get(btn)) { // そのボタンが閉じられていない場合のみ処理
                if (window.scrollY > 100) {
                    btn.classList.add('--active');
                } else {
                    btn.classList.remove('--active');
                }
            }
        });
    }

    if (followbtns.length > 0) {
        window.addEventListener('scroll', toggleActiveClass, { passive: true });
        window.addEventListener('touchmove', toggleActiveClass, { passive: true });
    }

    followbtns.forEach(function (btn) {
        const closeBtn = btn.querySelector('.follow_btn--close'); // 各 `follow_btn` 内の `follow_btn--close` を取得
        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                isClosedMap.set(btn, true); // そのボタンだけクローズ状態にする
                btn.classList.remove('--active');
            });
            closeBtn.addEventListener('touchend', function () {
                isClosedMap.set(btn, true);
                btn.classList.remove('--active');
            });
        }
    });
});


// 追従コンテンツ用
window.addEventListener('scroll', function () {
    const sections = document.querySelectorAll('.section__parts__content__wrapper .section__parts');
    const links = document.querySelectorAll('.section__parts__nav__wrapper ul li a');
    const offset = 200;  // This is the sticky top offset
    let foundCurrent = false;

    sections.forEach((section, index) => {
        const sectionTop = section.getBoundingClientRect().top;

        // 該当セクションが上部から200px以内に来たとき
        if (sectionTop <= offset && sectionTop + section.offsetHeight > offset) {
            links.forEach(link => link.classList.remove('current'));
            links[index].classList.add('current');
            foundCurrent = true;
        }
    });

    // どのセクションも条件を満たさない場合（上に戻った場合）
    if (!foundCurrent) {
        links.forEach(link => link.classList.remove('current'));
    }
});

// Mega Menu
document.addEventListener('DOMContentLoaded', () => {
    // .menu-item-has-childrenが存在するかを確認
    const menuItems = document.querySelectorAll('.menu-item-has-children');
    if (menuItems.length > 0) {

        menuItems.forEach(item => {
            const megaMenu = item.querySelector('.mega-menu');

            if (megaMenu) {
                // マウスオーバーイベント
                item.addEventListener('mouseover', () => {
                    megaMenu.style.opacity = '1';
                    megaMenu.style.visibility = 'inherit';
                    megaMenu.classList.add('--active');
                });

                // マウスアウトイベント
                item.addEventListener('mouseout', () => {
                    megaMenu.style.opacity = '0';
                    megaMenu.style.visibility = 'hidden';
                    megaMenu.classList.remove('--active');
                });
            }
        });
    }
});

//Plan03の設定
document.querySelectorAll('.plan_toggle').forEach(toggle => {
    toggle.addEventListener('click', function () {
        const section = toggle.closest('.section__parts__plan03');
        const text = section.querySelector('.section__parts__plan03__text');
        const openText = section.querySelector('.plan_toggle_open');
        const closeText = section.querySelector('.plan_toggle_close');

        // 現在の高さを取得
        const currentHeight = window.getComputedStyle(text).maxHeight;

        if (currentHeight === '0px' || currentHeight === 'none') {
            text.style.paddingTop = '30px'; // パディングを追加
            text.style.maxHeight = (text.scrollHeight + 30) + 'px'; // パディングの分も高さに加算
            openText.style.display = 'none';
            closeText.style.display = 'block';
        } else {
            text.style.paddingTop = '0'; // パディングを削除
            text.style.maxHeight = '0px';
            openText.style.display = 'block';
            closeText.style.display = 'none';

            // トランジションが完了するのを待ってからパディングを削除
            text.addEventListener('transitionend', function removePadding() {
                text.style.paddingTop = '0';
                // イベントリスナーを削除（一回きりの実行にする）
                text.removeEventListener('transitionend', removePadding);
            });
        }
    });
});

// Mega-menuのからリンクの非表示
// document.addEventListener("DOMContentLoaded", function () {
//     const links = document.querySelectorAll(".menu-link");

//     links.forEach((link) => {
//         const href = link.getAttribute("href");

//         if (!href || href === "#" || href.trim() === "") {
//             link.style.display = "none"; // または link.remove();
//         }
//     });
// });











