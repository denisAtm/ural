var appendBlock = '<div class="form-group d-flex flex-column pl-5 position-relative">\n' +
    '            <label>\n' +
    '                Заголовок изображения\n' +
    '                <input type="text" class="form-control" name="titleImageSize[]">\n' +
    '            </label>\n' +
    '            <label>\n' +
    '                Изображение\n' +
    '                <input type="file" class="form-control" name="imageSize[]">\n' +
    '            </label>\n' +
    '            <a href="#" class="removeField" style="position: absolute; left: 0; top:50%"><i class="la la-close la-lg"></i></a>\n' +
    '\n' +
    '        </div>'

$('body').on('click','a.removeField',function(e){
    e.preventDefault()
    $(this).closest('.form-group').remove()
})
$('body').on('click','a.add-size',function(e){
    e.preventDefault()
    $('.inputs').append(appendBlock)
})
// $('button[type="submit"]').on('click',function(e){
//     e.preventDefault()
//     var str = []
//     var groups = $('.inputs .form-group');
//     for(var i = 0; i<=groups.length;i++){
//         console.log(groups['i'].val())
//         str[i] = {
//             'title':$('input[name="titleImageSize"]').get(i).val(),
//             'img':$('input[name="imageSize"]').get(i).val()
//         };
//     }
//     console.log(str)
//     // $('form').unbind('submit').submit();
// })
