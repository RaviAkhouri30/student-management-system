function ph_val() {
    var x = document.getElementById("mob").max;
    var z = document.getElementById("mob").min;
    
    var y = $("#mob").val();

     if (y < 7000000000) {
     	alert("Please enter your valid phone number");
     	document.getElementById("mob").value = "";
     } 
}