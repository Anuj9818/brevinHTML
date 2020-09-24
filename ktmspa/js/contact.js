$(document).ready(function () {
    $('#send_message').click(function (e) {

        //stop the form from being submitted
        e.preventDefault();

        /* declare the variables, var error is the variable that we use on the end
         to determine if there was an error or not */
        var error = false;
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var subject = $('#subject').val();
        var howhear = $('#howhear').val()
        var message = $('#message').val();

        /* in the next section we do the checking by using VARIABLE.length
         where VARIABLE is the variable we are checking (like name, email),
         length is a javascript function to get the number of characters.
         And as you can see if the num of characters is 0 we set the error
         variable to true and show the name_error div with the fadeIn effect. 
         if it's not 0 then we fadeOut the div( that's if the div is shown and
         the error is fixed it fadesOut. 
         
         The only difference from these checks is the email checking, we have
         email.indexOf('@') which checks if there is @ in the email input field.
         This javascript function will return -1 if no occurence have been found.*/
        if (name.length == 0) {
            var error = true;
            $('#name_error').fadeIn(500);
        } else {
            $('#name_error').fadeOut(500);
        }
        if (email.length == 0 || email.indexOf('@') == '-1') {
            var error = true;
            $('#email_error').fadeIn(500);
        } else {
            $('#email_error').fadeOut(500);
        }
        if (phone.length == 0) {
            var error = true;
            $('#phone_error').fadeIn(500);
        } else {
            $('#phone_error').fadeOut(500);
        }
        if (subject.length == 0) {
            var error = true;
            $('#subject_error').fadeIn(500);
        } else {
            $('#subject_error').fadeOut(500);
        }
        if (howhear.length == 0) {
            var error = true;
            $('#howerror_error2').fadeIn(500);
        } else {
            $('#howhear_error2').fadeOut(500);
        }
        if (message.length == 0) {
            var error = true;
            $('#message_error2').fadeIn(500);
        } else {
            $('#message_error2').fadeOut(500);
        }

        //now when the validation is done we check if the error variable is false (no errors)
        if (error == false) {
            //disable the submit button to avoid spamming
            //and change the button text to Sending...
            $('#send_message').attr({'disabled': 'true', 'value': 'Sending...'});

            /* using the jquery's post(ajax) function and a lifesaver
             function serialize() which gets all the data from the form
             we submit it to send_email.php */
            $.post("send_email.php", $("#contact_form").serialize(), function (result) {
                //and after the ajax request ends we check the text returned
                if (result == 'sent') {
                    //if the mail is sent remove the submit paragraph
                    $('#cf_submit_p').remove();
                    //and show the mail success div with fadeIn
                    $('#mail_success').fadeIn(500);
                } else {
                    //show the mail failed div
                    $('#mail_fail').fadeIn(500);
                    //reenable the submit button by removing attribute disabled and change the text back to Send The Message
                    $('#send_message').removeAttr('disabled').attr('value', 'Send The Message');
                }
            });
        }
    });
});

$(document).ready(function () {
    $('#send_message2').click(function (e) {

        //stop the form from being submitted
        e.preventDefault();

        /* declare the variables, var error is the variable that we use on the end
         to determine if there was an error or not */
        var error2 = false;
        var name2 = $('#name2').val();
        var email2 = $('#email2').val();
        var phone2 = $('#phone2').val();
        var subject2 = $('#subject2').val();
        var howhear2 = $('#howhear2').val();
        var message2 = $('#message2').val();

        /* in the next section we do the checking by using VARIABLE.length
         where VARIABLE is the variable we are checking (like name, email),
         length is a javascript function to get the number of characters.
         And as you can see if the num of characters is 0 we set the error
         variable to true and show the name_error div with the fadeIn effect. 
         if it's not 0 then we fadeOut the div( that's if the div is shown and
         the error is fixed it fadesOut. 
         
         The only difference from these checks is the email checking, we have
         email.indexOf('@') which checks if there is @ in the email input field.
         This javascript function will return -1 if no occurence have been found.*/
        if (name2.length == 0) {
            var error2 = true;
            $('#name_error2').fadeIn(500);
        } else {
            $('#name_error2').fadeOut(500);
        }
        if (email2.length == 0 || email2.indexOf('@') == '-1') {
            var error2 = true;
            $('#email_error2').fadeIn(500);
        } else {
            $('#email_error2').fadeOut(500);
        }
         if (phone2.length == 0) {
            var error = true;
            $('#phone_error2').fadeIn(500);
        } else {
            $('#phone_error2').fadeOut(500);
        }
        if (subject2.length == 0) {
            var error2 = true;
            $('#subject_error2').fadeIn(500);
        } else {
            $('#subject_error2').fadeOut(500);
        }
         
        if (message2.length == 0) {
            var error2 = true;
            $('#message_error2').fadeIn(500);
        } else {
            $('#message_error2').fadeOut(500);
        }

        //now when the validation is done we check if the error variable is false (no errors)
        if (error2 == false) {
            //disable the submit button to avoid spamming
            //and change the button text to Sending...
            $('#send_message2').attr({'disabled': 'true', 'value': 'Sending...'});

            /* using the jquery's post(ajax) function and a lifesaver
             function serialize() which gets all the data from the form
             we submit it to send_email.php */
            $.post("send_email2.php", $("#contact_form2").serialize(), function (result) {
                //and after the ajax request ends we check the text returned
                if (result == 'sent2') {
                    //if the mail is sent remove the submit paragraph
                    $('#cf_submit_p2').remove();
                    //and show the mail success div with fadeIn
                    $('#mail_success2').fadeIn(500);
                } else {
                    //show the mail failed div
                    $('#mail_fail2').fadeIn(500);
                    //reenable the submit button by removing attribute disabled and change the text back to Send The Message
                    $('#send_message2').removeAttr('disabled').attr('value', 'Send The Message');
                }
            });
        }
    });
});
