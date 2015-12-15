/**
	@author: 188383@student.pwr.edu.pl
	
	manipulation of the table so that it can become editable
**/

var table = null;
var firstname = null;
var firstnameold = null;
var lastname = null;
var lastnameold = null;
var button = null;
var email = null;
$(function(){
	firstname = document.getElementById('firstname');
	lastname = document.getElementById('lastname');
	email = document.getElementById('email');
	button = document.getElementById('button');
	
	initialize();
})

function initialize(){
	button.addEventListener('click',function(){
		if(button.value=='edit'){
			button.value = 'save';
			button.innerHTML = 'save';
			firstname.contentEditable = true;
			lastname.contentEditable = true;
			lastnameold = lastname.innerHTML,
			firstnameold = firstname.innerHTML
		}else{
			button.value = 'edit';
			button.innerHTML = 'edit';
			firstname.contentEditable = false;
			lastname.contentEditable = false;
			$.ajax('/user/'+email.innerHTML+'/edit',
			
			{dataType:'json',
			data:{firstname:firstname.innerHTML,lastname:lastname.innerHTML}})
			.done(function(data){
				console.log(data)
			}).fail(function(){firstname.innerHTML = firstnameold; lastname.innerHTML = lastnameold});
		}
	});
}

function sendUpdate(){
	
}
 	



