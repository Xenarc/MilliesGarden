var windowHeight = -1;
var SelectedPlantType = -1;
//  1 = Indoor
//  2 = Macrame
//  3 = Outdoor

var PlantTypeHeightVH = 75;
var AnimationTime = 300;
var Mobile = false;
var galleryButton = false;
var galleryBanner = false;

$(function()
{
  UpdateSelectedPlantType();
  var windowHeight = $(window).height();
  
  $(".galleryImage").error(function(){
    $(this).hide();
  });
  $(".overlay").animate({opacity: 0.0}, 750, function(){
    $(".overlay").css("visibility", "hidden");
  });
  if(!galleryButton){
    $(".gallery").hide();
    $(".top article").css("margin-top", "7%");
  }
  if(!galleryBanner){
    $(".gallerySect > h1").hide();
  }
  
  Resize();
  Mobile = $(window).width() <= 800;
  $("#HeadingIndoor").click(function(){
    SelectedPlantType = 1;
    UpdateSelectedPlantType();
  });
  
  $("#HeadingMacrame").click(function(){
    SelectedPlantType = 2;
    UpdateSelectedPlantType();
  });
  
  $("#HeadingOutdoor").click(function(){
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
  
  $(document).scroll(function()
  {
    
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
  });
  $(window).on('resize', function(){
    Resize();
  });
});

function Resize(){
  Mobile = $(window).width() <= 800;
  var cols = Math.floor($(window).width()*0.004);
  cols = cols > 5 ? 5 : cols;
  const rows = {
    1:2,
    2:2,
    3:3,
    4:3,
    5:4
  }
  
  $(".galleryImage").css("width",(1/cols)*100+"%");
  $(".galleryImage").css("height",PlantTypeHeightVH/rows[cols]+"vh");
}

function UpdateSelectedPlantType(){
  switch (SelectedPlantType) {
    case 0:
      break;
      
    case 1:
      $("#indoorPlants").css("height", PlantTypeHeightVH + "vh");
      scrollToPlants();
      $("#slider").animate({"margin-left": "0"}, 550, function(){});
      SelectHeading();
      break;
      
    case 2:
      $("#Macrame").css("height", PlantTypeHeightVH + "vh");
      scrollToPlants();
      // $("#slider").animate({"margin-left": "-100vw"}, 550, function(){});
      $("#slider").animate({"margin-left": "-100vw"}, 550, function(){});
      SelectHeading();
      break;
      
    case 3:
      $("#outdoorPlants").css("height", PlantTypeHeightVH + "vh");
      scrollToPlants();
      // $("#slider").animate({"margin-left": "-200vw"}, 550, function(){});
      $("#slider").animate({"margin-left": "-200vw"}, 550, function(){});
      SelectHeading();
      break;
        
    default:
      SelectedPlantType = 0;
      UpdateSelectedPlantType();
      break;
  }
}
function SelectHeading(){
  $("#HeadingIndoor").css("opacity", SelectedPlantType == 1 ? "1" : "0.8");
  $("#HeadingMacrame").css("opacity", SelectedPlantType == 2 ? "1" : "0.8");
  $("#HeadingOutdoor").css("opacity", SelectedPlantType == 3 ? "1" : "0.8");
  $("#HeadingIndoor").css("color", SelectedPlantType == 1 ? "#000000" : "#222222");
  $("#HeadingMacrame").css("color", SelectedPlantType == 2 ? "#000000" : "#222222");
  $("#HeadingOutdoor").css("color", SelectedPlantType == 3 ? "#000000" : "#222222");
}

function scrollToPlants(){
  return; // FIXME
  $('html, body').animate({
    scrollTop: $("#slider").offset().top - 75 
  }, AnimationTime);
  // if (!Mobile) {
  //   $('html, body').animate({
  //     scrollTop: $(".gallerySect").offset().top + $(".plants").height() - windowHeight*0.08
  //   }, AnimationTime);
  // }else{
  //   $('html, body').animate({
  //     scrollTop: $(".gallerySect").offset().top + $(".plants").height() - windowHeight*0.08
  //   }, AnimationTime);
  // }
}

function scale(x, startFade, stopFade)
{
  percent = (x-startFade)/(stopFade-startFade);
  outputX = percent;
  return percent;
}