jQuery('.js-navbar').on('click', function () {
  jQuery("body").toggleClass("nav-is-open");
  jQuery('.js-navbar').toggleClass("activeNav rotateLeft rotateRight");
});

/*ナビのページ内リンク用(js-navbarを使用すると文字が反転するため)*/
jQuery('.js-navopen').on('click', function () {
  jQuery("body").toggleClass("nav-is-open");
  jQuery('.js-navbar').toggleClass("activeNav rotateLeft rotateRight");
});
