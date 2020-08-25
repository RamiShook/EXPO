
<?php


include('../../info.php');
include('../../config.php');
if (isset($_GET['logout'])){
  session_destroy();
  Echo "Logged Out , Please Login Again To Get All The Site Feature's.";
  header("Refresh: 3; url= ../../ajx.html");

}
?>
<!DOCTYPE html>
<!--
    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>
    <head>
	

        <!--
        Customize this policy to fit your own app's needs. For more guidance, see:
            https://github.com/apache/cordova-plugin-whitelist/blob/master/README.md#content-security-policy
        Some notes:
            * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
            * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
            * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
                * Enable inline JS: add 'unsafe-inline' to default-src
        -->
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
        <link rel="stylesheet" type="text/css" href="../../css/index.css">
		<link rel="stylesheet" href="../../css/material.min.css">
				<link rel="stylesheet" href="../../css/mysheet.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/bootstrap.css">
<script type="text/javascript" src="../../assets/jquery.js"></script>
<script type="text/javascript" src="../../assets/bootstrap.js"></script>
<script type="text/javascript" src="../../assets/bootbox.min.js"></script>
<script type="text/javascript" src="../../assets/sorttable.js"></script> 
<script src="../../js/material.min.js"></script>
<script src="../../js/myscripts.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </script>
    </head>
    
  <body id="body">
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Data Entry.</span>
         
      </header>
      <div class="mdl-layout__drawer">
      <span class="mdl-layout-title"><div id="meee"> <a href='../index.php'> EXPO</a></div></span>
        <nav class="mdl-navigation">
        <?php 
         if(isset($_SESSION['type'])&& ($_SESSION['type']=="Fulfillment") ){
            include('FulfOptions.php');
        
          }else{
echo"You Need To Login First!";
         }
          ?>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
<div id="container" align="center" >
<br>
<br>
Insert New Product:
<br>
<br>
<lable for="Pcode">Product Code:</label>
<input type="text" placeholder="EX:C200" id="Pcode" > </input>
<br>
<br>
<lable for="Pname">Product Name:</label>
<input type="text" placeholder="EX:Shoe.." id="Pname" > </input>
<br>
<br>
<lable for="Pcolor">Select Color:</label>
                <select class="custom-select d-block w-100" id="Pcolor" required onblur="GenerateCode()">
                  <option value="" disabled="true" selected=true>Choose...</option>
                  <option value="Black">Black</option>
                  <option value="White">White</option>
                  <option value="Red">Red</option>
                </select>
<br>
<div id="ToPcode"> </div>
<br>

<input type="radio" id="All" name="sz" checked value="All"> </input> <label for="All">All Sizes</lable>
&nbsp &nbsp 
<input type="radio" id="Custom" name="sz" Value="Custom"> </input> <label for="Custom">Custom Sizes</lable>
&nbsp
&nbsp
<input type="radio" id="Real" name="sz" Value="Real"> </input> <label for="Real">Real Size</lable>

&nbsp
<div id="Sizes">
<input type="checkbox" id="Size35"  value="35" name="Size" checked disabled></input>
<label for="Size35"> 35</label>&nbsp &nbsp 
<input type="checkbox" id="Size36"  value="36" name="Size" checked disabled></input>
<label for="Size36"> 36</label>&nbsp &nbsp 
<input type="checkbox" id="Size37"  value="37" name="Size" checked disabled>
<label for="Size37"> 37</label>&nbsp &nbsp  
<input type="checkbox" id="Size38"  value="38" name="Size" checked disabled>
<label for="Size38"> 38</label>&nbsp &nbsp 
<input type="checkbox" id="Size39"  value="39" name="Size" checked  disabled>
<label for="Size39"> 39</label>&nbsp &nbsp 
<input type="checkbox" id="Size40"  value="40" name="Size" checked disabled>
<label for="Size40"> 40</label>&nbsp &nbsp 
<input type="checkbox" id="Size41"  value="41" name="Size" checked disabled>
<label for="Size41"> 41</label>&nbsp &nbsp 
<input type="checkbox" id="Size42"  value="42" name="Size" checked disabled>
<label for="Size42"> 42</label>&nbsp &nbsp 
</div>





