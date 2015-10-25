<?

if(!defined('IN_DISCUZ')) exit('Access Denied');

if (!isset($_GET['nid'])) exit('Wrong ID');
$like = DB::result_first("SELECT `like` FROM `cdb_network` WHERE `nid` = {$_GET['nid']}");
$like = intval($like) + 1;
DB::query("UPDATE `cdb_network` SET `like` = {$like} WHERE `nid` = {$_GET['nid']}");
exit();