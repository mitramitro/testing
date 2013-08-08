<?php
 // Create a document instance 
  $doc = new DOMDocument();
  //Load the Book.xml file
  $doc->load( 'Book.xml' );
  
  //Searches for all elements with the "book" tag name
  $books = $doc->getElementsByTagName( "book" );
 
  //Searches for all elements with the "author" tag name
  $authors = $doc->getElementsByTagName( "author" );
  //Returns the first element found having the tag name "author"
  $author = $authors->item(0)->nodeValue;
  
  //Searches for all elements with the "publisher" tag name
  $publishers = $doc->getElementsByTagName( "publisher" );
  //Returns the first element found 
  //having the tag name "publisher"
  $publisher = $publishers->item(0)->nodeValue;
  
  //Searches for all elements with the "name" tag name
  $titles = $doc->getElementsByTagName( "name" );
  //Returns the first element found having the tag name "name"
  $title = $titles->item(0)->nodeValue;
  
  //Printing the found values
  echo "$title - $author - $publisher \n";
 ?>