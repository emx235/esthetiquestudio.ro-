$(document).ready(function(){


  $('#submit-form').click(function(){

    
    // Stop the browser from submitting the form.
      //event.preventDefault();

      var name=$('#name').val();
      var email=$('#email').val();
      var phone=$('#phone').val();
      var message=$('#message').val();
      var isValid=true;

      var intRegex_no= /[0-9 -()+]+$/; 
      var intRegex_email= /\S+@\S+\.\S+/; 

      $('.each_input').each(function(){
        if($(this).val()==''){
          isValid=false;
            $(this).css('background-color','rgba(255, 88, 43, 0.35)');
            // $('textarea').css('background-color','red');
         }else{
             $(this).css('background','');
         }   
      });
      if (!intRegex_email.test(email)){
        $('#email').css('background-color','rgba(255, 88, 43, 0.35)');
        isValid=false;
      }
      else{
        $('#email').css('background-color','#ffffff'); 
      } 
      if ((!intRegex_no.test(phone)) || phone.length<8 || phone.length>15){
        $('#phone').css('background-color','rgba(255, 88, 43, 0.35)');
        isValid=false;
      }
      else{
        $('#phone').css('background-color','#ffffff');
      } 




      if (isValid == false){
        event.preventDefault();
        return false;   
       };

      function preventDefault(e){
        if (!e) var e = window.event;
        e.cancelBubble = true;
        if (e.stopPropagation) e.stopPropagation();
       };

      $('.error-msg').css('display','none');

      
      //send information with ajax
      $.ajax({ 

           type: 'post',
           url: 'engine/engine.php', 
           data: {trigger:true,name:name,email:email,phone:phone,message:message},
           success: function(data){
              //alert(data);
              $('#contact-form').append('<p id="message-info" style="clear:both;text-align:center;color:#ed3237">Mesajul a fost trimis.</p>');
              $( '#contact-form' ).each(function(){
                  this.reset();
              });
              setTimeout(function(){
                $('#message-info').remove();
              }, 2000);
              
          }

     });     





      return false;

  })







})