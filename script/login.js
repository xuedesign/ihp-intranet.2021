$(".textinput input").change(function(){""!=$(this).val()?$(this).addClass("filled"):$(this).removeClass("filled")});

$(document).on("click",".pass-view",function(s){var i=$(this).children(".fa-eye-slash"),e=$(this).children(".fa-eye"),t=$(this).siblings(".pass");i.is(":visible")?(e.show(),i.hide(),t.attr("type","text")):(e.hide(),i.show(),t.attr("type","password"))});