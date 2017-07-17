function cleanFileList(fileList) { 
	var elementsToRemove = [".", ".."];
		
	for(var i = 0; i<elementsToRemove.length; i++) {
	var index = fileList.indexOf(elementsToRemove[i]);
	  if(index >= 0)
		fileList.splice(index, 1);
	}

	return fileList;
}

function initImages(dir, fileList) {
	var images = new Array();

	for(var i = 0; i<fileList.length; i++) {  
		images[i] = new Image();
		images[i].src = dir + "/" + fileList[i];
		images[i].addEventListener("click", function(){
			var big = new Image();
			
			big.src = this.src;
			
			big.onload = function(){
				$("#display").html(big);
			
				$(big).animate({"opacity":1},500)
			};
			
			
		});              
	}

	return images;
}
