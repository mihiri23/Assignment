$(document).ready(function (){
        $('form').submit(function (){
                var user_fname=$('#user_fname').val();
                var user_lname=$('#user_lname').val();
                var user_dob=$('#user_dob').val();
                var user_email=$('#user_email').val();
                var hid=$('#hid').val();
                var user_tel=$('#user_tel').val();
                var user_nic=$('#user_nic').val();
                var pro_id=$('#pro_id').val();
                var dis_id=$('#dis_id').val();
                var role_id=$('#role_id').val();
                var user_image=$("#user_image").val();
                
                var pattel=/^\+94[0-9]{9}$/;
                var pattel1=/^[0][0-9]{9}$/;
                var patnic=/^[0-9]{9}[vVxX]$/;
                var patnic1=/^[0-9]{12}$/;
                if(user_fname==""){
                    $('#uferror').text("Empty First Name");
                    $('#user_fname').focus();
                    return false;
                } 
                if(user_lname==""){
                    $('#ulerror').text("Empty Last Name");
                    $('#user_lname').focus();
                    return false;
                } 
                
                if(user_dob!=""){
                   var current=new Date();
                   var cyear=current.getFullYear();
                   var cmonth=current.getMonth();
                   var cdate=current.getDate();
                   
                   var dob=new Date(user_dob);
                   var year=dob.getFullYear();
                   var month=dob.getMonth();
                   var date=dob.getDate();
                   
                   var age=cyear-year;
                   var m=cmonth-month;
                   var d=cdate-date;
                   if(m<0 || (m==0 && d<0)){
                       age--;
                   }
                   var error=""; var status=0;
                   if(age<18){
                       error="Underage";
                       status=1;
                   }else if(age>60){
                       error="Overage";
                       status=1;
                   }else{
                       status=0;
                   }
                   
                   if(status==1){
                       $('#udoberror').text(error);
                        $('#user_dob').focus();
                        return false;
                   }
                    
                }
                
                if($('input[name=user_gender]:checked').length<=0){
                    $('#ugerror').text("Select a Gender");
                    $('#male').focus();
                    return false;
                    
                }
                
                if(user_email==""){
                    $('#ueerror').text("Empty Email Address");
                    $('#user_email').focus();
                    return false;
                } 
                
                if(hid==1){
                    $('#user_email').focus();
                    $('#user_email').select();
                    return false;
                    
                }
                
                if(user_tel!=""){
                if(!(user_tel.match(pattel)) && 
                        !(user_tel.match(pattel1))){
                    $('#uterror').text("Invalid Telephone No");
                    $('#user_tel').focus();
                    $('#user_tel').select();
                     return false;
                }
                }
                if(user_nic!=""){
                if(!(user_nic.match(patnic)) && 
                        !(user_nic.match(patnic1))){
                    $('#unerror').text("Invalid NIC");
                    $('#user_nic').focus();
                    $('#user_nic').select();
                     return false;
                }
                }
                
                if(user_dob!="" && user_nic!=""){
                    var len=user_nic.length;
                    if(len==10){
                        var snic=user_nic.substring(0,2);
                         var sdob = year.toString().substr(2, 2);
                        if(snic!=sdob){
                            $("#unerror").text("Please check DOB and NIC");
                            return false;
                        }
                    }
                    
                    if(len==12){
                        var snic=user_nic.substring(0,4);
                         var sdob = year;
                        if(snic!=sdob){
                            $("#unerror").text("Please check DOB and NIC");
                            return false;
                        }
                    }
                    
                }
                
                if(user_image!=""){
                    var arr=user_image.split(".");
                    var l=arr.length-1;
                    var ext=arr[l].toLowerCase();
                    var extarr=['jpg','jpeg','gif','png','tiff','svg'];
                    if($.inArray(ext,extarr)==-1){
                     $("#uierror").text("Invalid Image Format");  
                     return false;
                    }
                                       
                    
                }
                
                if(pro_id==""){
                    $('#uperror').text("Empty Province");
                    $('#pro_id').focus();
                    return false;
                } 
                if(dis_id==""){
                    $('#uderror').text("Empty District");
                    $('#dis_id').focus();
                    return false;
                }  
                if(role_id==""){
                    $('#urerror').text("Empty User Role");
                    $('#role_id').focus();
                    return false;
                }   
        }); 
        
        $('#user_fname').keypress(function (){
            $('#uferror').text("");
        });
        
        $('#user_lname').keypress(function (){
            $('#ulerror').text("");
        });
        
        $('#user_dob').keypress(function (){
            $('#uderror').text("");
        });
        $('#user_nic').keypress(function (){
            $('#unerror').text("");
        });
        
        $('input[name=user_gender]').click(function (){
            $('#ugerror').text("");
        });
        
        
       
     });
     
     function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_view')
            .attr('src', e.target.result)
            .height(70);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//To check email
function checkEmail(str) {
    $('#ueerror').text('');
    $('#ueerror').removeClass('error');
  var xhttp; 
  if (str == "") {
    document.getElementById("showEmail").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
     // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("showEmail").innerHTML = this.responseText;
    
    }
  };
  xhttp.open("GET", "../ajax/getEmail.php?q="+str, true);
  xhttp.send();
}

