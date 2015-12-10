/*-------------------------------------------------------*\
 Forms
 \*-------------------------------------------------------*/
;

// Home pages: 
//		placeholder - http://matoilic.github.io/jquery.placeholder/
//		maskedinput - http://digitalbush.com/projects/masked-input-plugin/
//		validate    - http://jqueryvalidation.org/

// Required plugins
require('../plugins/jquery.maskedinput.js');
require('../plugins/jquery.validate.min.js');
var isMobile = require('../plugins/isMobile.js');

// Initialization
$(document).ready(function() {

    /******************************************
     * Phone masks
     */    
    $.mask.definitions['~']="[+-]";
    $(".phone").mask("+7(999) 999-9999");
    if( isMobile.any || isMobile.tablet ) {
        
    }




    /******************************************
     * Main form validation
     */
    $("#jsForm_1").validate({
        rules:{
            Name:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Email:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Phone:{                
                required:true
            }
        },
        messages:{
            Name:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Email:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Phone:{
                number: "Пожалуйста введите правильный номер",
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:"Поле не должно содержать менее 11 символов"
            }
        }
    });
    $("#jsForm_2").validate({
        rules:{
            Name:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Email:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Phone:{
                number: true,
                required:true,
                minlength:11,
                maxlength:11
            }
        },
        messages:{
            Name:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Email:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Phone:{
                number: "Пожалуйста введите правильный номер",
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:"Поле не должно содержать менее 11 символов"
            }
        }
    });
    $("#jsForm_3").validate({
        rules:{
            Name:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Email:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Phone:{
                number: true,
                required:true,
                minlength:11,
                maxlength:11
            }
        },
        messages:{
            Name:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Email:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Phone:{
                number: "Пожалуйста введите правильный номер",
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:"Поле не должно содержать менее 11 символов"
            }
        }
    });

    $("#jsForm_modal").validate({
        rules:{
            Name:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Email:{
                required:true,
                minlength:2,
                maxlength:100
            },
            Phone:{
                number: true,
                required:true,
                minlength:11,
                maxlength:11
            }
        },
        messages:{
            Name:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Email:{
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:""
            },
            Phone:{
                number: "Пожалуйста введите правильный номер",
                required:"Поле обязательно для заполнения!",
                minlength:"Поле не должно содержать менее 2-х символов",
                maxlength:"Поле не должно содержать менее 11 символов"
            }
        }
    });
}); //forms