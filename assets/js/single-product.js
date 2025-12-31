document.addEventListener('DOMContentLoaded', function () {

    const mainImg = document.getElementById('tbMainImage');
    const thumbs  = document.querySelectorAll('.tb-thumb');

    if (!mainImg || !thumbs.length) return;

    thumbs.forEach(function (thumb) {
        thumb.addEventListener('click', function () {

            const newSrc = this.dataset.full;

            // 🔥 IMPORTANT: remove srcset & sizes
            mainImg.src = newSrc;
            mainImg.removeAttribute('srcset');
            mainImg.removeAttribute('sizes');

            // Active border
            thumbs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

        });
    });

});
