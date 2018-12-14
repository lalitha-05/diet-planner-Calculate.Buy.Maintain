
<html>
   
 <head>
  
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
</script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
       
 <script>
    //jquery to animate image
   $(document).ready(function(){
    $("img").mouseenter(function(){
        $(this).animate({height:'450px',width:'450px'});
 
   });
    $("img").mouseleave(function(){
        $(this).animate({height:'300px',width:'300px'});
    });
});
 
   </script>
      
  <style>
           
 body{
                text-align:center;
   
background-image: url("pic.jpg ");
background-repeat:no-repeat;
background-size:1300px 650px; 
color:black;      }
       
 </style>
  
  </head>

</html>

<?php

session_start();

echo '<h2 style="text-align:center">'."Your cart".'<h2>';
 
   $totalsum=0;
    $subtotal=0;
    $id=$_POST["hidden"];
    $i=0;
    $p=0;
    $s=array();
       for($i=1;$i<strlen($id);$i++){
        if($id[$i]!=',')
{
            if($s[$p]===null){
                $s[$p]=$id[$i];
            }
         
   else{
                $s[$p]=$s[$p].$id[$i];
            }
        }
       
 else if($id[$i]==','){
            $p++;
        }
       }
   
 $conn=new mysqli("localhost","root","","mydb");
    
if(!$conn){
       
 die("Connection failed". $conn->connect_error);
    }
   
 $j=0;
   
 for($j=0;$j<count($s);
$j++)
{
    $sql="select name, price from products where id=".$s[$j]." ;";
   
 $result=$conn->query($sql);
   
 if($result->num_rows>0){
          
    echo '<html> <body>';
    echo '<table align="center">';
    
   
 while($row= $result->fetch_assoc())
{
        $subtotal=$row["price"];
        $totalsum+=$subtotal;
    echo '<td>';
   
 echo '<table > <tr>';
    
 
   echo '<tr> <td align="center">'.$row["name"].'</td> </tr>';
  
  echo '<tr> <td align="center"> Price: Rs'.$row["price"].'</td> </tr>';
    
echo ' </table>';
    }
    }
    }
   
 echo "The total price is".$totalsum;
   
 echo '<form action="placeorder.php"><input type="submit" value="Buy Now"></form>';
  
  echo '</body></html>';
    $conn->close();
    ?>