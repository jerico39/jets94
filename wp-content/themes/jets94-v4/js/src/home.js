/*
home のみに必要のJSのキック4
*/

/* Commonオブジェクト生成コンストラクタ */
var home = function(root_pass){
//jQuery(function() {

    new ReadTopText(root_pass);
    //new matchHeight( jQuery('.js-fixheight_01') );
    new matchHeight('.js-height_01');
    new matchHeight('.js-height_02');
    new matchHeight('.js-height_03');
    new matchHeight('.js-height_04');
    new matchHeight('.js-height_05');


  /*
  new TodoFormView( jQuery('.js-fixheight_01') );
  new TodoListView( $('.todoList') );
*/
  /*
  $('.usualList li').click(function() {
    Todo.add($(this).text());
  });

  $('.completeAll').click(function() {
    Todo.setCompleteAll();
  });
  */

}
