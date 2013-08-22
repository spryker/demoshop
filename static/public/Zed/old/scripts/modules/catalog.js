

//used from image iframe to reload the top left image
function replaceUpdatedProductImage(imagesrc)
{
    var image = $('#catalogProductImage_TopLeft');
    if(image) {
        image.attr('src',imagesrc);
    }
}



$(document).ready(function() {

    /* Highlight tabs containing errors */
    $('.tabContent').find('.errors').each(function(index, item) {
        var tabNumber = $(item).parents('.tabContent').attr('class').match(/tab-(.*)/)[1].replace(/\s+$/,"");
        $('ul.tabs').find('li[data-tab=" '+tabNumber+'"]').addClass('catalog-error-tab');
    });

});

