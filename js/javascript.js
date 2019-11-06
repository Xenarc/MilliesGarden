var windowHeight = -1;
var SelectedPlantType = -1;
var PlantTypeHeightVH = 90;
var AnimationTime = 300;
var Mobile = false;

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
  
  Resize();
  Mobile = $(window).width() <= 800;
  
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
  var cols = Math.floor($(window).width()*0.0035);
  cols = cols > 5 ? 5 : cols;
  
  $(".galleryImage").css("width",(1/cols)*100+"%");
  $(".galleryImage").css("height",PlantTypeHeightVH/(cols)+"vh");
}

function UpdateSelectedPlantType(){
  switch (SelectedPlantType) {
    case 0:
      setAllPlantsToZeroHeight();
      break;
      
    case 1:
      setAllPlantsToZeroHeight();
      $("#indoorPlants").css("height", PlantTypeHeightVH + "vh");
      scrollToPlants();
      
      break;
      
    case 2:
      setAllPlantsToZeroHeight();
      $("#illuminatedPlants").css("height", PlantTypeHeightVH + "vh");
      scrollToPlants();
      
      break;
      
    case 3:
      setAllPlantsToZeroHeight();
      $("#outdoorPlants").css("height", PlantTypeHeightVH + "vh");
      scrollToPlants();
      
      break;
      
    default:
      SelectedPlantType = 0;
      UpdateSelectedPlantType();
      
      break;
  }
}
function scrollToPlants(){
  if (!Mobile) {
    $('html, body').animate({
      scrollTop: $(".gallerySect").offset().top + $(".gallerySect").height() - windowHeight*0.08
    }, AnimationTime);
  }else{
    $('html, body').animate({
      scrollTop: $(".gallerySect").offset().top + $(".gallerySect").height() - windowHeight
    }, AnimationTime);
  }
}

function setAllPlantsToZeroHeight(){
  $("#indoorPlants").css("height", 0);
  $("#illuminatedPlants").css("height", 0);
  $("#outdoorPlants").css("height", 0);
}

function scale(x, startFade, stopFade)
{
  percent = (x-startFade)/(stopFade-startFade);
  outputX = percent;
  return percent;
}