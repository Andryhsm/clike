{"filter":false,"title":"PagesController.php","tooltip":"/app/Http/Controllers/Front/PagesController.php","undoManager":{"mark":26,"position":26,"stack":[[{"start":{"row":82,"column":2},"end":{"row":83,"column":0},"action":"insert","lines":["",""],"id":1},{"start":{"row":83,"column":0},"end":{"row":83,"column":2},"action":"insert","lines":["\t\t"]}],[{"start":{"row":83,"column":2},"end":{"row":86,"column":38},"action":"insert","lines":["$countries = $this->region_repository->getCountries();","        $store = false;","        $brands = $this->brand_repository->lists();","        $brand_tags = BrandTag::get();"],"id":2}],[{"start":{"row":87,"column":31},"end":{"row":87,"column":86},"action":"insert","lines":[", compact('countries', 'store', 'brands', 'brand_tags')"],"id":3}],[{"start":{"row":16,"column":173},"end":{"row":17,"column":2},"action":"remove","lines":[")","\t{"],"id":4},{"start":{"row":16,"column":173},"end":{"row":19,"column":46},"action":"insert","lines":["UserRepository $user_repository,RegionRepositoryInterface $region_repo, BrandRepositoryInterface $brand_repo){","        $this->user_repository=$user_repository;","        $this->region_repository = $region_repo;","        $this->brand_repository = $brand_repo;"]}],[{"start":{"row":17,"column":8},"end":{"row":18,"column":7},"action":"remove","lines":["$this->user_repository=$user_repository;","       "],"id":5}],[{"start":{"row":16,"column":76},"end":{"row":16,"column":122},"action":"remove","lines":[" UserRepositoryInterface $user_repo_interface,"],"id":6}],[{"start":{"row":8,"column":46},"end":{"row":10,"column":45},"action":"insert","lines":["","use App\\Interfaces\\BrandRepositoryInterface;","use App\\Interfaces\\RegionRepositoryInterface;"],"id":7}],[{"start":{"row":18,"column":236},"end":{"row":19,"column":0},"action":"insert","lines":["",""],"id":8},{"start":{"row":19,"column":0},"end":{"row":19,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":20,"column":8},"end":{"row":20,"column":9},"action":"remove","lines":[" "],"id":9}],[{"start":{"row":18,"column":127},"end":{"row":18,"column":128},"action":"insert","lines":[","],"id":10}],[{"start":{"row":18,"column":128},"end":{"row":18,"column":142},"action":"remove","lines":["UserRepository"],"id":11},{"start":{"row":18,"column":128},"end":{"row":18,"column":151},"action":"insert","lines":["UserRepositoryInterface"]}],[{"start":{"row":22,"column":27},"end":{"row":22,"column":47},"action":"remove","lines":["$user_repo_interface"],"id":12},{"start":{"row":22,"column":27},"end":{"row":22,"column":43},"action":"insert","lines":["$user_repository"]}],[{"start":{"row":16,"column":31},"end":{"row":17,"column":0},"action":"insert","lines":["",""],"id":13},{"start":{"row":17,"column":0},"end":{"row":17,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":17,"column":1},"end":{"row":17,"column":2},"action":"insert","lines":["p"]},{"start":{"row":17,"column":2},"end":{"row":17,"column":3},"action":"insert","lines":["e"]}],[{"start":{"row":17,"column":2},"end":{"row":17,"column":3},"action":"remove","lines":["e"],"id":14}],[{"start":{"row":17,"column":2},"end":{"row":17,"column":3},"action":"insert","lines":["r"],"id":15},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"insert","lines":["o"]},{"start":{"row":17,"column":4},"end":{"row":17,"column":5},"action":"insert","lines":["t"]},{"start":{"row":17,"column":5},"end":{"row":17,"column":6},"action":"insert","lines":["e"]},{"start":{"row":17,"column":6},"end":{"row":17,"column":7},"action":"insert","lines":["c"]},{"start":{"row":17,"column":7},"end":{"row":17,"column":8},"action":"insert","lines":["t"]},{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"insert","lines":["e"]},{"start":{"row":17,"column":9},"end":{"row":17,"column":10},"action":"insert","lines":["d"]}],[{"start":{"row":17,"column":10},"end":{"row":17,"column":11},"action":"insert","lines":[" "],"id":16},{"start":{"row":17,"column":11},"end":{"row":17,"column":12},"action":"insert","lines":["$"]}],[{"start":{"row":17,"column":12},"end":{"row":17,"column":29},"action":"insert","lines":["region_repository"],"id":17}],[{"start":{"row":17,"column":29},"end":{"row":17,"column":30},"action":"insert","lines":[";"],"id":18}],[{"start":{"row":17,"column":30},"end":{"row":18,"column":0},"action":"insert","lines":["",""],"id":19},{"start":{"row":18,"column":0},"end":{"row":18,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":18,"column":1},"end":{"row":18,"column":2},"action":"insert","lines":["p"]},{"start":{"row":18,"column":2},"end":{"row":18,"column":3},"action":"insert","lines":["r"]},{"start":{"row":18,"column":3},"end":{"row":18,"column":4},"action":"insert","lines":["o"]},{"start":{"row":18,"column":4},"end":{"row":18,"column":5},"action":"insert","lines":["t"]},{"start":{"row":18,"column":5},"end":{"row":18,"column":6},"action":"insert","lines":["e"]}],[{"start":{"row":18,"column":6},"end":{"row":18,"column":7},"action":"insert","lines":["c"],"id":20},{"start":{"row":18,"column":7},"end":{"row":18,"column":8},"action":"insert","lines":["t"]},{"start":{"row":18,"column":8},"end":{"row":18,"column":9},"action":"insert","lines":["e"]},{"start":{"row":18,"column":9},"end":{"row":18,"column":10},"action":"insert","lines":["d"]}],[{"start":{"row":18,"column":10},"end":{"row":18,"column":11},"action":"insert","lines":[" "],"id":21},{"start":{"row":18,"column":11},"end":{"row":18,"column":12},"action":"insert","lines":["$"]}],[{"start":{"row":18,"column":12},"end":{"row":18,"column":13},"action":"insert","lines":["b"],"id":22},{"start":{"row":18,"column":13},"end":{"row":18,"column":14},"action":"insert","lines":["r"]},{"start":{"row":18,"column":14},"end":{"row":18,"column":15},"action":"insert","lines":["a"]},{"start":{"row":18,"column":15},"end":{"row":18,"column":16},"action":"insert","lines":["n"]},{"start":{"row":18,"column":16},"end":{"row":18,"column":17},"action":"insert","lines":["d"]}],[{"start":{"row":18,"column":17},"end":{"row":18,"column":18},"action":"insert","lines":["_"],"id":23}],[{"start":{"row":18,"column":18},"end":{"row":18,"column":19},"action":"insert","lines":["r"],"id":24},{"start":{"row":18,"column":19},"end":{"row":18,"column":20},"action":"insert","lines":["e"]},{"start":{"row":18,"column":20},"end":{"row":18,"column":21},"action":"insert","lines":["p"]},{"start":{"row":18,"column":21},"end":{"row":18,"column":22},"action":"insert","lines":["o"]},{"start":{"row":18,"column":22},"end":{"row":18,"column":23},"action":"insert","lines":["s"]},{"start":{"row":18,"column":23},"end":{"row":18,"column":24},"action":"insert","lines":["i"]},{"start":{"row":18,"column":24},"end":{"row":18,"column":25},"action":"insert","lines":["t"]},{"start":{"row":18,"column":25},"end":{"row":18,"column":26},"action":"insert","lines":["o"]},{"start":{"row":18,"column":26},"end":{"row":18,"column":27},"action":"insert","lines":["r"]}],[{"start":{"row":18,"column":27},"end":{"row":18,"column":28},"action":"insert","lines":["y"],"id":25},{"start":{"row":18,"column":28},"end":{"row":18,"column":29},"action":"insert","lines":[";"]}],[{"start":{"row":10,"column":45},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":26}],[{"start":{"row":11,"column":0},"end":{"row":11,"column":17},"action":"insert","lines":["use App\\BrandTag;"],"id":27}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":11,"column":17},"end":{"row":11,"column":17},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":true,"wrapToView":true},"firstLineState":0},"timestamp":1527257840165,"hash":"ddbf772db243ac00cdcda2332d156fa5e4dee67a"}