<div id="RealSizes" hidden="true" class="mdl-cell mdl-cell--4-col" style="text-align: center; vertical-align: middle;">
Fill The Table Gradually!.
<table class="table table-bordered table-striped" align="center">
<th align="center" style="text-align: center; vertical-align: middle;">Real Size</th>
<th align="center" style="text-align: center; vertical-align: middle;">Generated Code</th>

<tr> <td > <input type="text"  id="firstRow" Value="0.0" onblur="GenerateForCustom(this.id)"></input> </td> 
     <td> <input type="text" disabled="true" id="firstRowC"></input></td> </tr>


<tr> <td > <input type="text"  id="secondRow" Value="" onblur="GenerateForCustom(this.id)"></input> </td>
     <td> <input type="text" disabled="true" id="secondRowC"></input></td>  </tr>


<tr> <td > <input type="text"  id="thirdRow" Value="" onblur="GenerateForCustom(this.id)"></input> </td>
     <td> <input type="text" disabled="true" id="thirdRowC"></input></td> </tr>

<tr> <td > <input type="text"  id="fourthRow" Value="" onblur="GenerateForCustom(this.id)"></input> </td> 
     <td> <input type="text" disabled="true" id="fourthRowC"></input></td> </tr>

<tr> <td > <input type="text"  id="fifthRow" Value="" onblur="GenerateForCustom(this.id)"></input> </td> 
     <td> <input type="text" disabled="true" id="fifthRowC"></input></td> </tr>


</table>

</div>
<br>
<br>
<lable for="Qty">Quantity:</label>
<input type="number" placeholder="EX:20" id="Qty" > </input>
<br>
<br>
<lable for="Note">Note: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
<input type="text" placeholder="Any Note..." id="Note" > </input>
<br>
<BR>
<lable for="Price">Price: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>

<input type="text" placeholder="EX:20000" id="Price" > </input>

<form action="Photo.php" id="ph" name="ph" method="post" enctype="multipart/form-data">
<fieldset>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<input type="file" value="Choose Picture" name="fileToUpload"> </input>
<!-- <input type="submit"></input> -->
</fieldset>
</form>
<BR> <BR>
<input type="button" id="sbmt" onclick="sbmt()"value="Add Product/s"> </input>

<hr>
Added Products:
<hr>
<table id="Pds" class="table table-bordered table-striped">
<th>Code</th>
<th>Name</th>
<th>Size</th>
<th>Quantity</th>
<th>Price</th>
<th>Note</th>
<th>Real Size</th>


</table>
</div>

		
		
      </main>
    </div>
  
       
    </body>
    
<script language="javascript">
    var Gcode;

