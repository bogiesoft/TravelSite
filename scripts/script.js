//Author: Mark Wilson
//Title:script.js
//OOSD Spring Track 2015
window.onload = init;

function init(){
	// If the browser is not IE, we change isIE to false. Otherwise it'll be left as true.
	if (document.getElementById("customerForm").addEventListener) {
		isIE = false;
	}
	
	if (isIE) {
		document.getElementById("customerForm").attachListener("onsubmit", function(event) {processForm(event);});
		document.getElementById("agentForm").attachListener("onsubmit", function(event) {processAgentForm(event);});
	} else{
		document.getElementById("customerForm").addEventListener("submit", function(event) {processForm(event);}, false);
		document.getElementById("agentForm").addEventListener("submit", function(event) {processAgentForm(event);}, false);//99% of the time use "false" in this function.  The false keyword is necessary for
	}

}

function processForm(event){
	var firstName = document.getElementById("CustFirstName");
	var lastName = document.getElementById("CustLastName");
	var address = document.getElementById("CustAddress");
	var city = document.getElementById("CustCity");
	var province = document.getElementById("CustProv");
	var postal = document.getElementById("CustPostal");
	var country = document.getElementById("CustCountry");
	var homephone = document.getElementById("CustHomePhone");
	var busphone = document.getElementById("CustBusPhone");
	var email = document.getElementById("CustEmail");
	var username = document.getElementById("CustUserName");
	var password = document.getElementById("CustPassword");
	
	//Combine the form fields into an array to test - Customers
	var textArray = [firstName, lastName, address, city, province, postal, country, homephone, busphone, email, username, password];
	
	///////////////////////////////////
	//Check Customers
	///////////////////////////////////
	//Set variable with size of array
	var numLoops = textArray.length;
	
	//yellow (css) box used for invalid fields
	var noValid = document.getElementById("noValid");
	
	//loop through array to validate each unique field
	for (var i=0; i<numLoops; i++) {
		//Remove whitespace
		if (textArray[i].value.trim() == "") {
			// Get position of textbox that is not valid and 
			// set the noValid to just under its position.
			noValid.style.left = textArray[i].offsetLeft + "px";
			noValid.style.top  = textArray[i].offsetTop + textArray[i].offsetHeight + "px";	//the offsetLeft. top and height are HTML properties that we can access in JavaScript
			noValid.innerHTML = "Please enter a value.";
			noValid.classList.remove("hideValid");		//in JavaScript HTML elements have a "classList" property.
			noValid.classList.add("showValid");
			
			// Make the textbox background yellow (css) to highlight it and 
			// focus the cursor to it.
			textArray[i].classList.add("fieldError");
			//textArray[i].focus();
			
			// Returning false ensures the form isn't submitted to the server
			// or whatever other form processor. In this case it also breaks the loop.
			event.preventDefault();	//this prevents the form from being submitted.  This function can also be used on href links to other websites.
			return;
			
		} else {
			// If all is well, then we ensure we remove the highlight from 
			// the textbox in case there was not before.
			textArray[i].classList.remove("fieldError");
		}
	}
	//End For Loop
	
	//Added for Assignment #5
	//Validate Email address
		var regEx_Email = /^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/;
		if (!regEx_Email.test(email.value)) {
		noValid.style.left = email.offsetLeft + "px";
		noValid.style.top  = email.offsetTop + email.offsetHeight + "px";
		noValid.innerHTML = "Enter a valid email address.";
		noValid.classList.remove("hideValid");
		noValid.classList.add("showValid");
		
		email.classList.add("fieldError");
		
		event.preventDefault();
		return;
		
		} else {
		email.classList.remove("fieldError");
		}
	
	//Added for Assignment #5
	//Validate postal code
		//var regEx_postal = /^\s*[a-ceghj-npr-tvxy]\d[a-ceghj-npr-tv-z](\s)?[\s.-]\d[a-ceghj-npr-tv-z]\d\s*$/i;
		var regEx_postal = /^[A-Z]\d[A-Z] ?\d[A-Z]\d$/;
		if(!regEx_postal.test(postal.value)){
		noValid.style.left = postal.offsetLeft + "px";
		noValid.style.top  = postal.offsetTop + postal.offsetHeight + "px";
		noValid.innerHTML = "Enter a valid postal code Eg. X1X 1X1";
		noValid.classList.remove("hideValid");
		noValid.classList.add("showValid");
		
		email.classList.add("fieldError");
		
		event.preventDefault();
		return;
		
		} else {
		postal.classList.remove("fieldError");
		}
	
//Added for Assignment #5	
	//Validate Phone Number
		//var regEx_Phone = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;
		var regEx_Phone = /^(\+\d{1,2})?\(?\d{3}\)?\d{3}[.-]\d{4}$/;
		if (!regEx_Phone.test(homephone.value)){
		noValid.style.left = homephone.offsetLeft + "px";
		noValid.style.top  = homephone.offsetTop + homephone.offsetHeight + "px";
		noValid.innerHTML = "Enter a valid phone number Eg. (555)555-1234";
		noValid.classList.remove("hideValid");
		noValid.classList.add("showValid");
		
		homephone.classList.add("fieldError");
		
		event.preventDefault();
		return;
		
		} else {
		homephone.classList.remove("fieldError");
		}
		
	//Added for Assignment #5	
	//Validate Phone Number
		//var regEx_Phone = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;
		var regEx_Phone = /^(\+\d{1,2})?\(?\d{3}\)?\d{3}[.-]\d{4}$/;
		if (!regEx_Phone.test(busphone.value)){
		noValid.style.left = busphone.offsetLeft + "px";
		noValid.style.top  = busphone.offsetTop + busphone.offsetHeight + "px";
		noValid.innerHTML = "Enter a valid phone number Eg. (555)555-1234";
		noValid.classList.remove("hideValid");
		noValid.classList.add("showValid");
		
		busphone.classList.add("fieldError");
		
		event.preventDefault();
		return;
		
		} else {
		busphone.classList.remove("fieldError");
		}
	
	// If we made it to this section, we're all good!
	// Ensure the noValid is gone.
	noValid.classList.remove("shownoValid");
	noValid.classList.add("hidenoValid");
	
	return confirm("Continue to submit form?");
	
}
//End processForm

