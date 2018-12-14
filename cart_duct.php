<html>
   
 <head>
   
 <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
 <script>
        
function cart(val){ 
            var x=document.getElementById("hidden").value;
          
  if(x==null){
            document.getElementById("hidden").value=val;
        }
      
  else{
            x=x+','+val;
        }
        document.getElementById("hidden").value=x;
        }
   
 </script>
  
<style>
body{
background-image: url("pic.jpg ");
background-repeat:no-repeat;
background-size:1300px 650px;
color:black;
}
</style>
  </head>
</html>

<?php
  
session_start();

$conn=new mysqli("localhost","root","","mydb");

if(!$conn){
    die("Connection failed". $conn->connect_error);
}
  
  echo '<form action="cart_pro.php" method="POST"><input type="submit" value="go to cart">';
  
  $sql="select * from products;";
    $result=$conn->query($sql);
  
  $count=0;
    if($result->num_rows>0){
          
    echo '<html> <body>';
  
  echo '<table align="center">';
    
  
  while($row= $result->fetch_assoc()){
      
  if($count==3 or $count==0){
            echo '<tr>';
           
        }
 
 echo '<td>';
    echo '<table align="center"> <tr>';
   
 echo '<td align="center"></td></tr>';
    
  echo '<tr> <td align="center">'.$row["name"].'</td> </tr>';
    
echo '<tr> <td align="center"> Price: Rs'.$row["price"].'</td> </tr>';
   
 echo '<tr> <td align="center"><button type="button" onclick="cart('.$row["id"].')"  >Add to cart</button></td></tr>';
 
echo '<br>'; 
  echo ' </table>';
    echo '</td>';
    $count++;
    if($count==3 or $count==0){
          
  echo "</tr>";
           $count=0;
        }
    }
    echo "<input type='hidden' name='hidden' id='hidden'>";
  
  echo '</table>';
  echo "</form>";
    echo '</body> </html>';
    }
  
    
  $conn->close();
  ?>
