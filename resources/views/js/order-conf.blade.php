<script>
    $(document).ready(function (){
        $('input#orderFormTel').mask("8(999) 999-9999");
        $('input#orderFormName').on('input',function(){
            var value = $(this).val();
            var regEx = /^[а-яА-Я]+$/;
            var valid = regEx.test(value);
            if (!valid) {
                console.log(value)
                $(this).parent().removeClass('correct').addClass('error')

            }else{
                $(this).parent().removeClass('error').addClass('correct')
            }
        })
        $('input#orderFormMail').on('change',function(){
            var value = $(this).val();
            var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}.){1,125}[A-Z]{2,63}$/;
            var validEmail = regEx.test(value);
            if (!validEmail) {
                console.log(value)
                $(this).parent().removeClass('correct').addClass('error')
            }
            else{
            $(this).parent().removeClass('error').addClass('correct')
            }
        })

        var details = {};
        var name = {
            name:$('form#makeOrder input[name="product_name"]').val()
        }


        $('.order-form__select-dropdown-list li').on('click',function(){
            var select = $(this).data('select')
            var option = $(this).data('option')
            details[select]=option
            name[select]=option.charAt(0)
            $(document).find('select[name="'+select+'"] option[value="'+option+'"]').prop('selected',true)
        })
        $('#makeOrder').on('submit',function(){
            $(this).unbind('submit')
            $(this).submit()
        })
        $('#makeOrder input[type="radio"]').on('change',function(){
            var select = $(this).attr('name')
            var option = $(this).val()
            var str = $(this).data('name')
            details[select]=option
            name[select]=str

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
        $('form#makeOrder').on('click change',function(){
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
