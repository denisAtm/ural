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
            console.log(1)
            console.log($(this).attr('name'),$(this).val())
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
    })

    @if(Session::get('message'))
    alert('{{Session::get('message')}}')
    @endif

</script>
