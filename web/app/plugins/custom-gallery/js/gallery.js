jQuery(function($){

    const input = $("#cgf-gallery-input");
    const wrapper = $("#cgf-gallery-wrapper");

    // Initialiser sortable avec les bonnes options
    wrapper.sortable({
        items: '.cgf-thumb',
        cursor: 'move',
        opacity: 0.7,
        placeholder: 'cgf-thumb-placeholder',
        update: function() {
            let ids = [];
            wrapper.find('.cgf-thumb').each(function(){
                ids.push($(this).data('id'));
            });
            input.val(ids.join(','));
        }
    });

    $('#cgf-add-images').on('click', function(e){
        e.preventDefault();

        let selectedIds = input.val() ? input.val().split(',').map(id => parseInt(id)) : [];

        let frame = wp.media({
            title: "Sélectionner des images",
            multiple: 'add',
            library: { type: 'image' },
            button: { text: "Ajouter" }
        });

        frame.on('open', function(){
            let selection = frame.state().get('selection');
            
            // Pré-sélectionner les images existantes
            selectedIds.forEach(function(id){
                let attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add(attachment);
            });
        });

        frame.on('select', function(){
            let attachments = frame.state().get('selection').toJSON();
            let ids = attachments.map(a => a.id);

            input.val(ids.join(','));

            // Mise à jour affichage admin
            wrapper.empty();
            attachments.forEach(function(a){
                wrapper.append(`
                    <div class="cgf-thumb" data-id="${a.id}">
                        <img src="${a.sizes.medium ? a.sizes.medium.url : a.url}">
                    </div>
                `);
            });
        });

        frame.open();
    });

});