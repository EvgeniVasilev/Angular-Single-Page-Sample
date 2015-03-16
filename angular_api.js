function geographicalGlossary($scope, $http)
{
    var home = document.getElementById("home"),
	     titles = document.getElementById("titles"),
	     maps = document.getElementById("maps");
    $scope.heading = "Angular Powered Geographical Glossary";
    $http.get("body.js").success(function (data)
    {
        $scope.items = data;
        titles.innerHTML = data[0].title;
        home.innerHTML = data[0].description;
        maps.src = data[0].img;
    });
    $scope.showItem = function (item, title, map)
    {
        home.innerHTML = item;
        titles.innerHTML = title;
        maps.src = map;
    };
}
