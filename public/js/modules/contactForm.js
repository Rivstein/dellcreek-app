/**
 * Module : Contact Form
 */


(function(){
    let $requestBtn = $('.request-btn')
    let $requestForm = $('.request-form')

    $requestBtn.click(function(){
        $requestBtn.removeClass('border-t border-l border-r font-bold  border-b').addClass('border-b')
        $(this).removeClass('border-b').addClass('border-t border-l border-r font-bold ')
        let id = $(this).attr('data-id')
        $requestForm.hide()
        $('#'+id).show()
    })
})()