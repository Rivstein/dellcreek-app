
(function(){
    let $carousel = $("#counties-carousel")
    let $items = $carousel.find('.carousel-item')
    let $prev = $('.prev-county')
    let $next = $('.next-county')

    // carousel options
    let options = {
        margin: 10,
        loop: false,
        responsive:{
            0:{ items:1 },
            767:{ items:5 }
        },
        stagePadding: 30
    }
    
    // init
    $(document).ready(function(){
        $carousel.owlCarousel(options)
    })

    // next btn
    $next.click(function(){
        $carousel.trigger('next.owl.carousel')
    })

    // prev btn
    $prev.click(function(){
        $carousel.trigger('prev.owl.carousel')
    })

    // show/hide nav btns
    $carousel.on('changed.owl.carousel', function (event) {
        /**
         * Prev btn
         * 
         * applies if current index is null or 0 (falsy value)
         */
        if (event.item.index == false){
            $prev.removeClass('group-hover:block block').addClass('hidden')
        }
        else{
            $prev.addClass('group-hover:block block').removeClass('hidden')
        }
        
        /**
         * Next btn
         * 
         * applies if (total items - current index) is less or equal the items displayed per page.
         * -> Desktop item per page = 5
         * -> Mobile item per page = 2
         */
        if ((event.item.count - event.item.index) <= event.page.size){
            $next.removeClass('group-hover:block block').addClass('hidden')
        }
        else{
            $next.addClass('group-hover:block block').removeClass('hidden')
        }
    })
})()
