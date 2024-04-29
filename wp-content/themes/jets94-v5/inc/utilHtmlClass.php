<?
class utilHtmlClass {

    private $category_name; 
    private $getval; 
    private $category_label; 
    private $category_key; 
    private $selectList; 
    private $teamTaglist;
    private $raundTaglist;
    private $set_tag;
    private $set_category;
    private $set_search;
    private $queries;

    private $my_private_property; // privateプロパティ
  
    protected $my_protected_property; // protectedプロパティ

    // getメソッド
    public function get_my_property() {
        return $this->my_private_property;
    }


    public function get_selectList() {
        return $this->selectList;
    }

    public function get_queries(){
        return $this->queries;
    }


    // setメソッド
    public function set_category_name($label,$name,$key) {
        $this->category_label = $label;
        $this->category_name = $name;
        $this->category_key = $key;
        
        
    }

    // setメソッド
       public function set_querys($value) {
        $this->queries = $value;
    }

  


      // setメソッド
     

    // コンストラクター
    public function __construct() {
        // クラスがインスタンス化されたときに実行される処理
        $this->category_name = '';
        $this->getval = $_GET;

        $this->teamTaglist = [
            '49ers',
            'イーグルス',
            'カーディナルズ',
            'カウボーイズ',
            'コルツ',
            'シーホークス',
            'ジェッツ',
            'ジャイアンツ',
            'ジャガーズ',
            'スティーラーズ',
            'セインツ',
            'タイタンズ',
            'チーフス',
            'チャージャーズ',
            'テキサンズ',
            'ドルフィンズ',
            'バイキングス',
            'パッカーズ',
            'バッカニアーズ',
            'パンサーズ',
            'ビルズ',
            'ファルコンズ',
            'ブラウンズ',
            'ブロンコス',
            'ベアーズ',
            'ペイトリオッツ',
            'ベンガルズ',
            'ライオンズ',
            'ラムズ',
            'レイダーズ',
            'レイブンズ',
            'ワシントン',
            ];

            $this->raundTaglist = [
                'スーパーボウル',
                'プレーオフ',
                'そうだったのか！',
                'NFLスーパースター列伝',
                'がっかり・オブ・ザ・イヤー',
                '映画',
                'JETS狂',
                ];

    }
/**
* 複数カテゴリ、タグ検索のパラメタを検索用カテゴリ($query_string)へ変換
*  
* @param array $key selectedを付与する対象の変数名(catなど)
* 
*/
    public function get_query_union($query_string,$setname,$ary_name) {
        parse_str($query_string, $ary);

        if(empty($ary[$setname])){
            $var = '';
            foreach($ary_name as $name){
                if(!empty($this->getval[$name])){ //$GETから取得

                    if($setname == "tag"){
                        if(!empty($var))$var .= "+";
                        $var .= $this->getval[$name];
                    }else{
                        $var  = $this->getval[$name];
                    }
                }
            }
            
            $query_string .= "&".$setname ."=". $var;
        }
        return $query_string ;
    }

/**
* 検索用SELECT BOXの作成
*  
* @param array $key selectedを付与する対象の変数名(catなど)
* 
*/
    public function selectListCategory() {

     
        $category = get_term_by('name', $this->category_label, 'category'); // カテゴリ名からカテゴリオブジェクトを取得

        $var = '';
        $var .= "<select class='select_list' name='".$this->category_name."'>"; 
    
        $category_id = $category->term_id; // カテゴリのIDを取得
        $catetory_slug = $category->slug;

      
        $selected = $this->get_selected($category_id,$this->queries[$this->category_key]);

        $child_categories = get_categories(array('parent' => $category_id,'order'=>'DESC') ); // 子カテゴリを取得
        $var .= "<option value=''></option>";
        $var .= "<option value=" .$category_id." ". $selected .">" . $this->category_label ."</option>";
    
        if ($child_categories) { // 子カテゴリが存在する場合
            foreach ($child_categories as $child_category) {
                $selected = $this->get_selected($child_category->term_id ,$this->queries[$this->category_key]);
                $var .= "<option value=".$child_category->term_id ." ". $selected .">".$child_category->name ."</option>";
            }
        }
        $var .= "</select>"; 
        
        $this->selectList = $var;

    }

    //チームタグのセレクトボックス
    public function selectListTeamtag($name,$tag) {

        $var = $this->selectList($name,$tag,$this->teamTaglist);
        return $var;

    }

    //ラウンドタグのセレクトボックス
    public function selectListRaundtag($name,$tag) {

        $var = $this->selectList($name,$tag,$this->raundTaglist);

        return $var;

    }

    // 
    public function selectList($name,$tag,$list) {

        $set_selected = "";
        $var = '';
        $var .= "<select class='select_list' name='".$name."'>"; 
        $var .= "<option value='' ></option>";

        foreach ($list as $item) {
            $selected = $this->get_selected($item,$this->queries[$tag]);
            $var .= "<option value='".$item."' ".$selected." >". $item ."</option>";
        }
        
        $var .= "</select>"; 

    return $var;

    }

    private function get_selected($slag,$var){
        
        $selected = '';
        $sep = " "; //初期は半角セパレート
        if (false !== strpos($var, '+')) {
            $sep = "+";
        }

        $array_val = explode($sep , $var);
        foreach ($array_val as $key => $value) {
            if($slag == $value) $selected = 'selected';
        }
        return $selected ;
    }


}
?>