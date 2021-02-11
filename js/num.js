function NumKey(evt){
	var charCode = evt.which;
	if (charCode == 8) 
		return true;

	if (charCode >=48 && charCode <= 57) 
		return true;

	else
        return false;
}