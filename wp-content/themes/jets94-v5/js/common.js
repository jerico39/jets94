

//FB
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.3&appId=117140211779461";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


$(function () {
  
    //ハンバーガーメニュー
    const ham = $('#js-hamburger');
    const nav = $('#js-nav');

    ham.on('click', function () { //ハンバーガーメニューをクリックしたら
        ham.toggleClass('active'); // ハンバーガーメニューにactiveクラスを付け外し
        nav.toggleClass('active'); // ナビゲーションメニューにactiveクラスを付け外し
    });
  
      $(".linkon").on("click", function() {
        ham.toggleClass('active'); // ハンバーガーメニューにactiveクラスを付け外し
        nav.toggleClass('active'); // ナビゲーションメニューにactiveクラスを付け外し
      })
    // end ハンバーガーメニュー    
  
      //header アコーディオン(スマホのみ)
      setAccordion();
      if (window.matchMedia('(max-width:1080px)').matches) {
        //SP初期は速報リンクのオープン
        $('.def').next('nav.gnavi ul.small-list').slideToggle();
        $('.def').toggleClass("open");
        $('nav.gnavi ul.accordion>li.def').addClass("open");
      }
  
    //画像の遅延loadheaderのlazyload.min.js
    $("img.lazyload").lazyload();
});


  //$(window).on("load orientationchange resize",function(){
  
  $(window).on("orientationchange",function(){ //画面回転とリサイズで再ロード
      location.reload(); 
  });


  function setAccordion(){
    //1080px以下の処理
      if (window.matchMedia('(max-width:1080px)').matches) {
        $('nav.gnavi ul.accordion>li').click(function(){
          $(this).next('nav.gnavi ul.small-list').slideToggle();
          $(this).toggleClass("open");
          $('nav.gnavi ul.accordion>li').not($(this)).next('nav.gnavi .small-list').slideUp();
          $('nav.gnavi ul.accordion>li').not($(this)).removeClass("open");
        });
      }
      //end 1080px以下の処理
    }
  // end header アコーディオン
 


//ロード
window.onload = function() {
//読み込みが終わったらローディング非表示
  //const spinner = document.getElementById('loading');
  //spinner.classList.add('loaded');
}





