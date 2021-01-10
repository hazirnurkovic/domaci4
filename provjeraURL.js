$(document).ready(function() {
   $("#greska").hide();
   if(location.href.indexOf("msg=error") > -1)
{
    $("#greska").show();
    $("#greska").html("Pogresni podaci. Unesi validne podakte");
}


}); 

