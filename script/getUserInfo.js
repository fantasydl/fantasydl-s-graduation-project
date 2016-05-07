indexApp.controller('getUserInfo',function($scope,$http){
	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	}

	var url = '../core/getuserInfo.php';
	url = url + "?userid=" + types['userid'];

	$http.get(url).success(function(result){
		if(result == 'failed'){
			alert('获取个人信息失败');
		}else{
			console.log(result);
			$scope.userInfo = result;
		}
	})
})