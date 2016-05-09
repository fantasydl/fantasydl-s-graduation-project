indexApp.controller('travel',function($scope,$http){
	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	};

	$scope.isAuthor = false;

	$scope.userId = window.sessionStorage.curUserId == 'undefined' ? undefined :  window.sessionStorage.curUserId;

	if(types['travelid']){
		var oUrl = '../core/gettravelDetail.php?travelid=' + types['travelid'];
		$http.get(oUrl).success(function(result){
			if(result == 'failed'){
				alert('获取游记失败！');
			}else{
				console.log(result);
				$scope.travelid = result.travelid;
				$scope.title = result.title;
				$('#title').val($scope.title);
				$scope.cover = result.cover;
				$scope.content = result.content;
				$('#content').append($scope.content);
				setTimeout(function(){
					UE.getEditor('editor').execCommand('insertHtml', $scope.content);
				},200);
				$scope.authorid = result.userid;
				if($scope.authorid == $scope.userId){$scope.isAuthor = true}
				$scope.authorname = result.authorname;
				$scope.authoricon = result.authoricon;
				$scope.authorinfo = result.authorinfo;

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

		oUrl = '../core/gettComments.php?travelid=' + types['travelid'];
		$http.get(oUrl).success(function(result){
			if(result == 'failed'){
				alert('获取评论失败！');
			}else{
				$scope.clist = result;
			}
		});
	}
	
	$scope.uploadCover = function () {
		var url = '../core/upload.php';
		var fd = new FormData();
		var oFile = $('#cover').prop('files')[0];
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
			$scope.cover = 'uploads/' + result[0].icon;
		}).fail(function(error){
			alert('上传失败！');
		});  
	};

	$scope.save = function () {
		var title = $('#title').val();
		if(title == ''){
			alert('请先编写标题！');
			return;
		}
		console.log($scope.cover);
		if(!$scope.cover){
			alert('请先上传封面！');
			return;
		}
		var content = UE.getEditor('editor').getContent();
		var data = {};
		if($scope.travelid){
			data.travelid = parseInt($scope.travelid);
		}
		data.userid = parseInt($scope.userId);
		data.title = title;
		data.cover = $scope.cover;
		data.content = content;
		data.date = getDateToday();
		console.log(data);

		var url = '../core/travel.php';

		$http.post(url,data).success(function(result){
			if(result == 'failed'){
				alert('保存失败！');
			}else{
				alert('保存成功！');
			}
		})
	};

	function getDateToday () {
		var today = new Date();
		var yyyy = today.getFullYear();
		var mm = today.getMonth() + 1;
		var dd = today.getDate();
		return yyyy + '-' + mm + '-' + dd;
	}
})