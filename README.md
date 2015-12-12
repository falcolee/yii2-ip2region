# yii2-ip2region
ip2region extension for yii2

Help you to retrieve Chinese geolocation information in 0.0x ms

 *This extenestion provides two search modes, SEARCH_BTREE(the default mode) and SEARCH_BINARY.
 *It contains a very small database file,only 3.5M

Installation
============
* Extract this package to `common/components`
* Add following lines into `main.php` configuration file:

    	'components' => array(
    		...
    		'ip2region' => array(
    			'class' => '\common\components\IP2Region\Geolocation',
	            'database' => __DIR__ .DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'IP2Region'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'ip2region.db',
	            'mode' => 'SEARCH_BTREE',
    		),
    		...
    	),

Usage
=====

$ip = Yii::$app->request->userIP;
$region = Yii::$app->ip2region->getRegion($ip);

Returns the following information
=================================

|中国|华南|广东省|深圳市|鹏博士

More
=====
Inspired by yii2-IP2Location and ip2region.





中文说明
========
准确率99.9%的ip到地名的映射库，0.0x毫秒级查询，数据库文件大小只有3.5M http://git.oschina.net/lionsoul/ip2region
提供SEARCH_BTREE(默认)和SEARCH_BINARY两种查询模式

安装
====

* 解压文件到 `common/components`
* 在 `main.php` 添加如下信息:

    	'components' => array(
    		...
    		'ip2region' => array(
    			'class' => '\common\components\IP2Region\Geolocation',
	            'database' => __DIR__ .DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'IP2Region'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'ip2region.db',
	            'mode' => 'SEARCH_BTREE',
    		),
    		...
    	),


感谢
====
狮子的魂提供的ipregion 和yii2-IP2Location插件