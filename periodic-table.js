$.ajax({
	url: "detail.php",
	type: 'GET',
	success: function(data){
		details = JSON.parse(data);
	}
});

function search(input){
	$.ajax({	//get available choices and change the color
		url: "search.php",
		type: 'GET',
		data: {'input': input},
		success: function(data){
			var obj = JSON.parse(data);	//object of available elements
			$(".table").removeClass("available");	//clean the class
			for(x in obj) {
				$("#"+obj[x]+".table").addClass("available");	//add available class to the returned ids.
			}
		}
	});
}

$(document).ready(function(){
	//initialization
	search("");
	var selectedEles = new Array();
	var elementArray = new Array();
	var detailLine=0;
	var hoverLine = 0;
	for(var i=0;i<87;i++){
		elementArray[i] = $("#"+i).text();	//get the map of proton number and element name
	}
	//Hover function
	$(".table").hover(function(){
		hoverLine=detailLine;
	    $("#d"+hoverLine+"0").html($(this).text());
		$("#d"+hoverLine+"1").html(details[$(this).attr("id")]);
	},function(){
		if(!$(this).hasClass("selected")){
		    $("#d"+hoverLine+"0").html("");
			$("#d"+hoverLine+"1").html("");
		}
		hoverLine=0;
	});
	//click function
	$(".table").click(function(){
		if(selectedEles.length>0 && (!$(this).hasClass("available")) && (!$(this).hasClass("selected"))) return;
		$(this).toggleClass("selected");	//toggle selected class
		var rst = $(this).text();	//get text of this botton
		var id = $(this).attr('id');	//get id of this botton
		if(selectedEles.indexOf(id)>=0){		//if the element is in the array
			selectedEles.splice(selectedEles.indexOf(id),1);	//delete it
			detailLine--;
		} else {	//not in the array
			selectedEles.push(id);	//add it
			detailLine++;
		}
		//sort and reprint the detail info
		selectedEles.sort();
		var counter=0;
		$(".detail").html("");
		for(var i=0;selectedEles[i];i++){
			$("#d"+counter+"0").html(elementArray[selectedEles[i]]);
			$("#d"+counter+"1").html(details[selectedEles[i]]);
			counter++;
		}
		//show info under System:
		$(".chosenEles").text("");	//clean the chosenEles
		for(var i=0;i<selectedEles.length;i++){
			$(".chosenEles").append(elementArray[selectedEles[i]]+" ");	//append the chosen elements
		}
		//show info in the search bar
		if($("#"+id+".search-item").text()) {	//click the selected one
			$("#"+id+".search-item").remove();	//remove the item in the search bar
		} else {
			$(".search").html("");
			for(var i=0;i<selectedEles.length;i++){
				$(".search").append("<li class=\"element search-item\" id=\"" + selectedEles[i] + "\">" + elementArray[selectedEles[i]] + "</li>");	//create new item in search bar	
			}			
		}
		if(selectedEles.length>0){
			var eles = selectedEles.join('_');	//get the file name
			search(eles);
			$.ajax({	//retrieve the neural network data
				url: "getInfo.php",
				type: 'GET',
				data: {'input': eles},
				success: function(data){
					$(".conditions").html(data);	//return the div of the data
				}
			});
		}else{
			search("");
			$(".table").removeClass("available");	//no element chosen
		}
	});
	$(".clear_button").click(function(){
		$(".selected").removeClass("selected");	//remove all the selected class
		$(".table").removeClass("available");	
		$(".chosenEles").html('');	//clean the chosenEles class
		selectedEles = [];	//clean the selected Element
		$(".conditions").html('');	//clean the condition
		$(".search").empty();	//clean all the element
		$(".detail").html("");
		detailLine=0;
		search("");
	});
	$(".conditions").on("click", ":input", function(){
		var checked = this.checked;
		var id = $(this).attr('id');
		var selectedImgDiv =$("#img" + id);
		if(checked){
			var eles = selectedEles.join('_');
			var condText=$("#L" + id).text();
			$.ajax({
				url:"image.php",
				type: 'GET',
				data: {'condText':condText,'eles':eles},
				success: function (data) {
					selectedImgDiv.append(data);
					$(".imgs").css('padding','10px');
				}
			});
		} else {
			selectedImgDiv.html('');
		}
	});
	$(".conditions").on("click", "img", function(){
		if($(this).css("height") == "100px"){
			$(this).css("height", "100%");
			$(this).css("width", "100%");
		}else {
			$(this).css("height", "100px");
			$(this).css("width", "100px");
		}
	});
});		