function ispwd(evt){
    var charCode = evt.which;
    if (charCode == 8)
        return true;
    if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122))
        return true;
    if (charCode >= 48 && charCode <= 57) 
    	return true;
    if (charCode == 36 || charCode == 38 || charCode == 64 || charCode == 95 || charCode == 126)
    	return true;
    else
        return false;
}