function sbmt(){
    Pname=document.getElementById("Pname").value
        Qty=document.getElementById("Qty").value
        Clr = document.getElementById("Pcolor").value
        Not=document.getElementById("Note").value
        Prc=document.getElementById("Price").value

        if(Pname.value==""||Qty.value==""||Clr==""){
            alert("Some Field Is Null! \nPlease Check Again..")
            return;
        }
        var xmlhttp;
if(window.XMLHttpRequest)
xmlhttp = new XMLHttpRequest();
    if (document.getElementById("All").checked==true){
       
       
        for( i=35; i<43; i++ ){
            ShowEntered(Gcode,Pname,i,Qty,Prc,Not,0)
            
xmlhttp.onreadystatechange = function(){
if (xmlhttp.readyState ==4 & xmlhttp.status ==200)
    //krmel a3melo redirect eza ken l username wl password mazbutin
        if (xmlhttp.responseText.length==3){
            console.log("Added")

        }
        else {
            console.log(xmlhttp.responseText.length)
            console.log("SomeThing Happened!")
            
        }
}
xmlhttp.open("GET","./insData.php?pcode="+Gcode+i+"&pname="+Pname+"&psize="+i+"&pquantity="+Qty+"&pprice="+Prc+"&pnote="+Not+"&pcolor="+Clr,true);
xmlhttp.send();
        }

    }else if(document.getElementById("Custom").checked==true){
        const checkboxes = document.querySelectorAll('input[name="Size"]:checked');
        let Sizes = [];
            checkboxes.forEach((checkbox) => {
             Sizes.push(checkbox.value);
            });
            console.log(Sizes)
            for( i=0; i<Sizes.length; i++ ){
                        ShowEntered(Gcode+Sizes[i],Pname,Sizes[i],Qty,Prc,Not,0)
                        xmlhttp.onreadystatechange = function(){
if (xmlhttp.readyState ==4 & xmlhttp.status ==200)

        if (xmlhttp.responseText.length==3){
            console.log("Added")

        }
        else {
            console.log(xmlhttp.responseText.length)
            console.log("SomeThing Happened!")
            
        }
}
xmlhttp.open("GET","./insData.php?pcode="+Gcode+Sizes[i]+"&pname="+Pname+"&psize="+Sizes[i]+"&pquantity="+Qty+"&pprice="+Prc+"&pnote="+Not+"&pcolor="+Clr,true);
xmlhttp.send();
                    }
                    
                }else{
                   
/*
 rowCounter=0
if(document.getElementById("firstRowC").value == ""){
    alert("Please Start Filling The Custom Sizes Table From The First Row!");
    return;
}else if(document.getElementById("secondRowC").value!=""){
rowCounter++;
}else if(document.getElementById("thirdRowC").value!=""){
rowCounter++;
}else if(document.getElementById("fourthRowC").value!=""){
rowCounter++;
}else if(document.getElementById("fifthRowC").value!=""){
rowCounter++;
}
alert(rowCounter)
*/
for(let i=1;i<6;i++){
    if(i==1){
        ProductCode=document.getElementById("firstRowC").value;
        PureSize = Math.round(document.getElementById("firstRow").value);
        RealSize = document.getElementById("firstRow").value

    }else if(i==2){
        ProductCode=document.getElementById("secondRowC").value;
        PureSize = Math.round(document.getElementById("secondRow").value);
        RealSize = document.getElementById("secondRow").value

        if(ProductCode =="") break;
    }else if(i==3){
        ProductCode=document.getElementById("thirdRowC").value;
        PureSize = Math.round(document.getElementById("thirdRow").value);
        RealSize = document.getElementById("thirdRow").value

        if(ProductCode =="") break;

    }else if(i==4){
        ProductCode=document.getElementById("fourthRowC").value;
        PureSize = Math.round(document.getElementById("fourthRow").value);
        RealSize = document.getElementById("fourthRow").value

        if(ProductCode =="") break;

    }else if(i==5){
        ProductCode=document.getElementById("fifthRowC").value;
        PureSize = Math.round(document.getElementById("fifthRow").value);
        RealSize = document.getElementById("fifthRow").value
        if(ProductCode =="") break;
    }
    console.log("THE I is: "+i);
    ShowEntered(ProductCode,Pname,PureSize,Qty,Prc,Not,RealSize)
                        xmlhttp.onreadystatechange = function(){
if (xmlhttp.readyState ==4 & xmlhttp.status ==200)

        if (xmlhttp.responseText.length==3){
            console.log("Added")

        }
        else {
            console.log(xmlhttp.responseText.length)
            console.log("SomeThing Happened!")
            
        }
}
xmlhttp.open("GET","./insData.php?pcode="+ProductCode+"&pname="+Pname+"&psize="+PureSize+"&pquantity="+Qty+"&pprice="+Prc+"&pnote="+Not+"&pcolor="+Clr+"&RealSize="+RealSize,true);
xmlhttp.send();
                    }




                }


}


