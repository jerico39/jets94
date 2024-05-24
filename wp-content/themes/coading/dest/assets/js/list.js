
var front_page = function(root_pass){

     

  
  }

  

//Ranking Slider
$(function(){
$('.top10').slick({
  slidesToShow: 8,
   slidesToScroll: 1,
   infinite: false,
   arrows: true,
   prevArrow:'<i class="prev fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i>',
   nextArrow:'<i class="next fa fa-chevron-circle-right fa-2x" aria-hidden="true"></i>',
   responsive: [{
    breakpoint: 1080,  //ブレイクポイントを指定
    settings: {
    slidesToShow: 3
     }
   }]
});
$('.lineup-carousel').not('.slick-initialized').slick({ //.not('.slick-initialized') はエラー対策
  slidesToShow: 5,
   slidesToScroll: 1,
   infinite: false,
   arrows: true,
   prevArrow:'<i class="prev fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i>',
   nextArrow:'<i class="next fa fa-chevron-circle-right fa-2x" aria-hidden="true"></i>',
   responsive: [{
     breakpoint: 1080,  //ブレイクポイントを指定
     settings: {
       slidesToShow: 3,
       arrows: true,
     }
   }]
});

});
//emd Ranking Slider

