// ==========================================================================

// Element Index Defaults Plugin for Craft CMS
// Author: Verbb - https://verbb.io/

// ==========================================================================

if (typeof Craft.ElementIndexDefaults === typeof undefined) {
    Craft.ElementIndexDefaults = {};
}

(function($) {

    $(document).on('click', '#sidebar .element-index-defaults a', function(e) {
        // e.preventDefault();

        $('#sidebar .element-index-defaults a').removeClass('sel');
        $(this).addClass('sel');

        $('.source-settings').addClass('hidden');
        $('.source-settings[data-element="' + $(this).attr('href').replace('#', '') + '"]').removeClass('hidden');
    });

    if (document.location.hash) {
        $('#sidebar .element-index-defaults a[href="' + document.location.hash + '"]').addClass('sel').trigger('click');
    } else {
        $('#sidebar .element-index-defaults a:first').addClass('sel').trigger('click');
    }

    // $('#sidebar .element-index-defaults a.sel').trigger('click');

    Craft.ElementIndexDefaults = Garnish.Base.extend({
        init: function(containerClass) {
            var $container = $(containerClass);
            var $sourceColumns = $container.find('.customize-sources-table-column');

            new Garnish.DragSort($sourceColumns, {
                handle: '.move',
                axis: 'y'
            });
        },
    });


})(jQuery);


