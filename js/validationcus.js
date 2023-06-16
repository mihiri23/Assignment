$(document).ready(function (){
        $('form').submit(function (){
                var cus_name=$('#cus_name').val();
                var cus_city=$('#cus_city').val();
                var cus_tel=$('#cus_tel').val();
                
                
                var pattel=/^\+94[0-9]{9}$/;
                var pattel1=/^[0][0-9]{9}$/;
                var patnic=/^[0-9]{9}[vVxX]$/;
                var patnic1=/^[0-9]{12}$/;
                if(cus_name==""){
                    $('#uferror').text("Empty Customer Name");
                    $('#cus_name').focus();
                    return false;
                } 
                if(cus_city==""){
                    $('#ulerror').text("Empty Customer City");
                    $('#cus_city').focus();
                    return false;
                } 
                if(cus_tel!=""){
                if(!(cus_tel.match(pattel)) && 
                        !(cus_tel.match(pattel1))){
                    $('#uterror').text("Invalid Telephone No");
                    $('#cus_tel').focus();
                    $('#cus_tel').select();
                     return false;
                }
                }
                
        }); 
        
        $('#cus_name').keypress(function (){
            $('#uferror').text("");
        });
        
        $('#cus_city').keypress(function (){
            $('#ulerror').text("");
        });
        
        
        
       
     });
     
    