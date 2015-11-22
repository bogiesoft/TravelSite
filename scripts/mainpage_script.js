window.onload = init;

function init(){
    //console.log("This works");					//Use console.of(); to pass data to Browser Console.
	//Image Array Function calls for Main Page
	
	//var images = imgArray();
	//var desc = strArray();
	//buildTable(desc);
	
	//buildImage();
	
}

function imgArray(){
	var images = document.getElementsByClassName("photo"); 
	var srcList = [];
	for(i = 0; i < images.length; i++) {
		srcList.push(images[i].src);
	}
	return srcList;
}

function strArray(){
	var images = document.getElementsByClassName("photo"); 
	var altList = [];
	for(i = 0; i < images.length; i++) {
		//altList.push(img = images[i].alt + " " + images[i].src);
		altList.push(images[i].alt);
	}
	return altList;
}

function buildTable(arrName){

var arrayLength = arrName.length;
var theTable = document.createElement("table");

for (var i = 0, div, elem, tr, td; i < arrayLength; i++) {
	div = document.createElement("div");
    tr = document.createElement("tr");
    td = document.createElement("td");
    td.appendChild(document.createTextNode(arrName[i]));
    tr.appendChild(td);
	div.appendChild(tr);
    theTable.appendChild(div);
}
document.getElementById("table").appendChild(theTable);

}

function buildImage()
{
	var myImages = new Array();
	myImages[0] = new Image();					//need to create a "new Image()" object for each new image we want to add to array.
	myImages[0].src = "images/photo7.jpg";
	myImages[1] = new Image();
	myImages[1].src = "images/photo8.jpg";
	myImages[2] = new Image();
	myImages[2].src = "images/photo9.jpg";
	myImages[3] = new Image();
	myImages[3].src = "images/photo10.jpg";
	myImages[4] = new Image();
	myImages[4].src = "images/photo11.jpg";
	myImages[5] = new Image();
	myImages[5].src = "images/photo12.jpg";
	
	var myDescs = ["Greenland", "Hawaii", "Namibia", "Paris", "Botswana", "China"];
	
	var theTable = document.getElementById("table");
	for (var i = 0, img, tr, td; i < myImages.length; i++) {

	img = document.createElement("img");
	img.src = myImages[i].src;
	img.setAttribute("width", "200px");
	img.setAttribute("height", "200px");
    tr = document.createElement("tr");
    td = document.createElement("td");
	td.appendChild(document.createTextNode(myDescs[i]));
    td.appendChild(img);
    tr.appendChild(td);
    theTable.appendChild(tr);
}
	document.getElementById("table").appendChild(tr);
}


