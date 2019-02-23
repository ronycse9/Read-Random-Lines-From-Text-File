<?php 
//start session variable
session_start();

//file open in read mode
$myfile = fopen("quotes.txt", "r") or die("Unable to open file!");
$word_array = $new_word_array = array();

/* The feof() function checks if the "end-of-file" (EOF) has been reached.
   The fgets() function returns a line from an open file. 
*/

while(!feof($myfile)){
	$word_array[] = trim(fgets($myfile)); 
}
 
//remove the empty value from the array  
foreach($word_array as $key => $value){	 
  if($value != ""){
	  array_push($new_word_array,$value);		 
  }
}
  
// print the line array  from text file
echo "<pre>";
  print_r($new_word_array);
echo "</pre>";

//generate the random index for print random value from array
$line = rand(0,(count($new_word_array)-1));

//print the random line
echo $new_word_array[$line]."<br>";

//if you need show random quote whole day log same then use session varibale
$quote = $new_word_array[$line];

if(!isset($_SESSION['date']) || $_SESSION['date'] < date("Y-m-d")){	
	$_SESSION['date']  = date("Y-m-d");
	$_SESSION['quote'] = $quote;
}

echo $_SESSION['quote'];


//close the open file
fclose ($myfile); 

?>