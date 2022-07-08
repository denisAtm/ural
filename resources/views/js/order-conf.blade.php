<script>
    $(document).ready(function (){


        var details = {};
        var name = {
            name:$('form#makeOrder input[name="product_name"]').val()
        }


        $('.order-form__select-dropdown-list li').on('click',function(){
            var select = $(this).data('select')
            var option = $(this).data('option')
            details[select]=option
            name[select]=option
            $(document).find('select[name="'+select+'"] option[value="'+option+'"]').prop('selected',true)
        })
        $('#makeOrder').on('submit',function(){
            $(this).unbind('submit')
            $(this).submit()
        })
        $('#makeOrder input[type="radio"]').on('change',function(){
            var select = $(this).attr('name')
            var option = $(this).val()
            details[select]=option
            name[select]=option

        })
        $('button#nextStep').one('click',function(){
            console.log(details)
            $.each(details,function(key,value){
                $('ul#users-list').append('<li>'+
                    '<p>'+key+'</p>'+
                    '<span >'+value+'</span>'+
                    '</li>')
            })
        })
        $('form#makeOrder').on('change',function(){
            var newname = '';
            $.each(name,function(key,value){
                newname+=value+'-';
            })
            $('.users-conf-name').text(newname)
            $('#makeOrder input[name="product_name"]').val(newname)
        })

        $('input#accept').on('change',function(){
            console.log('тык')
            if($(this).is(':checked')){
                console.log(1)
                $('.order-form__step-page-1').find('input[type="radio"], select').prop('disabled',true)
                $('.order-form__step-page-1').find('.order-form-controls-group').hide()

            }else{
                $('.order-form__step-page-1').find('input[type="radio"], select').prop('disabled',false)
                $('.order-form__step-page-1').find('.order-form-controls-group').show()
            }
        })
        $(document).find('div.order-complete-modal button').on('click',function(){
            $(document).find('div.order-complete-modal').removeClass('active')
        })
        @if(Session::get('message'))
        console.log("{{Session::get('message')}}")
        $(document).find('div.order-complete-modal').addClass('active')
        @endif
    })



</script>
