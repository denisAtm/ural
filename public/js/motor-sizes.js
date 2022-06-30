
$(document).ready(function() {
    $('textarea#size').summernote()
    $('button[type="submit"]').on('click',function(e){
        e.preventDefault()
        var c = $('textarea#size').summernote('code');
        // console.log(c);
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            beforeSend:function(){
              console.log(c)
            },
            url: '/storeSizeImages',
            data: {
                data:c,
                currentId:$('input[name="id"]').val()
            },
            type: "post",
            dataType:'html',
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data+'2');
            }
        });
        // $('form').unbind('submit').submit();
    })

    function uploadFile() {
        var data = new FormData();
        data.append("image", image);
        console.log('gsg')
        // $.ajax({
        //     beforeSend: function () {
        //         console.log('3123');
        //     },
        //     url: '/storeSizeImages',
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     data: data,
        //     type: "post",
        //     success: function (url,data) {
        //         var image = $('<img>').attr('src', 'http://' + url);
        //         $('#summernote').summernote("insertNode", image[0]);
        //         console.log(data);
        //     },
        //     error: function (data) {
        //         console.log(data);
        //     }
        // });
    }
})
