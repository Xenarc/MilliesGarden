var windowHeight = -1;
var SelectedPlantType = -1;
//  1 = Indoor
//  2 = Macrame
//  3 = Outdoor

var AnimationTime = 300;
var plantDetailsFadeTime = 150;
var Mobile = false;
var tabs = false
var plantDescs = false

$(function()
{
	$.ajaxSetup({ cache: false });
	
	updateOrderPlants();
	UpdateSelectedPlantType();
	var windowHeight = $(window).height();
	
	$(".galleryImage").error(function(){
		$(this).hide();
	});
	
	$(".overlay").animate({opacity: 0.0}, 750, function(){
		$(".overlay").css("visibility", "hidden");
	});
	
	Mobile = $(window).width() <= 800;
	Resize();
	
																															// TODO: REMOVE ME
	// isDetailedViewing = true;
	
	// $.ajax({
	// 	type: 'POST',
	// 	url: 'getProductDetails.php',
	// 	data: {
	// 		"id": 2
	// 	},
	// 	success: function (response) {
	// 		showPlantDetails();
	// 		$('.plantDetails').html(response);
	// 		buyButtonClicked();
	// 	}
	// });
	
																															// TODO: REMOVE ME END
		
		$(document).click(function (e) {
		if ($(e.target).closest(".plantDetails").length != 0) return false;
		if ($(".plantDetails").is(':visible'))
			hidePlantDetails();
	});
	
	$("#IndoorTab").click(function(){
		SelectedPlantType = 1;
		UpdateSelectedPlantType();
	});
	
	$("#SpecialsTab").click(function(){ // TODO: make this cleaner VVV
		SelectedPlantType = 2;
		UpdateSelectedPlantType();
	});
	
	$("#OutdoorTab").click(function(){
		SelectedPlantType = 3;
		UpdateSelectedPlantType();
	});
	
	$("#triSect1").click(function() {
		SelectedPlantType = 1;
		UpdateSelectedPlantType();
	});
	
	$("#triSect2").click(function() {
		SelectedPlantType = 2;
		UpdateSelectedPlantType();
	});
	
	$("#triSect3").click(function() {
		SelectedPlantType = 3;
		UpdateSelectedPlantType();
	});
	
	$("#plantSizeLarge").click(function(){
		$("#plantSizeLarge").toggleClass("orderPlantSizeSelected");
		updateOrderPlants();
	});
	
	$("#plantSizeMedium").click(function(){
		$("#plantSizeMedium").toggleClass("orderPlantSizeSelected");
		updateOrderPlants();
	});
	
	$("#plantSizeSmall").click(function(){
		$("#plantSizeSmall").toggleClass("orderPlantSizeSelected");
		updateOrderPlants();
	});
	
	$(".completeCheckout").click(function(){
		console.log($(".purchasePlantPreview .buyButton").attr("potId"));
		
		$(".potIdField").attr("value", $(".purchasePlantPreview .buyButton").attr("potId"));
	});
	
	$(document.body).on("click", ".orderGalleryImage", function (event) {
		// console.log("You clicked on: ", event.target.get(0).id);
		isDetailedViewing = true;
		var id = $(this).attr('id');
		id = id.substr(5);
		
		$.ajax({
			type: 'POST',
			url: 'getProductDetails.php',
			data: {
				"id": id
			},
			success: function (response) {
				showPlantDetails();
				$('.plantDetails').html(response);
			}
		});
	});
	
	$(document).scroll(function()
	{
		// Nav Bar stuff
		windowHeight = $(window).height();
		var scrollHeight = $(document).scrollTop();
		var startFade = windowHeight*0.275;
		var stopFade = windowHeight*1;
		
		if(scrollHeight > startFade && scrollHeight < stopFade){
			$("header").css("visibility", "visible");
			$("header").css("opacity", scale(scrollHeight, startFade, stopFade));
			
		}else if(scrollHeight > stopFade){  // not in fade zone but should be visible
			$("header").css("visibility", "visible");
		
		}else{  // Not in fade but up at the top, thus, invisible
			$("header").css("visibility", "hidden");
		}
		// End Nav Bar stuff
	});
	$(window).on('resize', function(){
		Resize();
	});
});

