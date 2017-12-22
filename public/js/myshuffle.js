var Shuffle = window.Shuffle;
var element = $('#my-shuffle-container');
var shuffle = new Shuffle(element, {
  itemSelector: '.book-item',
  filterMode: Shuffle.FilterMode.ALL
});
function removeItem(array, elements) {
    $.each(elements, function(index, element) {
        var index = array.indexOf(element);
        if (index > -1) {
            array.splice(index, 1);
        }
    });
    return array;
}
var filters = [];
$('.filter_want_to > button').click(function() {
    filter = $(this).data('filter');
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        index = filters.indexOf(filter);
        if (index > -1) {
            filters.splice(index, 1);
        }
    } else {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        filters = removeItem(filters, ['swap', 'sell']);
        filters.push(filter);
    }
    if (filters.length > 0) {
        shuffle.filter(filters);
    } else {
        shuffle.filter('all');
    }
})

$('.filter_status > button').click(function() {
    filter = $(this).data('filter');
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        index = filters.indexOf(filter);
        if (index > -1) {
            filters.splice(index, 1);
        }
    } else {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        filters = removeItem(filters, ['old', 'like_new', 'new']);
        filters.push(filter);
    }
    if (filters.length > 0) {
        shuffle.filter(filters);
    } else {
        shuffle.filter('all');
    }
})