//Begin processAgentForm
function processAgentForm(event){
	var aFirstName = document.getElementById("AgtFirstName");
	var aMiddleInitial = document.getElementById("AgtMiddleInitial");
	var aLastName = document.getElementById("AgtLastName");
	var aBusPhone = document.getElementById("AgtBusPhone");
	var aEmail = document.getElementById("AgtEmail");
	var aPosition = document.getElementById("AgtPosition");
	var aUserName = document.getElementById("AgtUserName");
	var aPassword = document.getElementById("AgtPassword");
	var aId = document.getElementById("AgencyId");
	
	//Combine the form fields into an array to test - Agents
	var textArray = [aFirstName, aMiddleInitial, aLastName, aBusPhone, aEmail, aUserName, aPassword, aPosition, aId];
	
	///////////////////////////////////
	//Check Customers
	///////////////////////////////////
	//Set variable with size of array
	var numLoops = textArray.length;
	
	//yellow (css) box used for invalid fields
	var noValid = document.getElementById("noValid");
	
	//loop through array to validate each unique field
	for (var i=0; i<numLoops; i++) {
		//Remove whitespace
		if (textArray[i].value.trim() == "") {
			// Get position of textbox that is not valid and 
			// set the noValid to just under its position.
			noValid.style.left = textArray[i].offsetLeft + "px";
			noValid.style.top  = textArray[i].offsetTop + textArray[i].offsetHeight + "px";	//the offsetLeft. top and height are HTML properties that we can access in JavaScript
			noValid.innerHTML = "Please enter a value.";
			noValid.classList.remove("hideValid");		//in JavaScript HTML elements have a "classList" property.
			noValid.classList.add("showValid");
			
			// Make the textbox background yellow (css) to highlight it and 
			// focus the cursor to it.
			textArray[i].classList.add("fieldError");
			//textArray[i].focus();
			
			// Returning false ensures the form isn't submitted to the server
			// or whatever other form processor. In this case it also breaks the loop.
			event.preventDefault();	//this prevents the form from being submitted.  This function can also be used on href links to other websites.
			return;
			
		} else {
			// If all is well, then we ensure we remove the highlight from 
			// the textbox in case there was not before.
			textArray[i].classList.remove("fieldError");
		}
	}
	//End For Loop

	//Added for Assignment #5
	//Validate Email address
		var regEx_Email = /^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/;
		if (!regEx_Email.test(aEmail.value)) {
		noValid.style.left = aEmail.offsetLeft + "px";
		noValid.style.top  = aEmail.offsetTop + aEmail.offsetHeight + "px";
		noValid.innerHTML = "Enter a valid email address.";
		noValid.classList.remove("hideValid");
		noValid.classList.add("showValid");
		
		aEmail.classList.add("fieldError");
		
		event.preventDefault();
		return;
		
		} else {
		aEmail.classList.remove("fieldError");
		}
		
	//Added for Assignment #5
	//Validate Business Phone Number
		//var regEx_Phone = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;
		var regEx_Phone = /^(\+\d{1,2})?\(?\d{3}\)?\d{3}[.-]\d{4}$/;
		if (!regEx_Phone.test(aBusPhone.value)){
		noValid.style.left = aBusPhone.offsetLeft + "px";
		noValid.style.top  = aBusPhone.offsetTop + aBusPhone.offsetHeight + "px";
		noValid.innerHTML = "Enter a valid phone number Eg. (555)555-1234";
		noValid.classList.remove("hideValid");
		noValid.classList.add("showValid");
		
		aBusPhone.classList.add("fieldError");
		
		event.preventDefault();
		return;
		
		} else {
		aPhone.classList.remove("fieldError");
		}
	
	// If we made it to this section, we're all good!
	// Ensure the noValid is gone.
	noValid.classList.remove("shownoValid");
	noValid.classList.add("hidenoValid");
	
	return confirm("Continue to submit form?");
	
//End processAgentForm
}

//Added for Assignment #6 - Display a message in each form box
function displayMessage(field){
	field = field.toString();
	field = document.getElementById(field);
  
	var strMessage = document.getElementById('message');
	strMessage.style.left = field.offsetLeft + "px";

	strMessage.style.top  = field.offsetTop + field.offsetHeight + "px";
	strMessage.innerHTML = "This is the " + field.name + " field, please enter a value.";

	strMessage.classList.remove("hideMessage");	
	strMessage.classList.add("showMessage");

	setTimeout(function(){
		strMessage.classList.remove("showMessage");
		strMessage.classList.add("hideMessage");
		} ,3000);

}



