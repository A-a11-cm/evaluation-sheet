
$(document).ready(function(){
    $('#btn-print-this').click(function(){
        $('#content1,.content2').printThis({
            importCSS:true,
            importStyle:true,
            loadCSS:"styling.css"
        });
        });
});
