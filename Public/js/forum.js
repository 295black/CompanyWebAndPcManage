/**
 * 显示选择城市
 */
function showCity(){
    var type = $("#type-input").val();
    if(type != 1){
        $(".submit-city").hide();
    }
}

$(document).ready(function(){
    showCity();
})
