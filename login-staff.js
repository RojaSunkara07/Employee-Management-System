function loginValidate(){
	let id=document.getElementById("staffID").value;
	let pass=document.getElementById("password").value;
	const idregex=/^\d+$/;
	const passregex=/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
	if(id == ""||pass == "")
	{
		alert("Please enter id and password...");
	}
	else if(id.length!=4||!id.match(/^\d+$/))
	{
		alert("Please enter valid id");
	}
	else if(pass.length>20||pass.length<8||!pass.match(/^[A-Za-z0-9_.]+$/))
	{
		alert("Please enter valid password");
	}
	
}