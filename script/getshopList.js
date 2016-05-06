indexApp.controller('getshopList',function($scope,$http){
	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	}
	
	var url = '../core/getshopList.php';
	url = url + "?category=" + types['type1'];
	$scope.levelOne = types['type1'];
	if(argUrl.length > 1){
		url = url + "&special=" + types['type2'];
		$scope.levelTwo = types['type2'];
	}

	$http.get(url).success(function(result){
		if(result == 'failed'){
			$scope.list = [];
			alert('获取列表失败');
		}else{
			for(var i = 0,l = result.length;i < l;i++){
				var score = parseInt(result[i].avg_score1) + parseInt(result[i].avg_score2) + parseInt(result[i].avg_score3);
				result[i].score = parseInt(score/3);
				if(!result[i].newcomment){
					result[i].newcomment = '暂无评论';
				}
			}
			$scope.list = result;
		}
	});
});