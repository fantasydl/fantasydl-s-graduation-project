indexApp.controller('getDetail',function($scope,$http){
	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	}

	var url = '../core/getshopDetail.php';
	url = url + "?shopid=" + types['shopid'];

	$http.get(url).success(function(result){
		if(result == 'failed'){
			$scope.detail = [];
			alert('获取详情失败');
		}else{
			var score = parseInt(result.avg_score1) + parseInt(result.avg_score2) + parseInt(result.avg_score3);
			result.score = parseInt(score/3);
			$scope.detail = result;
		}
	});

	url = '../core/commentList.php';
	url = url + "?shopid=" + types['shopid'];

	$http.get(url).success(function(result){
		console.log(result);
		if(result == 'failed'){
			$scope.clist = [];
			alert('获取详情失败');
		}else{
			for(var i = 0,l = result.length;i < l;i++){
				result[i].score = parseInt(result[i].score);
			}
			$scope.clist = result;
		}
	})
})