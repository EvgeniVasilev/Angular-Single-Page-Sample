<!DOCTYPE html>
<html data-ng-app="">

<head>
	<title></title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>
	<script type="text/javascript" src="http://knockoutjs.com/downloads/knockout-3.0.0.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<style type="text/css">
		div,img{
		border-radius: 3px;
		}
		.container {
		    width: 986px;
			margin:auto;
		}
		
		input[type="text"]{
			border-radius:3px;
			width: 50px;
			padding: 3px 0 3px 3px;
			border: 1px solid silver;
			}
		a{
		    font-family: "trebuchet ms";
			color: #343434;
			font-weight:bold;
			margin-right:5px;
		}
		.header{
		    color: white;
			background-color:#343434;
			text-align:center;
			border-radius: 3px;
		}
		p{
		    text-align:justify;
			font-family: atomic-age;
			font-size:16px;
		}
		.article:first-letter{
		    font-size:25px;
			color: maroon;
			text-decoration:underline;
			margin-right:1px;
			font-weight:bold;			
			
		}
		.article-sub:first-letter{
			font-size:25px;
			color: maroon;
			text-decoration:underline;
			margin-right:1px;
			font-weight:bold;			
		}
		
		.article,.article-sub{
		     text-indent: 40px;
			font-family: "trebuchet ms";
		}
		img{
		   float: left;
		   margin-right: 20px;
		}
		h1,h2,h3{
		font-family: "trebuchet ms" 
		}
	</style>
</head>

<body>
	<div class="container">
		<div data-ng-controller="geographicalGlossary">
			<h1 class="header" data-ng-bind="heading"></h1>
			<span data-ng-repeat="item in items">
				<a href="" data-ng-click="showItem(item.description, item.title, item.img)">
					<span data-ng-bind="item.title"></span>
				</a>
			</span>
			<div>
				<h2 id="titles"></h2>
				<img src="" id="maps" height="300" width="400" style="box-shadow: 0 0 12px black;" />
				<p id="home"></p>
			</div>
		</div>
		<h3 class="header">&copy;evgenivasilev1209@abv.bg</h3>
	</div>

	<script type="text/javascript">
		function geographicalGlossary($scope, $http) {
			var home = document.getElementById("home"),
				titles = document.getElementById("titles"),
				maps = document.getElementById("maps");
			$scope.heading = "Angular Powered Geographical Glossary";
			$http.get("body.json").success(function(data) {
				$scope.items = data;
				titles.innerHTML = data[0].title;
				home.innerHTML = data[0].description;
				maps.src = data[0].img;
			});
			$scope.showItem = function(item, title, map) {
				home.innerHTML = item;
				titles.innerHTML = title;
				maps.src = map;
			};
		}
	</script>
</body>

</html>