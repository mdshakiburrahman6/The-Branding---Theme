jQuery(function ($) {

    let frame;

    $('#add-branding-gallery').on('click', function (e) {
        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'Select Gallery Images',
            button: { text: 'Use Images' },
            multiple: true
        });

        frame.on('select', function () {

            let ids = [];
            let list = $('#branding-gallery-list');
            list.empty();

            frame.state().get('selection').each(function (attachment) {
                attachment = attachment.toJSON();
                ids.push(attachment.id);

                list.append(`
                    <li class="gallery-item" data-id="${attachment.id}">
                        <img src="${attachment.sizes.thumbnail.url}">
                        <span class="remove-image">×</span>
                    </li>
                `);
            });

            $('#branding_gallery_input').val(ids.join(','));
        });

        frame.open();
    });

    // Remove image
    $(document).on('click', '.remove-image', function () {
        $(this).parent().remove();
        updateGalleryInput();
    });

    // Reorder images
    $('#branding-gallery-list').sortable({
        update: updateGalleryInput
    });

    function updateGalleryInput() {
        let ids = [];
        $('#branding-gallery-list li').each(function () {
            ids.push($(this).data('id'));
        });
        $('#branding_gallery_input').val(ids.join(','));
    }

});
