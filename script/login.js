$(".textinput input").change(function(){""!=$(this).val()?$(this).addClass("filled"):$(this).removeClass("filled")});

$('[data-action="see-password"]').on("click",function(){el="#"+$(this).attr("data-toggle"),"password"==$(el).attr("type")?($(this).find("i").addClass("glyphicon-eye-close"),$(el).attr("type","text")):($(this).find("i").removeClass("glyphicon-eye-close"),$(el).attr("type","password")),$(el).focus()});