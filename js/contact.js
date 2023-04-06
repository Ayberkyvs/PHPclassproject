$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Adını girmen gerekli!, hiç değilse salla.",
                    minlength: "Adınız en az 2 karakter olmalıdır"
                },
                subject: {
                    required: "Konuya ihtiyacımız var. Nasıl anlayacağız ?",
                    minlength: "Konu en az 4 karakter olmalıdır"
                },
                number: {
                    required: "Numaran olması lazım, lütfen numaranı gir.",
                    minlength: "Numaran en az 5 karakter olmalıdır"
                },
                email: {
                    required: "Mail yoksa mesaj da yok! >:("
                },
                message: {
                    required: "Evet, buraya bir şeyler yazmalısın ki gönderebilesin...",
                    minlength: "Bizi Bunun için mi uğraştırdın? Daha fazla yaz."
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"contact_process.php",
                    success: function() {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})