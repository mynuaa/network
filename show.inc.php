<?

if (!defined('IN_DISCUZ')) exit('Access Denied');
if (!isset($_GET['nid'])) exit('Undefined ID');

$result = DB::fetch_first("SELECT * FROM `cdb_network` WHERE `nid` = {$_GET['nid']}");
DB::query("UPDATE `cdb_network` SET `pageview` = " . ($result['pageview'] + 1) . " WHERE `nid` = {$_GET['nid']}");
$result['pageview'] += 1;

include template('network:show');