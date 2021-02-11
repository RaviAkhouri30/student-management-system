$(document).ready(function() 
            {
                $("#uname").hide();
                $("#uphone").hide();
                $("#uemail").hide();
                $("#invalid_email").hide();
                $("#upass").hide();
                $("#in-ucpass").hide();
                $("#ucpass").hide();
                $("#ugender").hide();

                $("#name").blur(function()
                {
                    var name = $('#user_id').val(); //val fetches value form the text box into variable name.
                    if(name== '')
                    {
                        $('#uname').show();
                    }else
                    {
                        $('#uname').hide();
                    }
                });
                
                $("#phone").blur(function()
                {
                    var name = $('#phone').val();
                    if(name== '')
                    {
                        $('#uphone').show();
                    }else{
                        $('#uphone').hide();
                    }
                });
                $("#email").blur(function()
                {
                    var email = $('#email').val();
                    if(email== '')
                    {
                        $('#uemail').show();
                        $('#invalid_email').hide();
                        return false;
                    }
                    if(IsEmail(email)==false)
                    {                 
                        $('#invalid_email').show();
                        $('#uemail').hide();
                        return false;
                    }
                    if(IsEmail(email)==true)
                    {
                        $('#invalid_email').hide();
                        $('#uemail').hide();
                    }
                });
                $("#pass").blur(function()
                {
                    var name = $('#pass').val();
                    if(name== '')
                    {
                        $('#upass').show();
                    }else{
                        $('#upass').hide();
                    }
                });
                $("#cpass").blur(function()
                {
                    var cpss= $('#cpass').val();
                    var pss= $('#pass').val();
                    if(cpss=='')
                    {
                        $('#ucpass').show();
                        $('#in-ucpass').hide();
                        return false;
                    }
                    if(pss==cpss)
                    {
                        $('#ucpass').hide();
                        $('#in-ucpass').hide();
                        return true;
                    }
                    else
                    {
                        $('#in-ucpass').show();
                        $('#ucpass').hide();
                        return false;
                    }
                    
                });
                
            
            });
            function IsEmail(email) 
            {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) 
                {
                   return false;
                }
                else
                {
                   return true;
                }
            }
            

