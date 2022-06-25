$('button[type="submit"]').on('click',function(e){
    e.preventDefault();
    var c = $("textarea.summernote").summernote('code');
    $('body').append('<div class="d-none" id="fix">'+c+'</div>');
    $('#fix').find('img').each(function(){
        if($(this).parent().get(0).tagName == 'LI'){
            var ul = $(this).closest('ul');
            ul.attr({
                'role':'list',
                'class':'articles-card-main-info__img-list',
                'style':'display:flex;flex-wrap:wrap;justify-content:space-around'
            })
            var li = ul.find('li');
            li.addClass('aos-init aos-animate')
            li.attr({
                'data-aos':'fade-up',
                'data-aos-anchor-placement':'top-bottom',
                'data-aos-duration':'1000',
                'style':'max-width:300px; padding:10px;margin:20px',
            },)
           li.children().each(function(){
               var tag = ($(this).get(0).tagName);
               if(tag!='IMG'){
                   $(this).remove();
               }else{
                   $(this).attr({
                       'loading':'lazy',
                       'decoding':'async',
                       'style':'',
                       'width':'200',
                       'height':'200'
                   })
               }
           })

        }
    })
    var fixedCode = $('#fix').html();
    $("textarea.summernote").summernote('code',fixedCode);
    $('form').unbind('submit').submit();
})
