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
	// 
}
else {
	$paras = explode("\n", $result['content']);
	$result['content'] = '<div class="article">' . implode(array_map(function ($str) {
		return "<p>{$str}</p>";
	}, $paras)) . '</div>';
}

include template('network:show');