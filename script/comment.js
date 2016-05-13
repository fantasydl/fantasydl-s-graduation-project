indexApp.controller('setComment',function($scope,$http){
	$scope.albums = [];

	if(!sessionStorage.isLogined || sessionStorage.isLogined == 'false'){
		alert("请先登录！");
		window.history.go(-1);
	};

	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	}

	var data = {};
	data.userid =  parseInt(window.sessionStorage.curUserId);
	data.date = getDateToday();

	if(types['travelid']){
		$scope.isShopComm = false;
	}else{
		$scope.isShopComm = true;
	}

	$scope.submit = function () {
		if(types['travelid']){
			var url = '../core/tcomment.php';
			data.travelid = parseInt(types['travelid']);
			data.content = $('#content').val();	
			$http.post(url,data).success(function(result){
				if(result == 'success'){
					alert('评论成功！');
					window.history.go(-1);
				}else{
					alert('评论失败！');
				}
			})
		}else if(types['shopid']){
			var url = '../core/comment.php';
			data.shopid = parseInt(types['shopid']);
			data.content = $('#content').val();	
			data.score = window.fenshu1;
			data.score1 = window.fenshu2;
			data.score2 = window.fenshu3;
			data.score3 = window.fenshu4;
			data.percost = $('#percost').val();	
			data.albums = $scope.albums.length > 0 ? $scope.albums.join(';') : null;
			$http.post(url,data).success(function(result){
				if(result == 'success'){
					alert('评论成功！');
					window.history.go(-1);
				}else{
					alert('评论失败！');			
				}
			})
		}
	};

	$scope.uploadIamge = function () {
		var url = '../core/upload.php';
		var fd = new FormData();
		var oFile = $('#albums').prop('files')[0];
		fd.append('file',oFile);

		$.ajax({  
    		url : url,
    		type : 'POST',
     		data : fd,
     		contentType:false,
     		processData:false
		}).done(function(result){
			alert('上传成功！');
			result = JSON.parse(result);
			console.log(result[0]);
			$scope.albums.push('uploads/' + result[0].icon);
			
		}).fail(function(error){
			alert('上传失败！');
		});  
	};

	function getDateToday () {
		var today = new Date();
		var yyyy = today.getFullYear();
		var mm = today.getMonth() + 1;
		var dd = today.getDate();
		return yyyy + '-' + mm + '-' + dd;
	}
	
});