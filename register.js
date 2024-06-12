
function registerValidate()
{
	let firstname=document.getElementById("firstname").value;
	let lastname=document.getElementById("lastname").value;
	let phonenum=document.getElementById("phonenum").value;
	let email=document.getElementById("email").value;
	let fields=document.getElementById("fields").value;

	if(firstname=="")
	{
			}
	else if(lastname=="")
	{
		alert("Please enter Last Name");
	}
	else if(!firstname.match(/^[A-Za-z0-9_.]+$/)||!lastname.match(/^[A-Za-z0-9_.]+$/))
	{
		alert("First Name and last contains only Alphabets")
	}
	else if(email=="")
	{
		alert("Please enter Email");
	}
	else if(!email.match(/^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/))
	{
		alert("Please enter valid Email")
	}
	else if(phonenum=="")
	{
		alert("Please enter Phone Number");
	}
	else if(phonenum.length!=10||!phonenum.match(/^\d+$/))
	{
		alert("Please enter a valid Phone Number");
	}
	else if(fields == "")
	{
		alert("Please Select field");
	}
	else{
		alert("Thanks for regestering");
		location.replace("email1.php");
	}

}