
//var xml = "<rss version='2.0'><channel><title>RSS Title</title></channel></rss>",
function parser(xml, find){
	xmlDoc = $.parseXML( xml ),
	$xml = $( xmlDoc ),
	$title = $xml.find( find );

	/* append "RSS Title" to #someElement */
	var returnValue = ( $title.text() );

	return returnValue;
/*	 change the title to "XML Title" 
	$title.text( "XML Title" );

	 append "XML Title" to #anotherElement 
	$( "#anotherElement" ).append( $title.text() );*/
}