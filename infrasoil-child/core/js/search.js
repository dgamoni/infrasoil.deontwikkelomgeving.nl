


 jQuery(document).ready(function($){



    // var items = $('.search-filter-results .grid-entry').not('.projectchild');
    // //console.log(items);
    // items.each(function(index, el) {
    //     $(this).addClass('element_'+index);
    // });

//collapse_up
//collapse_content
//collapse_close

    $(".collapse_content").addClass('myhide');
    $(".collapse_close").addClass('myhide');

    $( ".collapse_up" ).click(function() {
        console.log('collapse_up');
        $expand = $(this).parents('.container_wrap').next('.collapse_content');
        //console.log($expand);
        $(this).addClass('myhide')
        $expand.removeClass('myhide');
        $expand.find('.collapse_close').removeClass('myhide');
    });
    $( ".collapse_close" ).click(function() {
        console.log('collapse_close');
        $expand = $(this).parents('.collapse_content');
        $upbutton = $expand.prev('.container_wrap').find('.collapse_up');
        console.log($upbutton);
        $(this).addClass('myhide')
        $expand.addClass('myhide');
        $upbutton.removeClass('myhide');
    });


  //$.ajaxSetup({ cache: false });


});


// Avoid `console` errors in browsers that lack a console.
// (function() {
//     var method;
//     var noop = function () {};
//     var methods = [
//         'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
//         'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
//         'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
//         'timeStamp', 'trace', 'warn'
//     ];
//     var length = methods.length;
//     var console = (window.console = window.console || {});

//     while (length--) {
//         method = methods[length];

//         // Only stub undefined methods.
//         if (!console[method]) {
//             console[method] = noop;
//         }
//     }
// }());