
var front_page = function(root_pass){

      new ReadTopText(root_pass);

  
  }

    function ReadTopText(root_pass) {
    var insert;
    /*ランダム関数でCSVのキャッシュバスター*/
    var min = 1;
    var max = 10;
    var runsu = Math.floor(Math.random() * (max + 1 - min)) + min;

    jQuery.ajax({

      //url: root_pass + '/csv/top_text.csv?s=' + runsu,
      url: root_pass + '/csv/top_text.csv?s=' + runsu,
      success: function(data) {
        var data_array = data.split(/\r\n|\r|\n/); // 改行コードで分割

        insert = '<dl>';
        for (var i = 0; i < data_array.length; i++) {
          insert += '<dl>';
          rec = data_array[i].split(",");
          if (typeof rec[0] !== "undefined") {
            insert += '<dt>' + rec[0] + '</dt>';

            var ddvar = "";
            if (typeof rec[1] !== "undefined") {
              ddvar = rec[1];
              insert += '<dd>' + ddvar + '</dd>';
            }
          };
          insert += '</dl>'
        }
        // jQuery('.top_text').html(data);
        insert += '</dl>'
        jQuery('.top_text_inc').html(insert);
      }
    });
  }
  //ReadTopText

  
//TOPスライダー(サムネ付き)
$(function() {
  $('.slider_thumb').slick({
      arrows:false,
      asNavFor:'.thumb',
      infinite: false
  });
  $('.thumb').slick({
      asNavFor:'.slider_thumb',
      focusOnSelect: true,
      slidesToShow:5,
      autoplay: false,
      arrows: false,
      focusOnSelect: true,
  });  
});
//end TOPスライダー

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

