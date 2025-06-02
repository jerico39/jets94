<!-- GA4 Speed-->
<script>
// 一度だけ実行されるようにフラグを設定
var scriptAdded = false;

window.addEventListener('scroll', function() {
  // スクロールが検知されたら実行
  if (!scriptAdded) {
    // 新しい script 要素を作成
    //Ga4
    var newScript = document.createElement('script');
    newScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-WTD4FT34VV';
    newScript.async = true;
    
    //Adsense
    var newScriptad = document.createElement('script');
    newScriptad.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1827178535199750';
    newScriptad.async = true;
    

    // head 要素に追加
    var head = document.head || document.getElementsByTagName('head')[0];
    head.appendChild(newScript);
    head.appendChild(newScriptad);
    // スクリプトが追加されたことを記録
    scriptAdded = true;
  }
});
</script>


