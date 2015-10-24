<?

if (!defined('IN_DISCUZ')) exit('Access Denied');
if (!isset($_GET['nid'])) exit('Undefined ID');

$result = DB::fetch_first("SELECT * FROM `cdb_network` WHERE `nid` = {$_GET['nid']}");

include template('network:show');