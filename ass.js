jQuery(document).ready( function($){
function doValidate() {
    console.log('Validating...');
    try {
        pw = document.getElementById('userPassword').value;
        console.log("Validating pw="+pw);
        if (pw == null || pw == "") {
            alert("Both fields must be filled out");
            return false;
        }
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
});