<?

if(!defined('IN_DISCUZ')) exit('Access Denied');

$cartoons = DB::fetch_all("SELECT * FROM `cdb_network` WHERE `groupname` = '动漫'");
$photos = DB::fetch_all("SELECT * FROM `cdb_network` WHERE `groupname` = '摄影'");
$movies = DB::fetch_all("SELECT * FROM `cdb_network` WHERE `groupname` = '微电影'");
// $businesses = DB::fetch_all("SELECT * FROM `cdb_network` WHERE `groupname` = '创新创业'");
$business = [];
$articles = DB::fetch_all("SELECT * FROM `cdb_network` WHERE `groupname` = '网文'");

include template('network:network');