<!doctype html>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>Patrick's Guitars - Photo Gallery</title>
		<link rel="stylesheet" href="../css/top.css" />
		<link rel="stylesheet" href="../css/sidebar.css" />
		<link rel="stylesheet" href="../css/instruments.css" />
		<script type="text/javascript" src="../js/common.js"></script>
        <script>
			window.onload = function() {
				var dir = "./images";

				var fileList = <?php echo json_encode(scandir("images")); ?>;

				var cleanList = cleanFileList(fileList);
				
				var images = initImages(dir, cleanList);

				var context = document.getElementById("display").getContext("2d");        

				images[1].onload = function(){fadeToImage(context,images[1])};
			};
        </script>
    </head>

    <body>
        <div id="header">
            <div id="innerHeader">
                <a href="../index.html" title="To Home">
                    <span class="headerCaps">P</span>atrick's <span class="headerCaps">G</span>uitars
                </a>
            </div>
        </div>
      
        
<div id="transparency"></div>
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
            <canvas id="display" width="250px" height="250px"></canvas>  
              
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis nulla eu leo porttitor malesuada. Ut id nisl orci. Etiam a velit dolor. Nullam nulla velit, euismod eget luctus eget, pellentesque nec arcu. Nam feugiat facilisis nisi, non mattis ligula aliquet nec. Vestibulum a faucibus nisl, non viverra purus. Sed dui diam, laoreet ac metus sit amet, facilisis aliquet est. Aliquam venenatis, risus iaculis ornare mollis, eros tortor semper elit, sed ullamcorper turpis eros imperdiet lorem. Praesent at aliquam enim. Morbi pulvinar luctus justo eget porttitor. Nam euismod turpis vel porta aliquam. Maecenas ante leo, pellentesque ac adipiscing ut, varius non elit. Morbi ut libero nec quam pretium lobortis. Vivamus vel laoreet massa.
            </p>   
              
            <p>
                Proin ornare urna nunc, eu bibendum urna porta ut. Cras vehicula a massa luctus sollicitudin. Suspendisse tincidunt viverra volutpat. Etiam in malesuada orci. Aliquam dictum in neque eget pulvinar. Quisque tincidunt mi magna, sit amet lobortis mauris lacinia interdum. Suspendisse at ullamcorper magna, sit amet blandit eros.
            </p>     

            <p>
                Fusce ac augue vel lacus rutrum hendrerit eu ac metus. Donec a est a leo sollicitudin consequat in vel libero. Aliquam purus mi, accumsan nec nisl ut, ornare consectetur dolor. Nulla tincidunt augue id scelerisque convallis. Pellentesque mattis purus nec lectus tincidunt, eget lacinia turpis elementum. Morbi dictum augue at sodales dictum. Fusce volutpat urna eu orci gravida, at dictum metus scelerisque. Vestibulum ut euismod magna. Sed nec risus tempor, suscipit lacus et, faucibus enim. Nam bibendum magna non nisi fermentum euismod.
            </p>
          </div>

          <div id="right">
            <dl>
              <dt class="rightSidebar"></dt>
              <dd></dd>

              <dt class="rightSidebar"></dt>
              <dd></dd>

              <dt class="rightSidebar"></dt>
              <dd></dd>

               <dt class="rightSidebar"></dt>
              <dd></dd>

              <dt class="rightSidebar"></dt>
              <dd></dd>
            </dl>
          </div>

      </div>      

    <div id="footer">&copy; copyright &copy;</div>  

    </body>
</html>
