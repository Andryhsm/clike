{"filter":false,"title":"CustomerController.php","tooltip":"/app/Http/Controllers/Front/CustomerController.php","undoManager":{"mark":25,"position":25,"stack":[[{"start":{"row":122,"column":36},"end":{"row":123,"column":0},"action":"insert","lines":["",""],"id":10},{"start":{"row":123,"column":0},"end":{"row":123,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":123,"column":8},"end":{"row":123,"column":63},"action":"insert","lines":["$item = $this->order_item_repository->getItemById($id);"],"id":11}],[{"start":{"row":123,"column":46},"end":{"row":123,"column":57},"action":"remove","lines":["getItemById"],"id":12},{"start":{"row":123,"column":46},"end":{"row":123,"column":65},"action":"insert","lines":["getBookedItemByUser"]}],[{"start":{"row":123,"column":66},"end":{"row":123,"column":69},"action":"remove","lines":["$id"],"id":13},{"start":{"row":123,"column":66},"end":{"row":123,"column":88},"action":"insert","lines":["\\Auth::user()->user_id"]}],[{"start":{"row":122,"column":36},"end":{"row":123,"column":0},"action":"insert","lines":["",""],"id":14},{"start":{"row":123,"column":0},"end":{"row":123,"column":8},"action":"insert","lines":["        "]},{"start":{"row":123,"column":8},"end":{"row":123,"column":9},"action":"insert","lines":["d"]},{"start":{"row":123,"column":9},"end":{"row":123,"column":10},"action":"insert","lines":["d"]}],[{"start":{"row":123,"column":10},"end":{"row":123,"column":12},"action":"insert","lines":["()"],"id":15}],[{"start":{"row":123,"column":12},"end":{"row":123,"column":13},"action":"insert","lines":[";"],"id":16}],[{"start":{"row":123,"column":11},"end":{"row":123,"column":33},"action":"insert","lines":["\\Auth::user()->user_id"],"id":17}],[{"start":{"row":122,"column":36},"end":{"row":123,"column":35},"action":"remove","lines":["","        dd(\\Auth::user()->user_id);"],"id":19}],[{"start":{"row":123,"column":46},"end":{"row":123,"column":65},"action":"remove","lines":["getBookedItemByUser"],"id":20},{"start":{"row":123,"column":46},"end":{"row":123,"column":63},"action":"insert","lines":["getBookedItemById"]}],[{"start":{"row":123,"column":13},"end":{"row":123,"column":14},"action":"insert","lines":["s"],"id":22}],[{"start":{"row":123,"column":89},"end":{"row":124,"column":0},"action":"insert","lines":["",""],"id":23},{"start":{"row":124,"column":0},"end":{"row":124,"column":8},"action":"insert","lines":["        "]},{"start":{"row":124,"column":8},"end":{"row":124,"column":9},"action":"insert","lines":["d"]},{"start":{"row":124,"column":9},"end":{"row":124,"column":10},"action":"insert","lines":["d"]}],[{"start":{"row":124,"column":10},"end":{"row":124,"column":12},"action":"insert","lines":["()"],"id":24}],[{"start":{"row":124,"column":12},"end":{"row":124,"column":13},"action":"insert","lines":[";"],"id":25}],[{"start":{"row":124,"column":11},"end":{"row":124,"column":12},"action":"insert","lines":["$"],"id":26},{"start":{"row":124,"column":12},"end":{"row":124,"column":13},"action":"insert","lines":["i"]},{"start":{"row":124,"column":13},"end":{"row":124,"column":14},"action":"insert","lines":["t"]},{"start":{"row":124,"column":14},"end":{"row":124,"column":15},"action":"insert","lines":["e"]},{"start":{"row":124,"column":15},"end":{"row":124,"column":16},"action":"insert","lines":["m"]},{"start":{"row":124,"column":16},"end":{"row":124,"column":17},"action":"insert","lines":["s"]}],[{"start":{"row":123,"column":47},"end":{"row":123,"column":64},"action":"remove","lines":["getBookedItemById"],"id":27},{"start":{"row":123,"column":47},"end":{"row":123,"column":66},"action":"insert","lines":["getBookedItemByUser"]}],[{"start":{"row":124,"column":8},"end":{"row":124,"column":19},"action":"remove","lines":["dd($items);"],"id":28},{"start":{"row":124,"column":8},"end":{"row":125,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":124,"column":8},"end":{"row":124,"column":12},"action":"remove","lines":["    "],"id":29},{"start":{"row":124,"column":8},"end":{"row":124,"column":12},"action":"remove","lines":["    "]}],[{"start":{"row":124,"column":54},"end":{"row":124,"column":55},"action":"insert","lines":[","],"id":30},{"start":{"row":124,"column":55},"end":{"row":124,"column":56},"action":"insert","lines":["i"]},{"start":{"row":124,"column":56},"end":{"row":124,"column":57},"action":"insert","lines":["t"]},{"start":{"row":124,"column":57},"end":{"row":124,"column":58},"action":"insert","lines":["e"]}],[{"start":{"row":124,"column":57},"end":{"row":124,"column":58},"action":"remove","lines":["e"],"id":31},{"start":{"row":124,"column":56},"end":{"row":124,"column":57},"action":"remove","lines":["t"]},{"start":{"row":124,"column":55},"end":{"row":124,"column":56},"action":"remove","lines":["i"]}],[{"start":{"row":124,"column":55},"end":{"row":124,"column":56},"action":"insert","lines":["c"],"id":32},{"start":{"row":124,"column":56},"end":{"row":124,"column":57},"action":"insert","lines":["o"]},{"start":{"row":124,"column":57},"end":{"row":124,"column":58},"action":"insert","lines":["m"]},{"start":{"row":124,"column":58},"end":{"row":124,"column":59},"action":"insert","lines":["p"]},{"start":{"row":124,"column":59},"end":{"row":124,"column":60},"action":"insert","lines":["a"]},{"start":{"row":124,"column":60},"end":{"row":124,"column":61},"action":"insert","lines":["c"]},{"start":{"row":124,"column":61},"end":{"row":124,"column":62},"action":"insert","lines":["t"]}],[{"start":{"row":124,"column":62},"end":{"row":124,"column":64},"action":"insert","lines":["()"],"id":33}],[{"start":{"row":124,"column":63},"end":{"row":124,"column":65},"action":"insert","lines":["''"],"id":34}],[{"start":{"row":124,"column":64},"end":{"row":124,"column":65},"action":"insert","lines":["i"],"id":35},{"start":{"row":124,"column":65},"end":{"row":124,"column":66},"action":"insert","lines":["t"]},{"start":{"row":124,"column":66},"end":{"row":124,"column":67},"action":"insert","lines":["e"]},{"start":{"row":124,"column":67},"end":{"row":124,"column":68},"action":"insert","lines":["m"]},{"start":{"row":124,"column":68},"end":{"row":124,"column":69},"action":"insert","lines":["s"]}],[{"start":{"row":124,"column":55},"end":{"row":124,"column":56},"action":"insert","lines":[" "],"id":36}],[{"start":{"row":119,"column":58},"end":{"row":119,"column":59},"action":"insert","lines":[" "],"id":37}]]},"ace":{"folds":[],"scrolltop":1500,"scrollleft":0,"selection":{"start":{"row":125,"column":5},"end":{"row":125,"column":5},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1526992114033,"hash":"1c276d6bc0d297f49ee4bf060a5a0aa2281a0434"}