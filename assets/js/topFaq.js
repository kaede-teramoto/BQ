document.addEventListener('DOMContentLoaded', function () {
    const questions = document.querySelectorAll('.question.js-trigger');

    questions.forEach(question => {
        question.addEventListener('click', function () {
            const answer = this.nextElementSibling;

            // 回答が現在開いているかどうかを確認
            const isOpen = this.classList.contains('is-active');

            // is-activeクラスの切り替え
            this.classList.toggle('is-active');
            answer.classList.toggle('is-active');

            // 開閉時のアニメーション
            if (isOpen) {
                // 閉じる場合は高さを0に設定してアニメーション
                answer.style.maxHeight = '0';
            } else {
                // 開く場合は一時的に高さを自動（auto）に設定し、実際の高さを取得して設定
                answer.style.maxHeight = 'auto';
                const height = answer.scrollHeight + 'px';
                // 再度max-heightを設定してアニメーションを発動
                answer.style.maxHeight = height;
            }
        });
    });
});






