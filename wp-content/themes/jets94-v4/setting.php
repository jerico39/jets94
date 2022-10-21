<?php
// 日本のニュースRSSID
//$G_RSS_NEWS_JP='23950,23951,23952,23956';

class setting
{
    private $G_RSS_NEWS_JP;
    private $G_RSS_BLOG;
    private $G_RSS_NEWS_US;
    private $G_JP;
    private $G_RSS_WWE_BLOG;
    private $G_RSS_WWE_US;
    
    //コンストラクタ
    //public function settting() //PHP7からクラス名と同盟のコンストラクタが使用不可となった
    public function __construct()
    {
        $this->G_RSS_NEWS_JP='23951,23952,23956,1345219';
        // 応援ブログRSSID
        $this->G_RSS_BLOG='1391584,1369155,1368749,1368738,1253586,344519,407020,344520,344519,344517,344417,230054,214224,23953 ,23954 ,23957 ,23958,23960,23961,23974 ,23973 ,23972 ,23971 ,23969,23967 ,22958,23966,23965,23964,23963,23962,23968,23970,23974,27730,27731,27732,27734,33710,36421,45344,45993,46476,91390,105488,105489,105490,127455,140018,140019,140020,144087,144108,144119';
        // 海外のニュースRSSID
        $this->G_RSS_NEWS_US='23244,23977,23978';
        // WWEメイン
        $this->G_RSS_WWE_JP='1490494,1490495';
        // WWEブログ
        $this->G_RSS_WWE_BLOG='1490554,1490555,1490496';
        // WWE海外
        $this->G_RSS_WWE_US='1490497,1492993';
    }

    public function getRssId_news_jp()
    {
        return $this->G_RSS_NEWS_JP;
    }
    public function getRssId_blog()
    {
        return $this->G_RSS_BLOG;
    }
    public function getRssId_news_us()
    {
        return $this->G_RSS_NEWS_US;
    }

    public function getRssId_wwe_jp()
    {
        return $this->G_RSS_WWE_JP;
    }

    public function getRssId_wwe_blog()
    {
        return $this->G_RSS_WWE_BLOG;
    }

    public function getRssId_wwe_us()
    {
        return $this->G_RSS_WWE_US;
    }
}
