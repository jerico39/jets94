

$(function(){
  if ($('div').hasClass('article-body')) {

//記事全体を取り出す
    var set_body = $('.article-body').html();

    if (!text.includes("<canvas")) { //Add-2025080-canvasタグを含む場合、描写が消されるので置換処理をしない
          set_body = emphasisCharacter('”', '”', set_body);
          set_body = emphasisCharacter('「', '」',set_body);
          //文字列を入れ替えた結果と置き換え
          $('.article-body').html(set_body);
    }


  }
});

function emphasisCharacter(set_a, set_b,set_body) {
  
    setreg = new RegExp("[" + set_a + set_b + "]"); //正規表現に変数を入れる
    //let separy = $('.article-body').text().split(setreg) //指定クラス内を「"」の間で区切り配列化
    //タグを抜いた置換対象検索用Body
    var set_body_tmp = set_body.replace(/<("[^"]*"|'[^']*'|[^'">])*>/g, '');
    let separy = set_body_tmp.split(setreg) //指定クラス内を「"」の間で区切り配列化
    separy_rs = [];
    cnt = 0;
    for (let i = 0; i < separy.length; i++) {
      if (i % 2 == 1) { //0開始で奇数が"" 内の文字列となる
      separy_rs[cnt] = separy[i]; //必要な部分のみ配列を取り出す
      cnt++;
      }
    }
      separy_rs = $.unique(separy_rs);//配列の重複削除
      setclass = "u-name-color u-font-bold"
    for (var i = 0, len = separy_rs.length; i < len; i++) {
      set_body= set_body.split(set_a + separy_rs[i] + set_b).join("<span class='" + setclass + "'>" + set_a + separy_rs[i] + set_b + "</span>");//replaceより全部一致に対応し高速
      }

    return set_body;

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