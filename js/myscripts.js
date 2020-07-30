  function cs(){
  if ((document.getElementById("CarA").checked==false) && (document.getElementById("Other").checked==false) && (document.getElementById("Fire").checked==false) && (document.getElementById("FireS").checked==false))
alert("Please Choose The Injury Type")
else if(document.getElementById("sample4").value.length==0)
alert("Please Set The Number Of Injured Person");
else
showPosition();

}   
   function showPosition() {
	
	
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                document.getElementById("body").innerHTML = "<BR/><b>The Request Has Been Send . <br>Admin Will Reply To Your Request In 3 Minutes.<br>Please Stay calm. <br> " +positionInfo;
            });
        } else {
            alert("Something Went Wrong! Please Turn On The Loction!.");
        }
    }
	
  function agreed(){
  if (document.getElementById("snd").disabled==true)
  document.getElementById("snd").disabled=false;
  else
  document.getElementById("snd").disabled=true;
  }
  