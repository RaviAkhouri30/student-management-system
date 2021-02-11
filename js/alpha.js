function isAlphaKey(evt){
    var charCode = evt.which;
    if (charCode == 8)
        return true;

    if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122))
        return true;
    else
        return false;
}