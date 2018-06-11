{"filter":false,"title":"sidebar.blade.php","tooltip":"/resources/views/admin/layout/sidebar.blade.php","undoManager":{"mark":54,"position":54,"stack":[[{"start":{"row":313,"column":12},"end":{"row":334,"column":19},"action":"insert","lines":["@if(check_user_access(['email-template.index','update_setting', 'setting_update']))","            <li class=\"treeview {{ set_active(['admin/system','admin/system/*','admin/meta_og','admin/meta_og/*', 'admin/epartner','admin/epartner/*','admin/email-template','admin/email-template/*']) }}\">","                <a href=\"#\">","                    <i class=\"fa fa-wrench\"></i>","                    <span>Système</span>","                    <span class=\"pull-right-container\">","                      <i class=\"fa fa-angle-left pull-right\"></i>","                    </span>","                </a>","                <ul class=\"treeview-menu\">","                    @if(check_user_access(['update_setting', 'setting_update']))","                        <li class=\"{{ set_active(['admin/system','admin/system/*']) }}\"><a","                                    href=\"{!! URL::to('/admin/system') !!}\"> <i class=\"fa fa-circle-o\"></i> Meta & OG</a>","                        </li>","                    @endif","                    <!-- @if(check_user_access('email-template.index'))","                        <li class=\"{{ set_active(['admin/email-template','admin/email-template/*']) }}\"><a","                                href=\"{!! URL::to('/admin/email-template') !!}\"><i class=\"fa fa-circle-o\"></i> Email / SMS Modèle</a></li>","                    @endif -->","                </ul>","            </li>","             @endif"],"id":27}],[{"start":{"row":314,"column":32},"end":{"row":314,"column":202},"action":"remove","lines":["{{ set_active(['admin/system','admin/system/*','admin/meta_og','admin/meta_og/*', 'admin/epartner','admin/epartner/*','admin/email-template','admin/email-template/*']) }}"],"id":28}],[{"start":{"row":314,"column":31},"end":{"row":314,"column":32},"action":"remove","lines":[" "],"id":29}],[{"start":{"row":317,"column":26},"end":{"row":317,"column":33},"action":"remove","lines":["Système"],"id":30},{"start":{"row":317,"column":26},"end":{"row":317,"column":27},"action":"insert","lines":["C"]},{"start":{"row":317,"column":27},"end":{"row":317,"column":28},"action":"insert","lines":["o"]},{"start":{"row":317,"column":28},"end":{"row":317,"column":29},"action":"insert","lines":["m"]},{"start":{"row":317,"column":29},"end":{"row":317,"column":30},"action":"insert","lines":["p"]},{"start":{"row":317,"column":30},"end":{"row":317,"column":31},"action":"insert","lines":["t"]},{"start":{"row":317,"column":31},"end":{"row":317,"column":32},"action":"insert","lines":["a"]}],[{"start":{"row":317,"column":32},"end":{"row":317,"column":33},"action":"insert","lines":["b"],"id":31},{"start":{"row":317,"column":33},"end":{"row":317,"column":34},"action":"insert","lines":["i"]},{"start":{"row":317,"column":34},"end":{"row":317,"column":35},"action":"insert","lines":["l"]},{"start":{"row":317,"column":35},"end":{"row":317,"column":36},"action":"insert","lines":["i"]},{"start":{"row":317,"column":36},"end":{"row":317,"column":37},"action":"insert","lines":["t"]},{"start":{"row":317,"column":37},"end":{"row":317,"column":38},"action":"insert","lines":["é"]}],[{"start":{"row":327,"column":26},"end":{"row":331,"column":30},"action":"remove","lines":["","                    <!-- @if(check_user_access('email-template.index'))","                        <li class=\"{{ set_active(['admin/email-template','admin/email-template/*']) }}\"><a","                                href=\"{!! URL::to('/admin/email-template') !!}\"><i class=\"fa fa-circle-o\"></i> Email / SMS Modèle</a></li>","                    @endif -->"],"id":32}],[{"start":{"row":323,"column":20},"end":{"row":323,"column":21},"action":"insert","lines":["/"],"id":33},{"start":{"row":323,"column":21},"end":{"row":323,"column":22},"action":"insert","lines":["/"]}],[{"start":{"row":323,"column":21},"end":{"row":323,"column":22},"action":"remove","lines":["/"],"id":34},{"start":{"row":323,"column":20},"end":{"row":323,"column":21},"action":"remove","lines":["/"]}],[{"start":{"row":325,"column":108},"end":{"row":325,"column":117},"action":"remove","lines":["Meta & OG"],"id":37},{"start":{"row":325,"column":108},"end":{"row":325,"column":109},"action":"insert","lines":["S"]},{"start":{"row":325,"column":109},"end":{"row":325,"column":110},"action":"insert","lines":["o"]},{"start":{"row":325,"column":110},"end":{"row":325,"column":111},"action":"insert","lines":["m"]},{"start":{"row":325,"column":111},"end":{"row":325,"column":112},"action":"insert","lines":["m"]},{"start":{"row":325,"column":112},"end":{"row":325,"column":113},"action":"insert","lines":["e"]},{"start":{"row":325,"column":113},"end":{"row":325,"column":114},"action":"insert","lines":["s"]}],[{"start":{"row":325,"column":114},"end":{"row":325,"column":115},"action":"insert","lines":[" "],"id":38},{"start":{"row":325,"column":115},"end":{"row":325,"column":116},"action":"insert","lines":["d"]},{"start":{"row":325,"column":116},"end":{"row":325,"column":117},"action":"insert","lines":["u"]},{"start":{"row":325,"column":117},"end":{"row":325,"column":118},"action":"insert","lines":["e"]},{"start":{"row":325,"column":118},"end":{"row":325,"column":119},"action":"insert","lines":["s"]}],[{"start":{"row":325,"column":119},"end":{"row":325,"column":120},"action":"insert","lines":[" "],"id":39},{"start":{"row":325,"column":120},"end":{"row":325,"column":121},"action":"insert","lines":["a"]},{"start":{"row":325,"column":121},"end":{"row":325,"column":122},"action":"insert","lines":["u"]},{"start":{"row":325,"column":122},"end":{"row":325,"column":123},"action":"insert","lines":["x"]}],[{"start":{"row":325,"column":123},"end":{"row":325,"column":124},"action":"insert","lines":[" "],"id":40}],[{"start":{"row":325,"column":124},"end":{"row":325,"column":125},"action":"insert","lines":["c"],"id":41},{"start":{"row":325,"column":125},"end":{"row":325,"column":126},"action":"insert","lines":["o"]},{"start":{"row":325,"column":126},"end":{"row":325,"column":127},"action":"insert","lines":["m"]},{"start":{"row":325,"column":127},"end":{"row":325,"column":128},"action":"insert","lines":["m"]},{"start":{"row":325,"column":128},"end":{"row":325,"column":129},"action":"insert","lines":["e"]},{"start":{"row":325,"column":129},"end":{"row":325,"column":130},"action":"insert","lines":["r"]}],[{"start":{"row":325,"column":130},"end":{"row":325,"column":131},"action":"insert","lines":["ç"],"id":42},{"start":{"row":325,"column":131},"end":{"row":325,"column":132},"action":"insert","lines":["a"]},{"start":{"row":325,"column":132},"end":{"row":325,"column":133},"action":"insert","lines":["n"]},{"start":{"row":325,"column":133},"end":{"row":325,"column":134},"action":"insert","lines":["t"]}],[{"start":{"row":325,"column":134},"end":{"row":325,"column":135},"action":"insert","lines":["s"],"id":43}],[{"start":{"row":325,"column":124},"end":{"row":325,"column":135},"action":"remove","lines":["commerçants"],"id":44},{"start":{"row":325,"column":124},"end":{"row":325,"column":125},"action":"insert","lines":["m"]},{"start":{"row":325,"column":125},"end":{"row":325,"column":126},"action":"insert","lines":["a"]},{"start":{"row":325,"column":126},"end":{"row":325,"column":127},"action":"insert","lines":["r"]},{"start":{"row":325,"column":127},"end":{"row":325,"column":128},"action":"insert","lines":["c"]},{"start":{"row":325,"column":128},"end":{"row":325,"column":129},"action":"insert","lines":["h"]},{"start":{"row":325,"column":129},"end":{"row":325,"column":130},"action":"insert","lines":["a"]},{"start":{"row":325,"column":130},"end":{"row":325,"column":131},"action":"insert","lines":["n"]}],[{"start":{"row":325,"column":131},"end":{"row":325,"column":132},"action":"insert","lines":["r"],"id":45}],[{"start":{"row":325,"column":131},"end":{"row":325,"column":132},"action":"remove","lines":["r"],"id":46}],[{"start":{"row":325,"column":131},"end":{"row":325,"column":132},"action":"insert","lines":["d"],"id":47},{"start":{"row":325,"column":132},"end":{"row":325,"column":133},"action":"insert","lines":["s"]}],[{"start":{"row":316,"column":36},"end":{"row":316,"column":42},"action":"remove","lines":["wrench"],"id":50},{"start":{"row":316,"column":36},"end":{"row":316,"column":37},"action":"insert","lines":["s"]},{"start":{"row":316,"column":37},"end":{"row":316,"column":38},"action":"insert","lines":["u"]},{"start":{"row":316,"column":38},"end":{"row":316,"column":39},"action":"insert","lines":["i"]},{"start":{"row":316,"column":39},"end":{"row":316,"column":40},"action":"insert","lines":["t"]}],[{"start":{"row":316,"column":40},"end":{"row":316,"column":41},"action":"insert","lines":["c"],"id":51},{"start":{"row":316,"column":41},"end":{"row":316,"column":42},"action":"insert","lines":["a"]},{"start":{"row":316,"column":42},"end":{"row":316,"column":43},"action":"insert","lines":["s"]},{"start":{"row":316,"column":43},"end":{"row":316,"column":44},"action":"insert","lines":["e"]}],[{"start":{"row":314,"column":31},"end":{"row":314,"column":202},"action":"insert","lines":[" {{ set_active(['admin/system','admin/system/*','admin/meta_og','admin/meta_og/*', 'admin/epartner','admin/epartner/*','admin/email-template','admin/email-template/*']) }}"],"id":52}],[{"start":{"row":314,"column":113},"end":{"row":314,"column":197},"action":"remove","lines":[" 'admin/epartner','admin/epartner/*','admin/email-template','admin/email-template/*'"],"id":53},{"start":{"row":314,"column":112},"end":{"row":314,"column":113},"action":"remove","lines":[","]}],[{"start":{"row":314,"column":61},"end":{"row":314,"column":111},"action":"remove","lines":[",'admin/system/*','admin/meta_og','admin/meta_og/*"],"id":54}],[{"start":{"row":314,"column":61},"end":{"row":314,"column":62},"action":"remove","lines":["'"],"id":55}],[{"start":{"row":314,"column":54},"end":{"row":314,"column":60},"action":"remove","lines":["system"],"id":56},{"start":{"row":314,"column":54},"end":{"row":314,"column":55},"action":"insert","lines":["a"]},{"start":{"row":314,"column":55},"end":{"row":314,"column":56},"action":"insert","lines":["c"]}],[{"start":{"row":314,"column":54},"end":{"row":314,"column":56},"action":"remove","lines":["ac"],"id":57},{"start":{"row":314,"column":54},"end":{"row":314,"column":61},"action":"insert","lines":["account"]}],[{"start":{"row":314,"column":61},"end":{"row":314,"column":62},"action":"insert","lines":["i"],"id":58},{"start":{"row":314,"column":62},"end":{"row":314,"column":63},"action":"insert","lines":["n"]},{"start":{"row":314,"column":63},"end":{"row":314,"column":64},"action":"insert","lines":["g"]}],[{"start":{"row":325,"column":62},"end":{"row":325,"column":68},"action":"remove","lines":["system"],"id":59},{"start":{"row":325,"column":62},"end":{"row":325,"column":63},"action":"insert","lines":["a"]},{"start":{"row":325,"column":63},"end":{"row":325,"column":64},"action":"insert","lines":["c"]}],[{"start":{"row":325,"column":62},"end":{"row":325,"column":64},"action":"remove","lines":["ac"],"id":60},{"start":{"row":325,"column":62},"end":{"row":325,"column":72},"action":"insert","lines":["accounting"]}],[{"start":{"row":324,"column":64},"end":{"row":324,"column":81},"action":"remove","lines":[",'admin/system/*'"],"id":61}],[{"start":{"row":324,"column":57},"end":{"row":324,"column":63},"action":"remove","lines":["system"],"id":62},{"start":{"row":324,"column":57},"end":{"row":324,"column":58},"action":"insert","lines":["a"]},{"start":{"row":324,"column":58},"end":{"row":324,"column":59},"action":"insert","lines":["c"]},{"start":{"row":324,"column":59},"end":{"row":324,"column":60},"action":"insert","lines":["c"]},{"start":{"row":324,"column":60},"end":{"row":324,"column":61},"action":"insert","lines":["o"]},{"start":{"row":324,"column":61},"end":{"row":324,"column":62},"action":"insert","lines":["u"]}],[{"start":{"row":324,"column":57},"end":{"row":324,"column":62},"action":"remove","lines":["accou"],"id":63},{"start":{"row":324,"column":57},"end":{"row":324,"column":67},"action":"insert","lines":["accounting"]}],[{"start":{"row":313,"column":12},"end":{"row":313,"column":95},"action":"remove","lines":["@if(check_user_access(['email-template.index','update_setting', 'setting_update']))"],"id":64}],[{"start":{"row":330,"column":13},"end":{"row":330,"column":19},"action":"remove","lines":["@endif"],"id":65},{"start":{"row":330,"column":12},"end":{"row":330,"column":13},"action":"remove","lines":[" "]}],[{"start":{"row":323,"column":20},"end":{"row":323,"column":80},"action":"remove","lines":["@if(check_user_access(['update_setting', 'setting_update']))"],"id":66}],[{"start":{"row":327,"column":20},"end":{"row":327,"column":26},"action":"remove","lines":["@endif"],"id":67}],[{"start":{"row":325,"column":34},"end":{"row":325,"column":35},"action":"remove","lines":[" "],"id":68},{"start":{"row":325,"column":33},"end":{"row":325,"column":34},"action":"remove","lines":[" "]},{"start":{"row":325,"column":32},"end":{"row":325,"column":33},"action":"remove","lines":[" "]},{"start":{"row":325,"column":28},"end":{"row":325,"column":32},"action":"remove","lines":["    "]},{"start":{"row":325,"column":24},"end":{"row":325,"column":28},"action":"remove","lines":["    "]}],[{"start":{"row":325,"column":24},"end":{"row":325,"column":28},"action":"insert","lines":["    "],"id":69}],[{"start":{"row":313,"column":12},"end":{"row":313,"column":95},"action":"insert","lines":["@if(check_user_access(['email-template.index','update_setting', 'setting_update']))"],"id":70}],[{"start":{"row":330,"column":12},"end":{"row":330,"column":13},"action":"insert","lines":["@"],"id":71},{"start":{"row":330,"column":13},"end":{"row":330,"column":14},"action":"insert","lines":["e"]},{"start":{"row":330,"column":14},"end":{"row":330,"column":15},"action":"insert","lines":["n"]}],[{"start":{"row":330,"column":13},"end":{"row":330,"column":15},"action":"remove","lines":["en"],"id":72},{"start":{"row":330,"column":13},"end":{"row":330,"column":18},"action":"insert","lines":["endif"]}],[{"start":{"row":313,"column":36},"end":{"row":313,"column":56},"action":"remove","lines":["email-template.index"],"id":73},{"start":{"row":313,"column":36},"end":{"row":313,"column":52},"action":"insert","lines":["accounting_table"]}],[{"start":{"row":313,"column":53},"end":{"row":313,"column":88},"action":"remove","lines":[",'update_setting', 'setting_update'"],"id":74}],[{"start":{"row":323,"column":20},"end":{"row":323,"column":64},"action":"insert","lines":["@if(check_user_access(['accounting_table']))"],"id":75}],[{"start":{"row":327,"column":20},"end":{"row":327,"column":21},"action":"insert","lines":["@"],"id":76},{"start":{"row":327,"column":21},"end":{"row":327,"column":22},"action":"insert","lines":["e"]},{"start":{"row":327,"column":22},"end":{"row":327,"column":23},"action":"insert","lines":["n"]},{"start":{"row":327,"column":23},"end":{"row":327,"column":24},"action":"insert","lines":["d"]},{"start":{"row":327,"column":24},"end":{"row":327,"column":25},"action":"insert","lines":["i"]},{"start":{"row":327,"column":25},"end":{"row":327,"column":26},"action":"insert","lines":["f"]}],[{"start":{"row":313,"column":53},"end":{"row":313,"column":54},"action":"insert","lines":[","],"id":77},{"start":{"row":313,"column":54},"end":{"row":313,"column":55},"action":"insert","lines":["'"]}],[{"start":{"row":313,"column":55},"end":{"row":313,"column":77},"action":"insert","lines":["accounting_table_reset"],"id":78}],[{"start":{"row":313,"column":77},"end":{"row":313,"column":78},"action":"insert","lines":["'"],"id":79}],[{"start":{"row":323,"column":61},"end":{"row":323,"column":62},"action":"insert","lines":[","],"id":80}],[{"start":{"row":323,"column":62},"end":{"row":323,"column":63},"action":"insert","lines":[" "],"id":81}],[{"start":{"row":323,"column":62},"end":{"row":323,"column":63},"action":"remove","lines":[" "],"id":82}],[{"start":{"row":323,"column":62},"end":{"row":323,"column":63},"action":"insert","lines":["'"],"id":83}],[{"start":{"row":323,"column":63},"end":{"row":323,"column":85},"action":"insert","lines":["accounting_table_reset"],"id":84}],[{"start":{"row":323,"column":85},"end":{"row":323,"column":86},"action":"insert","lines":["'"],"id":85}]]},"ace":{"folds":[],"scrolltop":4291,"scrollleft":0,"selection":{"start":{"row":323,"column":86},"end":{"row":323,"column":86},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1528456825115,"hash":"c078a6b4ef2d3d5c756aa62389949301e2978f25"}