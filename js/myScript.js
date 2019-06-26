$(document).ready(function(){
	$(".login").hide();
	$(".loginBtn").on("click", function(e){

		$(".login").slideToggle();
	});
});


// Add active class to the current button (highlight it)
let li = document.querySelectorAll("nav ul li");
for (let i = 0; i < li.length; i++) {
	const element = li[i];
	element.addEventListener("click", function(){
		let current = document.getElementsByClassName("active");
		current[0].className = current[0].className.replace(" active", "");
		this.className += " active";
	});
}
