
<!--footer-->
<footer>
  <p class="copyCOPYRIGHT">© 2022 JETS94, LTD.</p>
</footer>
<!--▼Twitterの埋め込み用JSを遅延読み込み→画面表示UP-->
<script>
(function(window, document) {
function main1() {
// TwitterのJS読み込み
var ad = document.createElement('script');
ad.type = 'text/javascript';
ad.async = true;
ad.src = 'https://platform.twitter.com/widgets.js';
var sc = document.getElementsByTagName('script')[0];
sc.parentNode.insertBefore(ad, sc);
}
// 遅延読み込み
var lazyLoad = false;
function onLazyLoad() {
if (lazyLoad === false) {
// 複数呼び出し回避 + イベント解除
lazyLoad = true;
window.removeEventListener('scroll', onLazyLoad);
window.removeEventListener('mousemove', onLazyLoad);
window.removeEventListener('mousedown', onLazyLoad);
window.removeEventListener('touchstart', onLazyLoad);
window.removeEventListener('keydown', onLazyLoad);
main1(); // TwitterのJS読み込み
}
}
window.addEventListener('scroll', onLazyLoad);
window.addEventListener('mousemove', onLazyLoad);
window.addEventListener('mousedown', onLazyLoad);
window.addEventListener('touchstart', onLazyLoad);
window.addEventListener('keydown', onLazyLoad);
window.addEventListener('load', function() {
// ドキュメント途中（更新時 or ページ内リンク）
if (window.pageYOffset) {
onLazyLoad();
}
});
})(window, document);
</script>
<!--▲Twitter.jsの遅延読み込み-->

<!--▼Moneybox-->
<div id="132522-6"><script src="//ads.themoneytizer.com/s/gen.js?type=6" defer></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=132522&formatId=6" defer ></script></div>
<!--▲Moneybox-->

<!--end footer-->
</body> 
</html>