{"filter":false,"title":"2018_05_16_074845_update_order_item_table_add_column_date.php","tooltip":"/database/migrations/2018_05_16_074845_update_order_item_table_add_column_date.php","undoManager":{"mark":9,"position":9,"stack":[[{"start":{"row":15,"column":8},"end":{"row":15,"column":10},"action":"remove","lines":["//"],"id":2},{"start":{"row":15,"column":8},"end":{"row":29,"column":11},"action":"insert","lines":["Schema::create('order', function (Blueprint $table) {","            $table->increments('order_id');","\t\t\t$table->text('server_info')->nullable();","\t\t\t$table->integer('user_id')->index('idx_user_id')->unsigned()->nullable();","\t\t\t$table->foreign('user_id')","\t\t\t\t->references('user_id')->on('users')","\t\t\t\t->onDelete('set null');","\t\t\t$table->timestamp('order_date');","\t\t\t$table->integer('order_status_id')->index('idx_order_status_id')->unsigned()->nullable();","\t\t\t$table->decimal('subtotal',12,2);","\t\t\t$table->decimal('discount',12,2);","\t\t\t$table->decimal('tax',12,2);","\t\t\t$table->decimal('total',12,2);","\t\t\t$table->text('other_info')->nullable();","        });"]}],[{"start":{"row":15,"column":29},"end":{"row":15,"column":30},"action":"insert","lines":["_"],"id":3},{"start":{"row":15,"column":30},"end":{"row":15,"column":31},"action":"insert","lines":["i"]},{"start":{"row":15,"column":31},"end":{"row":15,"column":32},"action":"insert","lines":["t"]},{"start":{"row":15,"column":32},"end":{"row":15,"column":33},"action":"insert","lines":["e"]},{"start":{"row":15,"column":33},"end":{"row":15,"column":34},"action":"insert","lines":["m"]}],[{"start":{"row":15,"column":16},"end":{"row":15,"column":22},"action":"remove","lines":["create"],"id":4},{"start":{"row":15,"column":16},"end":{"row":15,"column":17},"action":"insert","lines":["t"]},{"start":{"row":15,"column":17},"end":{"row":15,"column":18},"action":"insert","lines":["a"]},{"start":{"row":15,"column":18},"end":{"row":15,"column":19},"action":"insert","lines":["b"]},{"start":{"row":15,"column":19},"end":{"row":15,"column":20},"action":"insert","lines":["l"]},{"start":{"row":15,"column":20},"end":{"row":15,"column":21},"action":"insert","lines":["e"]}],[{"start":{"row":16,"column":12},"end":{"row":22,"column":3},"action":"remove","lines":["$table->increments('order_id');","\t\t\t$table->text('server_info')->nullable();","\t\t\t$table->integer('user_id')->index('idx_user_id')->unsigned()->nullable();","\t\t\t$table->foreign('user_id')","\t\t\t\t->references('user_id')->on('users')","\t\t\t\t->onDelete('set null');","\t\t\t"],"id":5}],[{"start":{"row":17,"column":3},"end":{"row":22,"column":42},"action":"remove","lines":["$table->integer('order_status_id')->index('idx_order_status_id')->unsigned()->nullable();","\t\t\t$table->decimal('subtotal',12,2);","\t\t\t$table->decimal('discount',12,2);","\t\t\t$table->decimal('tax',12,2);","\t\t\t$table->decimal('total',12,2);","\t\t\t$table->text('other_info')->nullable();"],"id":6}],[{"start":{"row":17,"column":3},"end":{"row":18,"column":0},"action":"remove","lines":["",""],"id":7},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "]},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "]},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "]},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "]}],[{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "],"id":8},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "]},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "]},{"start":{"row":17,"column":3},"end":{"row":17,"column":4},"action":"remove","lines":[" "]}],[{"start":{"row":17,"column":2},"end":{"row":17,"column":3},"action":"remove","lines":["\t"],"id":9}],[{"start":{"row":16,"column":36},"end":{"row":16,"column":37},"action":"insert","lines":["_"],"id":10},{"start":{"row":16,"column":37},"end":{"row":16,"column":38},"action":"insert","lines":["i"]},{"start":{"row":16,"column":38},"end":{"row":16,"column":39},"action":"insert","lines":["t"]}],[{"start":{"row":16,"column":39},"end":{"row":16,"column":40},"action":"insert","lines":["e"],"id":11},{"start":{"row":16,"column":40},"end":{"row":16,"column":41},"action":"insert","lines":["m"]}]]},"ace":{"folds":[],"scrolltop":180,"scrollleft":0,"selection":{"start":{"row":18,"column":5},"end":{"row":18,"column":5},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":2,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1526457060200,"hash":"242718258f813dfe379b4820821de3299dc7d258"}