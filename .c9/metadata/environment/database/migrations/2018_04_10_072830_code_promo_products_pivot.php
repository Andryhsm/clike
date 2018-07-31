{"filter":false,"title":"2018_04_10_072830_code_promo_products_pivot.php","tooltip":"/database/migrations/2018_04_10_072830_code_promo_products_pivot.php","undoManager":{"mark":16,"position":16,"stack":[[{"start":{"row":23,"column":38},"end":{"row":24,"column":0},"action":"insert","lines":["",""],"id":2},{"start":{"row":24,"column":0},"end":{"row":24,"column":16},"action":"insert","lines":["                "]}],[{"start":{"row":24,"column":16},"end":{"row":27,"column":26},"action":"insert","lines":["$table->integer('product_id')->index('idx_product_id')->unsigned();","\t\t\t$table->foreign('product_id')","\t\t\t\t->references('product_id')->on('product')","\t\t\t\t->onDelete('cascade');"],"id":3}],[{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"remove","lines":["    "],"id":4}],[{"start":{"row":24,"column":78},"end":{"row":24,"column":79},"action":"insert","lines":["-"],"id":6},{"start":{"row":24,"column":79},"end":{"row":24,"column":80},"action":"insert","lines":[">"]}],[{"start":{"row":24,"column":80},"end":{"row":24,"column":81},"action":"insert","lines":["n"],"id":7},{"start":{"row":24,"column":81},"end":{"row":24,"column":82},"action":"insert","lines":["u"]},{"start":{"row":24,"column":82},"end":{"row":24,"column":83},"action":"insert","lines":["l"]},{"start":{"row":24,"column":83},"end":{"row":24,"column":84},"action":"insert","lines":["l"]},{"start":{"row":24,"column":84},"end":{"row":24,"column":85},"action":"insert","lines":["a"]}],[{"start":{"row":24,"column":85},"end":{"row":24,"column":86},"action":"insert","lines":["b"],"id":8},{"start":{"row":24,"column":86},"end":{"row":24,"column":87},"action":"insert","lines":["l"]},{"start":{"row":24,"column":87},"end":{"row":24,"column":88},"action":"insert","lines":["e"]}],[{"start":{"row":24,"column":88},"end":{"row":24,"column":90},"action":"insert","lines":["()"],"id":9}],[{"start":{"row":19,"column":38},"end":{"row":23,"column":38},"action":"remove","lines":["","            $table->integer('product_id')->index('idx_product_id')->unsigned()->nullable();","            $table->foreign('product_id')","                ->references('product_id')->on('product')","                ->onDelete('cascade');"],"id":10}],[{"start":{"row":15,"column":73},"end":{"row":16,"column":0},"action":"insert","lines":["",""],"id":11},{"start":{"row":16,"column":0},"end":{"row":16,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":16,"column":12},"end":{"row":21,"column":38},"action":"insert","lines":["$table->increments('special_product_id');","            $table->enum('type', ['1', '2','3']);","            $table->integer('product_id')->index('idx_product_id')->unsigned()->nullable();","            $table->foreign('product_id')","                ->references('product_id')->on('product')","                ->onDelete('cascade');"],"id":12}],[{"start":{"row":16,"column":53},"end":{"row":17,"column":49},"action":"remove","lines":["","            $table->enum('type', ['1', '2','3']);"],"id":13}],[{"start":{"row":16,"column":53},"end":{"row":20,"column":38},"action":"remove","lines":["","            $table->integer('product_id')->index('idx_product_id')->unsigned()->nullable();","            $table->foreign('product_id')","                ->references('product_id')->on('product')","                ->onDelete('cascade');"],"id":14}],[{"start":{"row":16,"column":32},"end":{"row":16,"column":39},"action":"remove","lines":["special"],"id":15},{"start":{"row":16,"column":32},"end":{"row":16,"column":33},"action":"insert","lines":["c"]},{"start":{"row":16,"column":33},"end":{"row":16,"column":34},"action":"insert","lines":["o"]},{"start":{"row":16,"column":34},"end":{"row":16,"column":35},"action":"insert","lines":["d"]},{"start":{"row":16,"column":35},"end":{"row":16,"column":36},"action":"insert","lines":["e"]},{"start":{"row":16,"column":36},"end":{"row":16,"column":37},"action":"insert","lines":["_"]}],[{"start":{"row":16,"column":37},"end":{"row":16,"column":38},"action":"insert","lines":["p"],"id":16},{"start":{"row":16,"column":38},"end":{"row":16,"column":39},"action":"insert","lines":["r"]},{"start":{"row":16,"column":39},"end":{"row":16,"column":40},"action":"insert","lines":["o"]},{"start":{"row":16,"column":40},"end":{"row":16,"column":41},"action":"insert","lines":["m"]},{"start":{"row":16,"column":41},"end":{"row":16,"column":42},"action":"insert","lines":["o"]}],[{"start":{"row":35,"column":8},"end":{"row":35,"column":10},"action":"remove","lines":["//"],"id":17},{"start":{"row":35,"column":8},"end":{"row":35,"column":49},"action":"insert","lines":["Schema::dropIfExists('product_category');"]}],[{"start":{"row":35,"column":30},"end":{"row":35,"column":46},"action":"remove","lines":["product_category"],"id":18},{"start":{"row":35,"column":30},"end":{"row":35,"column":48},"action":"insert","lines":["code_promo_product"]}],[{"start":{"row":15,"column":73},"end":{"row":16,"column":56},"action":"remove","lines":["","            $table->increments('code_promo_product_id');"],"id":20}],[{"start":{"row":20,"column":43},"end":{"row":20,"column":55},"action":"remove","lines":["unsigned()->"],"id":23}],[{"start":{"row":20,"column":43},"end":{"row":20,"column":68},"action":"remove","lines":["index('idx_product_id')->"],"id":22}],[{"start":{"row":20,"column":91},"end":{"row":23,"column":26},"action":"remove","lines":["","\t\t\t$table->foreign('product_id')","\t\t\t\t->references('product_id')->on('product')","\t\t\t\t->onDelete('cascade');"],"id":21}]]},"ace":{"folds":[],"scrolltop":60,"scrollleft":0,"selection":{"start":{"row":20,"column":91},"end":{"row":23,"column":26},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":3,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1523359306709,"hash":"bb5b414a05e303d31ac86c6bb11d634c4898d118"}