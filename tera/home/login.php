



<?php
//$LoggedIn;
if ($log=="out")
{
 $LoggedIn = "0";
}

if (!$LoggedIn)
{
  $nbStep = $_GET['nbStep'];
  if (!$nbStep)
  {
     $nbStep = 1;
  }
  $Next = $_GET['Next'];
  If ($Next == "Back")	
  {
  	$nbStep = $nbStep - 1 ;
  }
  if ( $Next == "Next")	
  {
  	$nbStep = $nbStep + 1;
  }
  if ( $Next == "Finish")	
  {
  	$nbStep = $nbStep + 1;
  }
  if ($Cancel == "Cancel")	
  {
  	$nbStep = 1;
  }
  if ($Next == "Submit")
  {
  	$nbStep = $nbStep + 1;
  }
  if ($nbStep == 1)
  {
    ?>
  <h2>Era Login</h2>
  <form method="GET" action="<?=$PHP_SELF?>">
  <input type="hidden" name="page" value="<?=$page?>">
  <input type="hidden" name="area" value="<?=$area?>">
  <input type="hidden" name="nbStep" value="<?=$nbStep?>">
    <p><b>Log in please</b></p>

    
            <table border="0" width="auto">
            <tr> 
              <td width="33%">Login Name</td> 
              <td width="33%"><input type="text" name="name" size="20"></td>
              <td width="34%"> </td> 
            </tr> 
            <tr>
              <td width="33%">Password</td> 
              <td width="33%"><input type="password" name="pass" size="20"></td>
            
            </tr> 
          </table>

        <p><input type="submit" value="Submit" name="Next">
        <input type="reset" value="Reset" name="res"></p>
        <p>or <a href="register.php">Register</p>
        </form>

    
<?php
  }
  
  if ($nbStep==2) 
  {
     if(empty($_GET['name']) || empty($_GET['pass']))
     {  ?>
     <h2>Era Login</h2>
        <b>Fill All Details </b>
                <?php
     }
     else
     {
         if (!$LoggedIn)
         {

	    echo "Authentication Failed";
            exit;
         }
         else
         {

	     echo "<center><h3>Welcome back $name and your password is $pass";
             echo "<a href='logout.php'>Logout</a>";

         }

     }
  }

}
if ($LoggedIn == "1")
{
 echo("<h2>Era Login</h2>");
   echo "<h3>$name is Logged on </h3>";
   echo "<p>Do you want to <a href='index.php?area=home&amp;page=login&amp;log=out'>Logout</a>?</p>";

   require ("home/index.php");
}

if ($LoggedIn == "-1")
{
   echo "<center><h3>Incorrect Loggin ";
   echo "<a href='index.php?area=home&amp;page=login'>Login?</a>?";

}  


?>

