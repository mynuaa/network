<?

if (!defined('IN_DISCUZ')) exit('Access Denied');
if (!isset($_GET['nid'])) exit('Undefined ID');

$result = DB::fetch_first("SELECT * FROM `cdb_network` WHERE `nid` = {$_GET['nid']}");
DB::query("UPDATE `cdb_network` SET `pageview` = " . ($result['pageview'] + 1) . " WHERE `nid` = {$_GET['nid']}");
$result['pageview'] += 1;

if (preg_match('/^photos\|(\d+)$/', $result['content'], $matches)) {
	$count = intval($matches[1]);
	$ts = '';
	for ($i = 1; $i <= $count; $i++)
		$ts .= "<p><img src=\"source/plugin/network/resources/{$result['groupname']}/{$result['title']}/{$i}.jpg\"></p>";
	$result['content'] = $ts;
}
else if (preg_match('/^video$/', $result['content'], $matches)) {
	$ts = <<<EOF
<video src="source/plugin/network/resources/{$result['groupname']}/{$result['title']}.mp4" width="100%" controls autoplay>
<div>你的浏览器不支持&lt;video&gt;标签，请点<a href="source/plugin/network/resources/{$result['groupname']}/{$result['title']}.mp4">这里</a>下载观看。</div>
</video>
EOF;
	$result['content'] = $ts;
}
else {
	$paras = explode("\n", $result['content']);
	$result['content'] = '<div class="article">' . implode(array_map(function ($str) {
		return "<p>{$str}</p>";
	}, $paras)) . '</div>';
}

include template('network:show');