<?php
namespace xiaogouxo\ip2region;

use Yii;
use yii\base\Component;
use \yii\base\Exception;
use \xiaogouxo\ip2region\IP2Region;

class Geolocation extends Component {
	public $database = null;
	public $mode;

	protected static $ip2region;

	public function init() {
		switch($this->mode) {
			case 'SEARCH_BTREE':
				$this->mode = IP2Region::SEARCH_BTREE;
			break;

			case 'SEARCH_BINARY':
                $this->mode = IP2Region::SEARCH_BINARY;
			break;

			default:
                $this->mode = IP2Region::SEARCH_BTREE;
			break;
		}

		if(!$this->database){
			$this->database = dirname(__FILE__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'ip2region.db';
		}

		self::$ip2region = new IP2Region($this->database);

		parent::init();
	}

	public function getRegion($ip=NULL) {
        $ip = self::getIP($ip);
        if($ip==NULL){
            throw new Exception('Error: invalid ip address');
        }
		$regionArr = $this->mode===IP2Region::SEARCH_BTREE?self::$ip2region->btreeSearch($ip):self::$ip2region->binarySearch($ip);
        if(!is_null($regionArr)&&is_array($regionArr)&&isset($regionArr['region'])){
            return $regionArr['region'];
        }else{
            return '';
        }
	}

	protected function getIP($ip=NULL) {
		return ($ip) ? $ip : Yii::$app->request->getUserIP();
	}
}