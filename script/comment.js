indexApp.controller('setComment',function($scope,$http){
	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	}

	var url = '../core/comment.php';
	var data = {};
	data.userid =  parseInt(window.sessionStorage.curUserId);
	data.date = getDate();

	$scope.submit = function () {
		if(types['travelid']){
			data.travelid = parseInt(types['travelid']);	
			$http.post(url,data).success(function(result){
				if(result == 'success'){
					alert('评论成功！');
				}else{
					alert('评论失败！');
				}
			})
		}else if(types['shopid']){
			data.shopid = parseInt(types['shopid']);
			$http.post(url,data).success(function(result){
				if(result == 'success'){
					alert('评论成功！');
				}else{
					alert('评论失败！');			
				}
			})
		}
	};

	function getDateToday () {
		var today = new Date();
		var yyyy = today.getFullYear();
		var mm = today.getMonth() + 1;
		var dd = today.getDate();
		return yyyy + '-' + mm + '-' + dd;
	}
	
});