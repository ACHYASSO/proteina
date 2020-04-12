$(document).ready(function(){
    $('box-result a').click(function(){
        var countSpan = $('.download-count',this);
        countSpan.text( parseInt(countSpan.text())+1);
    });
});