function ShowEntered(SEcode,SPname,SSize,SQty,SPrc,SNot,SPSize){
    
        var empTab = document.getElementById('Pds');

        var rowCnt = empTab.rows.length;   // table row count.
        var tr = empTab.insertRow(rowCnt); // the table row.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < 7; c++) {
            var td = document.createElement('td'); // table definition.
            td = tr.insertCell(c);

            if (c == 0) {      // the first column.
                // add a button in every new row in the first column.
                var button = document.createElement('input');

                // set input attributes.
                button.setAttribute('type', 'Text');
                button.setAttribute('value',SEcode);
                button.setAttribute('disabled','true');

                // add button's 'onclick' event.

                td.appendChild(button);
            }
            else if(c== 1) {
                 var button = document.createElement('input');

                // set input attributes.
                button.setAttribute('type', 'Text');
                button.setAttribute('value',SPname);
                button.setAttribute('disabled','true');

                // add button's 'onclick' event.

                td.appendChild(button);
            }
            else if(c== 2) {
                 var button = document.createElement('input');

                // set input attributes.
                button.setAttribute('type', 'Text');
                button.setAttribute('value',SSize);
                button.setAttribute('disabled','true');

                // add button's 'onclick' event.

                td.appendChild(button);
            }
            else if(c== 3) {
                 var button = document.createElement('input');

                // set input attributes.
                button.setAttribute('type', 'Text');
                button.setAttribute('value',SQty);
                button.setAttribute('disabled','true');

                // add button's 'onclick' event.

                td.appendChild(button);
            }
            else if(c== 4) {
                 var button = document.createElement('input');

                // set input attributes.
                button.setAttribute('type', 'Text');
                button.setAttribute('value',SPrc);
                button.setAttribute('disabled','true');

                // add button's 'onclick' event.

                td.appendChild(button);
            }
            else if(c== 5) {
                 var button = document.createElement('input');

                // set input attributes.
                button.setAttribute('type', 'Text');
                button.setAttribute('value',SNot);
                button.setAttribute('disabled','true');

                // add button's 'onclick' event.

                td.appendChild(button);
            }
            else if(c== 6) {
                 var button = document.createElement('input');

                // set input attributes.
                button.setAttribute('type', 'Text');
                button.setAttribute('value',SPSize);
                button.setAttribute('disabled','true');

                // add button's 'onclick' event.

                td.appendChild(button);
            }
        }
    }





$('#ph').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: './photo.php',
        type: 'post',
        data:$('#ph').serialize(),
        success:function(){
alert("uploaded");
 }
    });
});
//to check the cheboxes in radio button cases
   document.addEventListener('input',(e)=>{
if(e.target.getAttribute('name')=="sz")
if(e.target.value=="All"){
    $(':checkbox').each(function() {
        document.getElementById("Sizes").hidden=false;

           this.checked = true;  
           this.disabled= true;                     
                      
       });
   } else if(e.target.value=="Custom") {
      $(':checkbox').each(function() {
        document.getElementById("Sizes").hidden=false;

           this.checked = false;   
           this.disabled= false;                     
       });
}else{
    document.getElementById("Sizes").hidden=true;
    document.getElementById("RealSizes").hidden=false;

}
})


function GenerateCode(){
    // entered code
    Ecode=document.getElementById("Pcode").value;
    // choosed color
    Ecolor= document.getElementById("Pcolor").value;
    //Generated Code
    if(Ecolor==""){
alert("Please Choose Color");
return;
    }else if(Ecolor=="Black")
Gcode=Ecode+"BLK";
else if(Ecolor=="White")
Gcode=Ecode+"WHT";
else if(Ecolor=="Red")
Gcode=Ecode+"RED";

document.getElementById("ToPcode").innerHTML="<b>Generated Code: "+ Gcode+"</b>";


    
}
function GenerateForCustom(thsid){
    if(document.getElementById(thsid).value==""){
        alert("Please Fill The Size!");
        return;
    }
 // entered code
 Ecode=document.getElementById("Pcode").value;
 //number after point

    // choosed color
    Ecolor= document.getElementById("Pcolor").value;
    //Generated Code
    if(Ecolor==""){
alert("Please Choose Color");
return;
    }else if(Ecolor=="Black")
Gcode=Ecode+"BLK"+Math.round(document.getElementById(thsid).value);
else if(Ecolor=="White")
Gcode=Ecode+"WHT"+Math.round(document.getElementById(thsid).value);
else if(Ecolor=="Red")
Gcode=Ecode+"RED"+Math.round(document.getElementById(thsid).value);

document.getElementById(thsid+'C').value=""+Gcode+"F"+document.getElementById(thsid).value;


}
</script>
	
</html>
