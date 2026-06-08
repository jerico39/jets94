<style>
.next-game-card {
    max-width: 700px;
    margin: 1px auto;
    padding: 28px;
    border-radius: 20px;
    background: linear-gradient(135deg, #0c1b33 0%, #13294b 100%);
    color: #ffffff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.35);
    font-family: "Helvetica Neue", Arial, sans-serif;
    position: relative;
    overflow: hidden;
}

.next-game-card::before {
    content: "";
    position: absolute;
    top: -80px;
    right: -80px;
    width: 220px;
    height: 220px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
}

.next-game-card .ttl {
    margin-bottom: 25px;
    text-align: center;
}

.next-game-card .ttl h3 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
    line-height: 1.4;
    color: #6ec1ff;
    text-shadow: 0 0 12px rgba(110,193,255,0.4);
}

.next-game-card .week {
    display: inline-block;
    background: #17a2ff;
    color: #fff;
    font-weight: bold;
    padding: 6px 50px;
    border-radius: 999px;
    font-size: 20px;
    margin-bottom: 3px;
}

.next-game-card .matchup {
    font-size: 28px;
    font-weight: 900;
    margin: 10px 0;
    line-height: 1.4;
}

.next-game-card .kickoff {
    font-size: 18px;
    color: #cbd6e2;
    margin-bottom: 20px;
}

.next-game-card .probability {
    margin: 25px 0;
}

.next-game-card .probability-label {
    font-size: 20px;
    margin-bottom: 8px;
    color: #b4ed07;
}

.next-game-card .bar {
    width: 100%;
    height: 18px;
    background: rgba(255,255,255,0.15);
    border-radius: 999px;
    overflow: hidden;
}

.next-game-card .bar-inner {
    height: 100%;
    width: {$result['win_probability_pct']}%;
    background: linear-gradient(90deg, #00d4ff, #17ff8d);
    border-radius: 999px;
    font-weight: bold;
    text-align: right;
    padding-right: 10px;
    line-height: 18px;
    color: #00131f;
    font-size: 12px;
}

.next-game-card .advice {
    margin-top: 28px;
    padding: 18px;
    background: rgba(255,255,255,0.08);
    border-left: 4px solid #17a2ff;
    border-radius: 12px;
    line-height: 1.8;
    color: #e7eef7;
}

.next-game-card .advice-title {
    display: block;
    font-size: 13px;
    font-weight: bold;
    color: #6ec1ff;
    margin-bottom: 8px;
    letter-spacing: 1px;
}

.next-game-card hr {
    border: none;
    border-top: 1px solid rgba(255,255,255,0.1);
    margin-top: 30px;
}

.pickup-post {
    width: 100%;
    overflow: hidden;
}

.pickup-post a {
    display: block;
}

.pickup-post img {
    width: 100%;
    max-width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}
</style>
<?php
/*
Template Name:top_schedule
*/


// JSONファイルのパス（iniディレクトリ内）
$jsonFile = __DIR__ . '/../ini/nyj2026.json';

// JSON読み込み
$json = file_get_contents($jsonFile);

if ($json === false) {
    die('JSONファイルを読み込めませんでした。');
}

// 配列変換
$data = json_decode($json, true);

if (!is_array($data)) {
    die('JSONの解析に失敗しました。');
}

// 現在日時
$now = new DateTime();

$result = null;

foreach ($data as $item) {

    // BYE WEEK除外
    if (empty($item['date_time']) || $item['date_time'] === '-') {
        continue;
    }


	// date_time を DateTime化
	$gameDate = DateTime::createFromFormat(
		'Y-m-d H:i',
		$item['date_time']
	);

    if ($gameDate === false) {
        continue;
    }





    // 現在より未来の最初の1件
    if ($gameDate > $now) {

		// 日本語の曜日配列
		$weekDays = ['日', '月', '火', '水', '木', '金', '土'];

		// 曜日取得
		$weekDay = $weekDays[$gameDate->format('w')];

		// 表示用日時
		$formattedDate = $gameDate->format("Y年n月j日({$weekDay}) H:i");


        // 日時差分
        $diff = $now->diff($gameDate);

        // 総時間
        $totalHours = floor(
            ($gameDate->getTimestamp() - $now->getTimestamp()) / 3600
        );

        // カウントダウン
        $countdown = sprintf(
            '%d日 %d時間 %d分',
            $diff->days,
            $diff->h,
            $diff->i,
            $diff->s
        );

        $result = [
            'week' => $item['week'],
            'date_time' => $formattedDate,
            'matchup' => $item['matchup'],
            'win_probability_pct' => $item['win_probability_pct'],
            'advice' => $item['advice'],
            'days_left' => $diff->days,
            'hours_left' => $totalHours,
            'countdown' => $countdown,
        ];
		$week = "";
		if($result['week'] == 0){
			$week = "開幕戦";
		}else{
			$week = "WEEK" . $result['week'];
		}


		if($result['win_probability_pct'] == 0){
			$pct = "";
		}else{
			$pct = "ジェッツAI勝率 " . $result['win_probability_pct'] ."%";
		}

		if($result['advice'] == ""){

				//金言が無い(開幕前)は、プレビュー記事のサムネ(日替わりランダム)
				$advice = "";
				// 今日の日付を元に固定ランダム生成
				mt_srand(date('Ymd'));
				// 10〜99 の2桁ランダム
				$dailyRandom = mt_rand(1, 100);
				$args = array(
					'tag'            => 'プレビュー', // タグスラッグ
					'posts_per_page' => 1,
					'offset'         => $dailyRandom,
					'order' => 'DESC',
				);
				$query = new WP_Query($args);
				if ($query->have_posts()) :
					while ($query->have_posts()) :
						$query->the_post();
						$permalink = get_permalink();
						$thumbnail = has_post_thumbnail()
					? get_the_post_thumbnail(get_the_ID(), 'medium')
					: '';
					$advice = <<<HTML
							<div class="pickup-post">
								※開幕まで日替わりセクシー画像をお楽しみください
								<a href="{$permalink}">
								{$thumbnail}
								</a>
							</div>
						HTML;
					endwhile;
					wp_reset_postdata();
				endif;
		}else{

			$text = str_replace('。', "。<br/>", $result['advice']);
			$advice = "<div class='advice'>";
			$advice .= "AI 勝利への金言";
			$advice .= "<span class='advice-title'>";
			$advice .= $result['advice'];
			$advice .= "</span>";
			$advice .= "</div>";
		}

        break;
    }
}


// 表示
if ($result !== null) {
 echo <<<HTML

<div class="next-game-card">

    <div class="ttl">
        <h3>
            次の試合まで、あと<br>
			 {$result['countdown']}
        </h3>
    </div>

    <div class="week">
        {$week}
    </div>

    <div class="matchup">
        {$result['matchup']}
    </div>

    <div class="kickoff">
        🏈 キックオフ：{$result['date_time']}
    </div>

    <div class="probability">
        <div class="probability-label">
            {$pct}
        </div>

    </div>
        {$advice}

</div>

HTML;


} else {
echo <<<HTML
    <div class="next-game-card">
		{$advice}
	</div>
HTML;
}
?>


