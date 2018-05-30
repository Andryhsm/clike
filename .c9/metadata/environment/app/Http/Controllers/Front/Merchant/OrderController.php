{"filter":false,"title":"OrderController.php","tooltip":"/app/Http/Controllers/Front/Merchant/OrderController.php","undoManager":{"mark":16,"position":16,"stack":[[{"start":{"row":79,"column":60},"end":{"row":80,"column":51},"action":"remove","lines":["","            \t\t$order_item_request->is_canceled = 1;"],"id":126}],[{"start":{"row":79,"column":58},"end":{"row":79,"column":59},"action":"remove","lines":["6"],"id":127},{"start":{"row":79,"column":58},"end":{"row":79,"column":59},"action":"insert","lines":["2"]}],[{"start":{"row":83,"column":87},"end":{"row":83,"column":95},"action":"remove","lines":["CANCELED"],"id":128},{"start":{"row":83,"column":87},"end":{"row":83,"column":88},"action":"insert","lines":["R"]},{"start":{"row":83,"column":88},"end":{"row":83,"column":89},"action":"insert","lines":["E"]},{"start":{"row":83,"column":89},"end":{"row":83,"column":90},"action":"insert","lines":["P"]},{"start":{"row":83,"column":90},"end":{"row":83,"column":91},"action":"insert","lines":["L"]},{"start":{"row":83,"column":91},"end":{"row":83,"column":92},"action":"insert","lines":["I"]},{"start":{"row":83,"column":92},"end":{"row":83,"column":93},"action":"insert","lines":["E"]},{"start":{"row":83,"column":93},"end":{"row":83,"column":94},"action":"insert","lines":["D"]}],[{"start":{"row":83,"column":87},"end":{"row":83,"column":94},"action":"remove","lines":["REPLIED"],"id":129},{"start":{"row":83,"column":87},"end":{"row":83,"column":88},"action":"insert","lines":["W"]}],[{"start":{"row":83,"column":88},"end":{"row":83,"column":89},"action":"insert","lines":["A"],"id":130},{"start":{"row":83,"column":89},"end":{"row":83,"column":90},"action":"insert","lines":["N"]},{"start":{"row":83,"column":90},"end":{"row":83,"column":91},"action":"insert","lines":["S"]}],[{"start":{"row":83,"column":91},"end":{"row":83,"column":92},"action":"insert","lines":["W"],"id":131},{"start":{"row":83,"column":92},"end":{"row":83,"column":93},"action":"insert","lines":["E"]},{"start":{"row":83,"column":93},"end":{"row":83,"column":94},"action":"insert","lines":["R"]}],[{"start":{"row":79,"column":58},"end":{"row":79,"column":59},"action":"remove","lines":["2"],"id":132},{"start":{"row":79,"column":58},"end":{"row":79,"column":59},"action":"insert","lines":["4"]}],[{"start":{"row":79,"column":58},"end":{"row":79,"column":59},"action":"remove","lines":["4"],"id":133},{"start":{"row":79,"column":58},"end":{"row":79,"column":59},"action":"insert","lines":["2"]}],[{"start":{"row":83,"column":87},"end":{"row":83,"column":94},"action":"remove","lines":["WANSWER"],"id":134},{"start":{"row":83,"column":87},"end":{"row":83,"column":88},"action":"insert","lines":["R"]},{"start":{"row":83,"column":88},"end":{"row":83,"column":89},"action":"insert","lines":["E"]},{"start":{"row":83,"column":89},"end":{"row":83,"column":90},"action":"insert","lines":["P"]},{"start":{"row":83,"column":90},"end":{"row":83,"column":91},"action":"insert","lines":["L"]},{"start":{"row":83,"column":91},"end":{"row":83,"column":92},"action":"insert","lines":["I"]},{"start":{"row":83,"column":92},"end":{"row":83,"column":93},"action":"insert","lines":["E"]},{"start":{"row":83,"column":93},"end":{"row":83,"column":94},"action":"insert","lines":["D"]}],[{"start":{"row":81,"column":48},"end":{"row":82,"column":0},"action":"insert","lines":["",""],"id":137},{"start":{"row":82,"column":0},"end":{"row":82,"column":20},"action":"insert","lines":["                    "]},{"start":{"row":82,"column":20},"end":{"row":83,"column":0},"action":"insert","lines":["",""]},{"start":{"row":83,"column":0},"end":{"row":83,"column":20},"action":"insert","lines":["                    "]}],[{"start":{"row":83,"column":20},"end":{"row":84,"column":71},"action":"insert","lines":["$coupon_code = $this->generateCouponCode();","        $coupon = $this->saveCoupon($coupon_code, $order_item_request);"],"id":138}],[{"start":{"row":84,"column":8},"end":{"row":84,"column":12},"action":"insert","lines":["    "],"id":139}],[{"start":{"row":84,"column":12},"end":{"row":84,"column":16},"action":"insert","lines":["    "],"id":140}],[{"start":{"row":84,"column":16},"end":{"row":84,"column":20},"action":"insert","lines":["    "],"id":141}],[{"start":{"row":64,"column":147},"end":{"row":64,"column":148},"action":"remove","lines":["/"],"id":142},{"start":{"row":64,"column":146},"end":{"row":64,"column":147},"action":"remove","lines":["*"]}],[{"start":{"row":64,"column":17},"end":{"row":64,"column":18},"action":"remove","lines":["*"],"id":143},{"start":{"row":64,"column":16},"end":{"row":64,"column":17},"action":"remove","lines":["/"]}],[{"start":{"row":64,"column":144},"end":{"row":64,"column":146},"action":"insert","lines":["*/"],"id":144},{"start":{"row":64,"column":16},"end":{"row":64,"column":18},"action":"insert","lines":["/*"]}],[{"start":{"row":182,"column":4},"end":{"row":190,"column":5},"action":"insert","lines":["public function waitingOrder($id){","        ","        return response()->json(['success'=> true,'message' => 'Commande mise en attente éffectué avec succèes']);","    }","    ","    public function canceledOrder($id){","        ","        return response()->json(['success'=> true,'message' => 'Commande annulée avec succèes' ]);","    }"],"id":146}],[{"start":{"row":181,"column":4},"end":{"row":182,"column":0},"action":"insert","lines":["",""],"id":145},{"start":{"row":182,"column":0},"end":{"row":182,"column":4},"action":"insert","lines":["    "]},{"start":{"row":182,"column":4},"end":{"row":183,"column":0},"action":"insert","lines":["",""]},{"start":{"row":183,"column":0},"end":{"row":183,"column":4},"action":"insert","lines":["    "]}]]},"ace":{"folds":[],"scrolltop":480,"scrollleft":0,"selection":{"start":{"row":44,"column":48},"end":{"row":44,"column":72},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":true,"wrapToView":true},"firstLineState":{"row":52,"state":"php-doc-start","mode":"ace/mode/php"}},"timestamp":1527580289119,"hash":"707536f01263c97573b7e4ec292a625ecc9c25f1"}