 <?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	
	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );
	
	//include_once WEB_ROOT."util/util.php";
	//require_once(WEB_ROOT.'/third_part/log4php/LoggerManager.php');  
	
	
	function addWeiboUser($weibo_user){
		$db =  new mysql("utf8");
		$insert_sql ="INSERT INTO t_weibo_user (uid ,expires_in,remind_in,access_token,screen_name,profile_url,profile_image_url)
		VALUES ('".$weibo_user['uid']."',".$weibo_user['expires_in'].",".$weibo_user['remind_in'].",'".$weibo_user['access_token'].
		"','".$weibo_user['screen_name']."','".$weibo_user['profile_url']."','".$weibo_user['profile_image_url']."')";
		$db->query($insert_sql);
	}
	
	function isWeiboUserExsit($uid){
		$db =  new mysql("utf8");
		$sql_select="select uid from t_weibo_user where uid= '".$uid."'";
		$query = $db->query($sql_select);
	    if($db->num_rows($query)>0){
			return true;
	    }
		return false;
	}
	
	function addIfAbsent($weibo_user){
		if(!isWeiboUserExsit($weibo_user['uid'])){
			addWeiboUser($weibo_user);
		}else{
			// 更新token
			updateToken($weibo_user);
		}
	}
	
	function updateToken($weibo_user){
		$db =  new mysql("utf8");
		$update_sql ="update t_weibo_user set access_token = '".$weibo_user['access_token']."' where uid = '".$weibo_user['uid']."';";
		$db->query($update_sql);
	}
	
	function getAccessToken($uid){
		$db =  new mysql("utf8");
		$sql_select="select access_token from t_weibo_user where uid= '".$uid."'";
		$query = $db->query($sql_select);
		if($db->num_rows($query)>0){
				$weiboUser = $db->fetch_row_array($query);
				$access_token=$weiboUser["access_token"];
		}
		return $access_token;
	}
	
	function getUidLst(){
		$db =  new mysql("utf8");
		$sql_select="select uid,screen_name,profile_image_url from t_weibo_user order by id desc";
		$query = $db->query($sql_select);
		while($row=$db->fetch_row_array($query)){
			$arr[] = $row;
		}
		return $arr;
	}
	
	/**
		关注一个用户
	**/
	function follow_by_id($uid,$targetId,$access_token){
		$saeTClientV2 = new SaeTClientV2(WB_AKEY , WB_SKEY ,$access_token);
		
		$result = $saeTClientV2->is_followed_by_id($targetId);
		//print_r($result);
		if(!isset($result["source"])){
			return $result;
		}else{
			if($result["source"]["following"]!=1){
				//echo "guanzhu<br>";
				return $saeTClientV2->follow_by_id($targetId);
			}else{
				return 1;
			}
		}
		return -1;
	}
	/**
		是否已经被某用户关注
	**/
	function is_following($saeTClientV2,$targetId){
		$result = $saeTClientV2->is_followed_by_id($targetId);
		//print_r($result);
		if(!isset($_SESSION["source"]))
		return $result["source"]["following"];
	}
	
	/**
	"error_code" : "20502",
	**/
	function is_error($errorJson){
		if(isset($errorJson["error_code"])){
			$errCode =  $errorJson["error_code"];
			//20506 	Already followed
			if($errCode!=20506){
				return $errCode;
			}
		}else{
		    return -1;
		}
	}
	
	function hufen($targetId){
		
		$weibo_user = $_SESSION["user"] ;
		
		//对方关注我
		//echo "step1<br>";
		
		$target_access_token = getAccessToken($targetId);
		$retJson = follow_by_id($targetId,$weibo_user["uid"],$target_access_token);
		//print_r($retJson);
		if(is_array($retJson)){
			$errCode = is_error($retJson);
			//echo "errCode:".$errCode;
			if($errCode>0){
				return $errCode;
			}
		}
		
		//关注对方
		//echo "step2<br>";
		$retJson = follow_by_id($weibo_user["uid"],$targetId,$weibo_user["access_token"]);
		//print_r($retJson);
		if(is_array($retJson)){
			$errCode = is_error($retJson);
			if($errCode>0){
				return $errCode;
			}
		}
		
		return 1;
	}
	
?>