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
            const targetElement = document.querySelector(targetId);

            // ターゲット要素の存在を確認
            if (targetElement) {
                const targetOffsetTop = window.scrollY + targetElement.getBoundingClientRect().top - 150; // 余白150px追加
                window.scrollTo({
                    top: targetOffsetTop,
                    behavior: "smooth"
                });
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


// ハンバーガーメニューコンテンツ内の開閉式メニュー
document.querySelectorAll('.menu-item-has-children > a').forEach(function (anchor) {
    anchor.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();

        var subMenu = anchor.nextElementSibling;
        var parentMenuItem = anchor.parentElement;

        if (subMenu && subMenu.classList.contains('sub-menu')) {
            if (subMenu.classList.contains('--active')) {
                subMenu.classList.remove('--active');
                parentMenuItem.classList.remove('--active');
            } else {
                subMenu.classList.add('--active');
                parentMenuItem.classList.add('--active');
            }
        }
    });
});

// ハンバーガーメニュー
document.querySelectorAll('.js-hm-toggle').forEach(toggle => {
    toggle.addEventListener('click', function () {
        const nextElement = this.nextElementSibling;
        if (nextElement && nextElement.classList.contains('js-hm-target')) {
            if (getComputedStyle(nextElement).display === 'none') {
                // 表示する場合
                nextElement.style.display = 'block';
                requestAnimationFrame(() => {
                    nextElement.style.opacity = '1';
                    toggle.classList.add('--active');
                });
                nextElement.addEventListener('transitionend', function handleTransitionEnd() {
                    nextElement.classList.add('--active');
                    nextElement.removeEventListener('transitionend', handleTransitionEnd);
                });
            } else {
                // 非表示にする場合
                nextElement.style.opacity = '0';
                toggle.classList.remove('--active');
                nextElement.addEventListener('transitionend', function handleTransitionEnd() {
                    nextElement.style.display = 'none';
                    nextElement.classList.remove('--active');
                    nextElement.removeEventListener('transitionend', handleTransitionEnd);
                });
            }
        }
    });
});


document.querySelectorAll('.hm__nav__wrapper > .hm__nav__list > li:not(.menu-item-has-children) a, .sub-menu a, .nav__item a, .hm__btn a').forEach(link => {
    link.addEventListener('click', () => {
        // .js-hm-toggleから.--activeクラスを取り除く
        const toggle = document.querySelector('.js-hm-toggle');
        if (toggle) {
            toggle.classList.remove('--active');
        }

        // .js-hm-targetから.--activeクラスを取り除き、スタイルを設定
        const target = document.querySelector('.js-hm-target');
        if (target) {
            target.classList.remove('--active');
            target.style.display = 'none';
            target.style.opacity = '0';
        }
    });
});

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

    if (followbtns.length > 0) {
        window.addEventListener('scroll', function () {
            followbtns.forEach(function (btn) {
                if (window.scrollY > 100) {
                    // 100pxスクロールしたらクラスを追加
                    btn.classList.add('--active');
                } else {
                    // 100px未満の場合、クラスを削除
                    btn.classList.remove('--active');
                }
            });
        });
    }
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
            const megaMenu = item.querySelector('.megaMenu');

            if (megaMenu) {
                // マウスオーバーイベント
                item.addEventListener('mouseover', () => {
                    megaMenu.style.opacity = '1';
                    megaMenu.style.visibility = 'inherit';
                });

                // マウスアウトイベント
                item.addEventListener('mouseout', () => {
                    megaMenu.style.opacity = '0';
                    megaMenu.style.visibility = 'hidden';
                });
            }
        });
    }
});

// フォームのファイル選択の設定
// document.getElementById("formFileInput").addEventListener("change", function (event) {
//     const fileNameDisplay = document.getElementById("fileName");
//     const files = event.target.files;

//     if (files.length > 0) {
//         fileNameDisplay.textContent = files[0].name; // 選択されたファイル名を表示
//     } else {
//         fileNameDisplay.textContent = "選択されたファイル名がここに表示されます"; // 初期メッセージ
//     }
// });