function validateCheckoutform(){
	var x = document.forms["checkoutForm"]["name"].value;
	if (x.split(' ').length != 2) { // check split name
		alert("Your first and last name must be filled out");
		return false;
	}
}

function hidePlantDetails() {
	$(".plantDetails").fadeOut(plantDetailsFadeTime, "linear", function () { });
	$(".plantDetailsOverlay").fadeOut(plantDetailsFadeTime, "linear", function () { });
}

function showPlantDetails() {
	$(".plantDetails").fadeIn(plantDetailsFadeTime, "linear", function () { });
	$(".plantDetailsOverlay").fadeIn(plantDetailsFadeTime, "linear", function () { });
}

function buyButtonClicked(){
	console.log($("#buyButton").attr("potId"));
	hidePlantDetails();
	$(window).scrollTop($(".checkout").offset().top - 50);
	$(".purchasePlantPreview").html($(".plantDetails").html());
}

function updateOrderPlants(){
	// AJAX used to refresh all of the plants in the db
	
	$.ajax({
		type: 'POST',
		url: 'orderGallery.php',
		data: { small : $("#plantSizeSmall").hasClass("orderPlantSizeSelected") == true ? 1 : 0,
						medium : $("#plantSizeMedium").hasClass("orderPlantSizeSelected") == true ? 1 : 0, 
						large : $("#plantSizeLarge").hasClass("orderPlantSizeSelected") == true ? 1 : 0
					},
		success: function(response) {
				$('.orderGrid').html(response);
				Resize();
		}
	});
}

function formatPhone() {
	var i = 0;
	// $("#phoneField input").val(("#### ### ###").replace(/#/g, _ => $("#phoneField input").val()[i++]));
	$("#phoneField input").val($("#phoneField input").val().replace(/(\d{4})(\d{3})(\d{3})/, '$1 $2 $3'));
}

function Resize(){
	Mobile = $(window).width() <= 800;
	PlantTypeHeightVH = $(window).width() <= 690 ? 110 : 75;
	
	$("#slider").height = $(window).height() * PlantTypeHeightVH / 100.0;
	
	var cols = Math.floor($(window).width()*0.004);
	cols = cols > 5 ? 5 : cols;
	const rows = {1:3,
								2:2,
								3:3,
								4:3,
								5:3}
	

	$(".galleryImage").css("width", (100 / cols) + "%");
	$(".galleryImage").css("height", 100 / rows[cols] + "%");
	
	$(".orderGalleryImage").css("width", (100 / cols) + "%");
	$(".orderGalleryImage").css("height", 100 / rows[cols] + "%");
	
	$("#SpecialsTab").css("margin-top", -$("#IndoorTab").height() + "px");
	$("#OutdoorTab").css("margin-top", -$("#IndoorTab").height() + "px");
}

function UpdateSelectedPlantType(){
	Resize();
	if (Mobile) return;
	switch (SelectedPlantType) {
		case 0:
			break;
			
		case 1:
			$("#indoorPlants").css("height", PlantTypeHeightVH + "vh");
			$("#slider").animate({"margin-left": "0"}, 550, function(){});
			break;
			
		case 2:
			$("#Specials").css("height", PlantTypeHeightVH + "vh");
			$("#slider").animate({"margin-left": -1*$("#sliderContainer").width()+"px"}, 550, function(){});
			break;
			
		case 3:
			$("#outdoorPlants").css("height", PlantTypeHeightVH + "vh");
			$("#slider").animate({"margin-left": -2*$("#sliderContainer").width()+"px"}, 550, function(){});
			break;
				
		default:
			SelectedPlantType = 0;
			UpdateSelectedPlantType();
			break;
	}
}

function scale(x, startFade, stopFade)
{
	percent = (x-startFade)/(stopFade-startFade);
	outputX = percent;
	return percent;
}
