$('button[type="submit"]').on('click',function(e){
    e.preventDefault()
    var c = $('textarea#size').summernote('code');
    console.log(c);
    // $('form').unbind('submit').submit();
})
