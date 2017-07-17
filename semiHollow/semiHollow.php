<!doctype html>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>Patrick's Guitars - Photo Gallery</title>
		<link rel="stylesheet" href="../css/top.css" />
		<link rel="stylesheet" href="../css/sidebar.css" />
		<link rel="stylesheet" href="../css/instruments.css" />
		<script src="../js/common.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
			window.onload = function() {
				var dir = "./images";

				var fileList = <?php echo json_encode(scandir("images")); ?>;

				var cleanList = cleanFileList(fileList);
				
				var images = initImages(dir, cleanList);     

				images[1].onload = function(){
					$("#display").html(images[1]);
					$(images[1]).animate({"opacity":1},500)
				};
				
				var $right = $("#right");
				
				for (idx = 0; idx < images.length; idx++) {
					$right.append(images[idx]);
				}
			};
        </script>
    </head>

    <body> 
		<div id="header">
			<img src="../img/title - vladimir script.png"/>
		</div>
		<div id="wrapper">
			<div id="left">
				<dl>
					<dt id="hollow"></dt>
					<dd></dd>

					<dt id="semiHollow"></dt>
					<dd></dd>

					<dt id="solid"></dt>
					<dd></dd>
				</dl>
			</div>

			<div id="center">
				<div id="display"></div>
			</div>
			
			<div id="right">
			</div>
		</div>
    </body>
</html>
