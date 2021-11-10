<?php

//The name of the file where the output will be saved.
$locationToSave = "allSentencesWithText.txt";




$fileLocation = readline('Enter the location of the file: ');

$fileText = file_get_contents($fileLocation);

$textToSearch = readline('Enter the text you wish to search for: ');



echo "Searching for the text....";


//splits the text in the file into individual sentences
$splitFileText = explode(".", $fileText);

$sentencesToSave = array();

//gets number of sentences in file and gets the amount of steps to complete search
$fileCount = count($splitFileText);
$steps = 100/$fileCount;

//loops though text in file 
for($i =0; $i <= $fileCount-1; $i++){
    //Checks if sentences contains string to be searched for
    if(strpos($splitFileText[$i],$textToSearch)){
        array_push($sentencesToSave,$splitFileText[$i]);
        
    }
    $p = $steps*$i;
    echo "%$p complete \n";
    
}

//saves the sentences containing the text to the specified file.
$fileToSave = fopen($locationToSave, "w");
for($i =0; $i <= count($sentencesToSave)-1; $i++){
    fwrite($fileToSave, "$sentencesToSave[$i]"."\n");
}
fclose($fileToSave);

echo "Finished finding sentences with you requested text. \n";
echo "You can Find the outputted text in the $locationToSave file.";

?>