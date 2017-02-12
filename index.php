  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({
  selector: 'input#inputfield',
  height: 150,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: 'codepen.min.css'
});
;</script>


<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			
            <form name="shoutbox" method="post" action="">
				<input style="width: 75%;" type="Textarea" id="inputfield" name="shout" />
				<input style="width: 5%; margine: 0; padding: 0;" type="Submit" value="Chat!" />
			</form>
 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


				
<?php
header("Refresh:120");
header('Content-Type: text/html; charset=utf-8');

	$file = 'data.php';
	$maxdata = 250;
	$data = file($file);
	
	
					
	if (array_key_exists('shout', $_POST)) {
		$count = count($data);
		
		if ($count == $maxdata) {
			unset($data[0]);
		}
		
		array_push($data, $_POST['shout']."\n");
		file_put_contents($file, $data);
	}
	
	$data = array_reverse($data);
?>
<html>
	<head>
		<title>Chatbox</title>
		<style>
			#chatbox {
				padding: 0;
				width: 15%;
				margin: 0 auto;
			}
			#chatbox table {
				border-collapse: collapse;
				word-wrap: break-word;
				table-layout: fixed;
			}
			#chatbox table tr td { 
				font-family: Tahoma, Verdona, Arial;
				font-size: 12px;
				height: 24px;
				width: 100%;
				padding: 2px 5px 2px 5px;
				word-wrap: break-word;
				border: 1px solid #000;
			}
			#chatbox table tr:first-child td { 
				font-size: 14px;
				font-weight: bold;
				text-align: center;
				background-color: #000;
				color: #FFF;
			}
			.emote-happy, .emote-sad, .emote-love, .emote-cool, .emote-wink, .emote-smile, .emote-plain, .emote-tongue {
				display: inline-block;
				margin: 0;
				padding: 0;
				background-image: url('emoticons.png');
				width: 24px;
				height: 24px;
				background-repeat: no-repeat;
			}
			
			.emote-happy {
				background-position: 0 0;
			}
			
			.emote-sad {
				background-position: -24px 0;
			}
			
			.emote-love {
				background-position: -48px 0px;
			}
			
			.emote-cool {
				background-position: -72px 0;
			}
			
			.emote-wink {
				background-position: -96px 0;
			}
			
			.emote-smile {
				background-position: -120px 0;
			}
			
			.emote-plain {
				background-position: -144px 0;
			}
			
			.emote-tongue {
				background-position: -168px 0;
			}
			#chatbox {
    padding: 0;
    width: 95%;
    margin: 0 auto;
}


#chatbox table tr td {
    font-family: none;
    font-size: 12px;
    height: 24px;
    width: 100%;
    padding: 2px 5px 2px 5px;
    word-wrap: break-word;
    border: 1px solid #03A9F4;
    line-height: 1.5;
    font-size: x-large;
    text-align: justify;
    direction: rtl;
    padding: 10px;
    background: rgba(245, 222, 179, 0.52);
}

#chatbox table tr:first-child td {
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    background-color: #2196F3;
    color: #FFF;
    
}

input#inputfield{
    
    padding: 15px;
    margin: 0px 50px;
    text-align: justify;
    direction: rtl;
    font-size: x-large;
    line-height: 1.5;
	border: #03A9F4;
    background: rgba(255, 235, 59, 0.41);
    border-width: thin;
    border-style: solid;
    width: 75%;
}

#chatbox table tr td {
    font-family: none;
    font-size: 12px;
    height: 24px;
    width: 100%;
    padding: 2px 5px 2px 5px;
    word-wrap: break-word;
    border: 1px solid #03A9F4;
    line-height: 1.5;
    font-size: x-large;
    text-align: justify;
    direction: rtl;
    padding: 10px;
    background: rgba(245, 222, 179, 0.52);

}

a {
    margin: 0.5em;
    padding: 1px 15px;
}

#chatbox table tr td {
    font-family: none;
    font-size: 12px;
    height: 24px;
    width: 100%;
    padding: 2px 5px 2px 5px;
    word-wrap: break-word;
    border: 1px solid #03A9F4;
    line-height: 1.5;
    font-size: x-large;
    text-align: justify;
    direction: rtl;
    padding: 10px;
    background: rgba(255, 235, 59, 0.48);
}


input{
    width: 5%;
    margine: 0;
    padding: 0;
    width: 150px;
    height: 25px;
    margin: 10px;
}


@media only screen
and (min-device-width : 320px)
and (max-device-width : 568px)

{
body   {
         zoom: 2;
}
html {
         zoom: 2;
}
p  {
    font-size: 0.75em;
}
}	
</style>
	</head>
	<body>
		<div id="chatbox">
			<table width="100%">
				<tr>
					<td>المحادثات والتواصل</td>
				</tr>
				<?php
					for($i = 0; $i < $maxdata; $i++) {
						if (array_key_exists($i, $data)) {
							$data[$i] = str_replace($emoticons, $replace, $data[$i]);
							echo '
								<tr>
									<td>'.$data[$i].'</td>
								</tr>
							';
						}
					}
				?>
			</table>

			
		</div>
	</body>
</html>
<?php
 
//<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
//<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
//<textarea name="input#inputfield" style="width: 100%;">				
 
?>

<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
