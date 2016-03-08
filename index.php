<?php
	$audio = array();
	$audiodirectory = 'audio';
	
	// build an array of audio files 
	$directory = new DirectoryIterator($audiodirectory);
	foreach ($directory as $fileinfo) {
		if ($fileinfo->isFile()) {
			$extension = $fileinfo->getExtension();
			if($extension == "mp3"||$extension == "ogg"||$extension == "m4a"){
				$audio[] = $fileinfo->getFilename();
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  	<title>Soundboard</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="description" content="Soundboard">
  	<meta name="viewport" content="width=device-width">
	<meta property="og:title" content="Soundboard" />
	<meta property="og:image" content="/img/soundboard.jpg" />	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>	  
  	<link rel="stylesheet" type="text/css" href="soundboard.css">
  	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">   
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" /> 
</head>

<body>
<div id="soundboard">
</div>	
  
	<script type="text/javascript">
		// pass PHP array of audio files declared above to JavaScript variable
		var ar = <?php echo json_encode($audio) ?>;
		var BASE_AUDIO_PATH = '' + <?php echo json_encode($audiodirectory) ?> + '/';

		// sort files to be in alphabetical order by title
		ar.sort(function (a, b) {
		    return a.toLowerCase().localeCompare(b.toLowerCase());
		});

		// Add <audio> files and buttons to soundboard
		// preload set to "none" is optional
		ar.map(function(url){
			$('#soundboard').append(function(){
				var thisAudio = $('<audio/>').attr({
					src: BASE_AUDIO_PATH + url,
					preload: "none",
					onplay:"$(this).siblings('button').css('color', 'yellow');",
					onended: "$(this).siblings('button').css('color', 'white');"	
					}) 	
				var buttonText = url.replace(/[-_]/g, ' ').replace('.mp3', '').replace('.ogg','').replace('.m4a','').replace('[Q]','?');			
				var thisButton = $('<button />').addClass('myButton').text(buttonText);			 		
				return $('<span />').addClass('track').append(thisAudio).append(thisButton);
			})
		});
		$('#soundboard').on( 'click', 'button', function() {			
			$(this).siblings('audio').get(0).play();							
		});				
	</script>

	<audio id="audioBackground1" autoplay loop><!-- https://developer.mozilla.org/en-US/docs/Games/Techniques/Audio_for_Web_Games -->
		<source src="audio/background-loop.ogg" type="audio/ogg" />
	</audio>
<div id="footer">
	<p><strong><a href="./"><button id="reset" />Reset</button></a>
	<p><button id="backgroundToggle">Background  &Vert; / &vrtri; </button>
</div>
        <script>
		$("#backgroundToggle").click(function() {
			var bga = $("#audioBackground1");
			if (bga.prop("paused") == false) {
				bga.trigger("pause");
			} else {
				bga.trigger("play");
			}
		});

		$(document).ready(function(){
			$("audio").each(function(idx){
				console.log(idx+ " " + this.src);
			});
		});

		//And finally Google analytics or other load-ups if you need them.
        </script>
</body>
</html>
