(function() {

    //高さをそろえる(要jQuery-matchHeight.js)
    function matchHeight($el) {

      if (window.matchMedia('screen and (min-width:768px)').matches) {
        //768px以上
        jQuery($el).matchHeight();

      }
    }


    function pageTop() {
      var topBtn = $('#js-pagetop');
      topBtn.hide();
      //スクロールが600に達したらボタン表示
      $(window).scroll(function() {
        if ($(this).scrollTop() > 600) {
          topBtn.fadeIn();
        } else {
          topBtn.fadeOut();
        }
      });
      //スクロールしてトップ
      topBtn.click(function() {
        $('body,html').animate({
          scrollTop: 0
        }, 500);
        return false;
      });
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




  /*
  this.$el = $el;
  this.$input = this.$el.find('input[type="text"]');
  this.$el.submit(this.onsubmit.bind(this));
  */

  // サブミット時のイベントハンドラ
  /*
  TodoFormView.prototype.onsubmit = function(e) {
    e.preventDefault();

    Todo.add(this.$input.val());
  };
  */

  //外部に公開
  window.matchHeight = matchHeight; window.pageTop = pageTop; window.ReadTopText = ReadTopText;

})();
