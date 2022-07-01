// var appendBlock = '<div class="form-group d-flex flex-column pl-5 position-relative">\n' +
//     '            <label>\n' +
//     '                Заголовок изображения\n' +
//     '                <input type="text" class="form-control" name="titleImageSize[]">\n' +
//     '            </label>\n' +
//     '            <label>\n' +
//     '                Изображение\n' +
//     '                <input type="file" class="form-control" name="imageSize[]">\n' +
//     '            </label>\n' +
//     '            <a href="#" class="removeField" style="position: absolute; left: 0; top:50%"><i class="la la-close la-lg"></i></a>\n' +
//     '\n' +
//     '        </div>'
// $(document).ready(function() {
//     $('form').attr('enctype','multipart/form-data')
//     $('form').attr('id','uploadSize')
//     $('textarea#size').summernote()
//     $('a.add-size').on('click',function(e){
//         e.preventDefault()
//         $('div.inputs').append(appendBlock)
//     })
//     $('div.inputs').on('click','a.removeField',function(){
//         $(this).closest('.form-group').remove()
//     })
//
//     $('#uploadSize').on('submit',function(e){
//         e.stopPropagation()
//         e.preventDefault()
//         var data = new FormData(this);
//         $.ajaxSetup({
//             headers:
//                 { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
//         });
//         $.ajax({
//             url: '/storeSizeImages',
//             data: {
//                 data:data,
//                 currentId:$('input[name="id"]').val()
//             },
//             type: "post",
//             cache:false,
//             contentType: false,
//             processData: false,
//             // dataType:'html',
//             success: function (data) {
//                 console.log(data);
//                 // $("textarea#size").summernote('code',data)
//             },
//             error: function (data) {
//                 console.log(data+'2');
//             }
//         });
//         // $('form').unbind('submit').submit();
//     })
//
// })
$(document).ready(function(){
    $('textarea#size').summernote()
    $('#summernote').summernote({
        styleTags: [
            'li',
            { title: 'Blockquote', tag: 'blockquote', className: '', value: '' },
             'h4', 'img'
        ],
    });
    var appendBox = '<li>'+
        '<h4>Заголовок</h4>'+
        '<ul class="product-card__sizes-list">'+
        '<li>Место для изображения</li>'+
        '</ul>'+
        ' </li>';
    $('div[bp-field-name="size"]').append('<a href="#" class="add-size">Добавить запись к размерам</a>')

    $('body').on('click','a.add-size',function(e){
        console.log(1)
        e.preventDefault()
        // $('textarea#size').summernote('code','')
        $('textarea#size').summernote('pasteHTML',appendBox)
    })
})
