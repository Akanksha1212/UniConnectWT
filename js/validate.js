function validateForm() {
    var emailID= document.getElementById("email").value;
    var username= document.getElementById("name").value;
    var phone= document.getElementById("phone").value;

    var usernameRegex = "(^(([a-z_])+){5,}(([0-9])+)?$)|^[a-z_]{2}$|(^(([a-z_])+){1,}((([0-9])+){2,})$)";

    var phoneRegex= "";

    //var firstname= document.getElementById("fname").value;
    var atposition=emailID.indexOf("@");  
    var dotposition=emailID.lastIndexOf(".");  
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=emailID.length){  
        alert("Please enter a valid e-mail address.");  
  return false;  
  }
if(!username.match(usernameRegex)) {
    alert("Please Enter a valid Username. Username must be a combination of digits, small alphabets and '_'");
    return false;
}  

if(phone.length==10) {
    alert("Please Enter a valid Phone Number");
    return false;
}  
}

var check = function() {
  if (document.getElementById('pass').value ==
    document.getElementById('confirm_password').value && document.getElementById('pass').value!='' && document.getElementById('confirm_password').value!='') {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else if (document.getElementById('pass').value=='' && document.getElementById('confirm_password').value=='' ) {
    document.getElementById('message').innerHTML = '';
} 
else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
    return false;
  }
}
