<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" href="../css/material.min.css">
<script src="../js/material.min.js"></script>
<script src="../js/myscripts.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/bootstrap.css">
<script type="text/javascript" src="../assets/jquery.js"></script>
<script type="text/javascript" src="../assets/bootstrap.js"></script>
<script type="text/javascript" src="../assets/bootbox.min.js"></script>
<script type="text/javascript" src="../assets/sorttable.js"></script> 
</head>
<body>
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
&nbsp

<input type="checkbox" id="Size36"  value="36" name="Size" checked disabled></input>
<label for="Size36"> 36</label>&nbsp &nbsp 
<input type="checkbox" id="Size37"  value="37" name="Size" checked disabled>
<label for="Size37"> 37</label>&nbsp &nbsp  
<input type="checkbox" id="Size38"  value="38" name="Size" checked disabled>
<label for="Size38"> 38</label>&nbsp &nbsp 
<input type="checkbox" id="Size39"  value="39" name="Size" checked  disabled>
<label for="Size36"> 39</label>&nbsp &nbsp 
<input type="checkbox" id="Size40"  value="40" name="Size" checked disabled>
<label for="Size40"> 40</label>&nbsp &nbsp 
<input type="checkbox" id="Size41"  value="41" name="Size" checked disabled>
<label for="Size41"> 41</label>&nbsp &nbsp 
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
<input type="submit"></input>
</fieldset>
</form>

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


</table>
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
    if (document.getElementById("All").checked==true){
       
        for( i=36; i<42; i++ ){
            ShowEntered(Gcode,Pname,i,Qty,Prc,Not)
        }
    }else{
        const checkboxes = document.querySelectorAll('input[name="Size"]:checked');
        let Sizes = [];
            checkboxes.forEach((checkbox) => {
             Sizes.push(checkbox.value);
            });
            console.log(Sizes)
            for( i=0; i<Sizes.length; i++ ){
                        ShowEntered(Gcode+Sizes[i],Pname,Sizes[i],Qty,Prc,Not)
                    }
                    
                }


}


function ShowEntered(SEcode,SPname,SSize,SQty,SPrc,SNot){
    
        var empTab = document.getElementById('Pds');

        var rowCnt = empTab.rows.length;   // table row count.
        var tr = empTab.insertRow(rowCnt); // the table row.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < 6; c++) {
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
           this.checked = true;  
           this.disabled= true;                     
                      
       });
   } else {
      $(':checkbox').each(function() {
           this.checked = false;   
           this.disabled= false;                     
       });
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
</script>
</html>