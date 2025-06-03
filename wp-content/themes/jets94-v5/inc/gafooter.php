<div id='132522-6'></div>
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
    
    //Money box(追尾)
    var moneyScript = document.createElement('script');
    moneyScript.src = '//ads.themoneytizer.com/s/gen.js?type=6';
    moneyScript.async = true; 
    var moneyScript2 = document.createElement('script');
    moneyScript2.src = '//ads.themoneytizer.com/s/requestform.js?siteId=132522&formatId=6';
    moneyScript2.async = true; 


    // head 要素に追加
    var head = document.head || document.getElementsByTagName('head')[0];
    head.appendChild(newScript);

    //ID=mbox-6 へ追加
    var mobx6_element = document.getElementById('132522-6')
    mobx6_element.appendChild(moneyScript);
    mobx6_element.appendChild(moneyScript2);

    scriptAdded = true;
  }
});
</script>


