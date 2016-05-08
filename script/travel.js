indexApp.controller('travel',function($scope,$http){
	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	};

	$scope.userId = window.sessionStorage.curUserId == 'undefined' ? undefined :  window.sessionStorage.curUserId;

	var oUrl = '../core/gettravelDetail.php?travelid=' + types['travelid'];
	$http.get(oUrl).success(function(result){
		if(result == 'failed'){
			alert('获取游记失败！');
		}else{
			console.log(result);
			$scope.title = result.title;
			$scope.content = result.content;
			$scope.authorid = result.userid;
			$('#content').append(result.content);

			var url = '../core/getuserInfo.php?userid=' + $scope.authorid;
			$http.get(url).success(function(r){
				if(r == 'failed'){
					alert('获取作者失败！');
				}else{
					console.log(r);
				}
			})
		}
	});

	$scope.save = function () {
		var title = $('#title').val();
		if(title == ''){return;}
		var content = UE.getEditor('editor').getContent();
		var data = {};
		data.userid = $scope.userId;
		data.title = title;
		data.content = content;

		var url = '../core/travel.php';

		$http.post(url,data).success(function(result){
			if(result == 'failed'){
				alert('保存失败！');
			}else{
				alert('保存成功！');
			}
		})
	};
})