function fadeToBlack(context) {
	//using these variables is faster
	var width = context.canvas.width;
	var height = context.canvas.height;

	var pixels = context.getImageData(0,0,width,height); 

	var xEnd = width;
	var yEnd = height;
	var xStart = 0;
	var yStart = 0;

	var radius = 200000;

	context.fillStyle = "black";

	var fadeAnimation = setInterval(function(){
	  //each pixel has 4 components.
	  for(var y=yStart;y<yEnd;y++)
		for(var x=xStart;x<xEnd;x++)
		{
		  //this was a serious optimization.
		  var gaussian = Math.exp(-Math.pow(x-width/2,2)/radius - Math.pow(y-height/2,2)/radius);
		  pixels.data[4 * x + 4 * y * width] *= gaussian;
		  pixels.data[4 * x + 4 * y * width + 1] *= gaussian;
		  pixels.data[4 * x + 4 * y * width + 2] *= gaussian;
		}        

	  context.fillRect(0,0,250,250);
	  
	  //using the dirty box is faster
	  context.putImageData(pixels,0,0,xStart,yStart,xEnd-xStart,yEnd-yStart);

	  var rate = 22;
	  xStart += rate;
	  yStart += rate;
	  xEnd -= rate;
	  yEnd -= rate;

	  radius /= 2;
	},25);

	setTimeout(function(){clearInterval(fadeAnimation)},500);
}


function fadeToImage(context, image) {
	var width = context.canvas.width;
	var height = context.canvas.height;

	var tempCanvas = document.createElement("canvas");
	tempCanvas.width = width;
	tempCanvas.height = height;
	var tempContext = tempCanvas.getContext("2d");
	tempContext.drawImage(image,0,0);    

	var pixels = tempContext.getImageData(0,0,width,height); 

	var xEnd = width/2;
	var yEnd = height/2;
	var xStart = width/2;
	var yStart = height/2;

	var radius = 1.5;

	context.fillStyle = "black";

	var fadeAnimation = setInterval(function(){
	  //each pixel has 4 components.
	  for(var y=yStart;y<yEnd;y++)
		for(var x=xStart;x<xEnd;x++)
		{
		  var gaussian = Math.exp(-Math.pow(x-width/2,2)/radius - Math.pow(y-height/2,2)/radius);
		  pixels.data[4 * x + 4 * y * width] *= gaussian;
		  pixels.data[4 * x + 4 * y * width + 1] *= gaussian;
		  pixels.data[4 * x + 4 * y * width + 2] *= gaussian;
		}
			  
	  context.fillRect(0,0,250,250);

	  context.putImageData(pixels,0,0,xStart,yStart,xEnd-xStart,yEnd-yStart);
	  
	  tempContext.drawImage(image,0,0);    
	  pixels = tempContext.getImageData(0,0,width,height);

	  var rate = 70;
	  if(xStart>0)
		xStart -= rate;
	  if(yStart>0)
		yStart -= rate;
	  if(xEnd<width)
		xEnd += rate;
	  if(yEnd<height)
		yEnd += rate;

	  radius *= 10;
	},25);

	setTimeout(function(){clearInterval(fadeAnimation)},500);
}


function cleanFileList(fileList) { 
	var elementsToRemove = [".", ".."];
		
	for(var i = 0; i<elementsToRemove.length; i++) {
	var index = fileList.indexOf(elementsToRemove[i]);
	  if(index >= 0)
		fileList.splice(index, 1);
	}

	return fileList;
}


function drawCanvas() {                    
	var context = document.getElementById("display").getContext("2d");

	fadeToBlack(context);

	var image = this;
		  
	image.onload = function(){setTimeout(function(){fadeToImage(context,image)},500);}
}


function initImages(dir, fileList) {
	var images = new Array();

	for(var i = 0; i<fileList.length; i++) {  
		images[i] = new Image();
		images[i].src = dir + "/" + fileList[i];
		images[i].className = "thumbs";
		images[i].addEventListener("click", drawCanvas);              
	}

	return images;
}


function scrollThumbs(element, images, panelStart, panelLength) {
	if(element.id=="downArrow" && (images.length - panelStart)>=panelLength) {
		images[panelStart-1].parentNode.removeChild(images[panelStart-1]);
		document.getElementById("right").appendChild(images[panelStart+panelLength-1]); 
	}
	else if(element.id=="upArrow" && panelStart>=0) {
		images[panelStart+panelLength].parentNode.removeChild(images[panelStart+panelLength]);
		document.getElementById("right").insertBefore(images[panelStart], images[panelStart+1]); 
	}                 
}
