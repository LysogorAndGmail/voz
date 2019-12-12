<script type="text/javascript">
    if (window.Zepto) {
        jQuery = Zepto;
        (function ($) {
            if ($) {
                $.fn.prop = $.fn.attr;
            }
        } (jQuery));
    }

    $(document).ready(function () {

        var $statelist, $usamap, ratio,
        mapsterConfigured = function () {
            // set html settings values
            var opts = $usamap.mapster('get_options', null, true);
            if (!ratio) {
                ratio = $usamap.width() / $usamap.height();
            }
            $('#stroke_highlight').prop("checked", opts.render_highlight.stroke);
            $('#strokewidth_highlight').val(opts.render_highlight.strokeWidth);
            $('#fill_highlight').val(opts.render_highlight.fillOpacity);
            $('#strokeopacity_highlight').val(opts.render_highlight.strokeOpacity);
            $('#stroke_select').prop("checked", opts.render_select.stroke);
            $('#strokewidth_select').val(opts.render_select.strokeWidth);
            $('#fill_select').val(opts.render_select.fillOpacity);
            $('#strokeopacity_select').val(opts.render_select.strokeOpacity);
            $('#mouseout-delay').val(opts.mouseoutDelay);
            $('#img_width').val($usamap.width());
        },
        default_options =
        {
            fillOpacity: 0.5,
            render_highlight: {
                fillColor: '2aff00',
                stroke: true
            },
            render_select: {
                fillColor: 'ff000c',
                stroke: false
            },
            //render_zoom: {
            //    altImage: 'images/usa_map_huge.jpg'
            //},
            mouseoutDelay: 0,
            fadeInterval: 50,
            isSelectable: true,
            singleSelect: false,
            mapKey: 'state',
            mapValue: 'full',
            listKey: 'name',
            listSelectedAttribute: 'checked',
            sortList: "asc",
            onGetList: addCheckBoxes,
            //onClick: function (e) {
            //    styleCheckbox(e.selected, e.listTarget);
            //    if (!utils.isScrolledIntoView(e.listTarget, false, $statelist)) {
            //        utils.centerOn($statelist, e.listTarget);
            //    }
                //if (e.key==='OH') {
                //    $usamap.mapster('zoom','OH');
                //     return false;
                //}
             //   return true;
            //},
            onConfigured: mapsterConfigured,
            showToolTip: false,
            toolTipClose: ["area-mouseout"],
            areas: [
                { key: "TX",
                    toolTip: $('<div>Don\'t mess with Texas. Why? <a href="http://dontmesswithtexas.org/" target="_blank">Click here</a> for more info.</div>')

                },
                { key: "ME",
                    toolTip: $('<div style="margin:auto; width:100px;"><img src="images/lobster-small.gif"/></div><div style="clear:both;"></div><p>Trees, ocean, lobsters, it\'s all here.</p>'),
                    selected: true

                },
                { key: "AK",
                    toolTip: "Alaska.. wild, and cold. And, you cannot select this area, but you can see the tooltip.",
                    isSelectable: false
                },
                { key: "WA",
                    staticState: true
                },
                { key: "OR",
                    staticState: false
                }
                ]
        };

        function styleCheckbox(selected, $checkbox) {
            var nowWeight = selected ? "bold" : "normal";
            $checkbox.closest('div').css("font-weight", nowWeight);
        }
        
        function addCheckBoxes(items) {
            var item, selected;
            $statelist.children().remove();
            for (var i = 0; i < items.length; i++) {
                selected = items[i].isSelected();
                item = $('<div><input type="checkbox" name="' + items[i].key + '"' + (selected ? "checked" : "") + '><span class="sel" key="' + items[i].key + '">' + items[i].value + '</span></div>');

                $statelist.append(item);
            }
            $statelist.find('span.sel').unbind('click').bind('click', function (e) {
                var key = $(this).attr('key');
                $usamap.mapster('highlight', true, key);
            });
            // return the list to mapster so it can bind to it
            return $statelist.find('input[type="checkbox"]').unbind('click').click(function (e) {
                var selected = $(this).is(':checked');
                $usamap.mapster('set', selected, $(this).attr('name'));
                styleCheckbox(selected, $(this));
            });
        }
        $statelist = $('#statelist');
        $usamap = $('#usa_image');
        function bindlinks() {
            $('*').unbind();
            $("#unbind_link").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster("unbind");
                $usamap.width(720);
                bindlinks();
            });
            $("#rebind_link").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster(default_options);
            });

            $("#unbind_link_preserve").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster("unbind", true);
                bindlinks();
            });
            $("#tooltip").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').showToolTip;
                $('#tooltip_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { showToolTip: state });
            });
            $("#show_selected").bind("click", function (e) {
                e.preventDefault();
                $('#selections').text($("#usa_image").mapster("get"));
            });
            $("#single_select").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').singleSelect;
                $('#single_select_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { singleSelect: state });
            });
            $("#is_deselectable").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').isDeselectable;
                $('#is_deselectable_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { isDeselectable: state });
            });
            function getSelected(sel) {
            	var item=$();
            	sel.each(function() {
            		if (this.selected) {
            			item=item.add(this);
            			return false;
            		}

                });
                return item;

            }
            function getFillOptions(el) {
                var new_options,
					val = getSelected($(el).find("option")).val();

                if (val > "0") {
                    new_options = {
						altImage: 'images/usa_map_720_alt_' + val + '.jpg',
						stroke: true
					};
                } else {
                    new_options = {
						altImage: null,
						stroke: false
                    };
                }
                return new_options;
            }

            function getNewOptions() {
                var options,
                    render_highlight = getFillOptions($('#highlight_style')),
                    render_select = getFillOptions($('#select_style'));

                options = $.extend({},
                	default_options,
                	{
                		render_select: render_select,
	                	render_highlight: render_highlight
                	});

                return options;

            }
            $("#highlight_style, #select_style").bind("change", function (e) {
                e.preventDefault();
                $statelist.children().remove();

                $usamap.mapster(getNewOptions());

            });
            $("#update").click(function (e) {
                var newOpts = {};
                function setOption(base, opt, value) {
                    if (value !== '' && value !== null) {
                        base[opt] = value;
                    }
                }
                e.preventDefault();
                newOpts.render_highlight = {};
                setOption(newOpts.render_highlight, "stroke", $('#stroke_highlight').prop("checked"));

                setOption(newOpts.render_highlight, "strokeWidth", $('#strokewidth_highlight').val());
                setOption(newOpts.render_highlight, "fillOpacity", $('#fill_highlight').val());
                setOption(newOpts.render_highlight, "strokeOpacity", $('#strokeopacity_highlight').val());

                newOpts.render_select = {};
                setOption(newOpts.render_select, "stroke", $('#stroke_select').prop("checked"));
                setOption(newOpts.render_select, "strokeWidth", $('#strokewidth_select').val());
                setOption(newOpts.render_select, "fillOpacity", $('#fill_select').val());
                setOption(newOpts.render_select, "strokeOpacity", $('#strokeopacity_select').val());
                setOption(newOpts, "mouseoutDelay", $('#mouseout-delay').val());
                var width = parseInt($('#img_width').val(), 10);

                if ($usamap.width() != width) {
                    $('#update').prop("disabled",true);
                    $usamap.mapster('resize', width, null, 1000,function() {
                        $('#update').prop("disabled",false);
                    });
                } else {
                    $usamap.mapster('set_options', newOpts);
                }

            });

        }

        bindlinks();
        $usamap.mapster(default_options);


        $('#dep_okr').keyup(function(){
            $.ajax({
                url: '/ajax_dep',
                type: 'POST',
                data: {search_ajax: $(this).val()},
                error: function(){
                    alert('errror');
                },
                success: function(data) {
                    //alert(data);
                    $('#dep_ajax').html(data);
                }  
            });
        });


    });

           var utils = {};
           // Tells if an element is completely visible. if the 2nd parm is true, it only looks at the top.

           utils.isScrolledIntoView = function (elem, topOnly, container) {
               var useWindow = false, docViewTop, docViewBottom, elemTop, elemBottom;

               if (!container) {
                   container = window;
                   useWindow = true;
               }
               if (useWindow) {
                   docViewTop = $(container).scrollTop();
                   elemTop = elem.offset().top;
               } else {
                   docViewTop = 0;
                   elemTop = elem.position().top;
               }
               docViewBottom = docViewTop + $(container).height();
               elemBottom = elemTop + elem.height();
               if (topOnly) {
                   return elemTop >= docViewTop && elemTop <= docViewBottom;
               } else {
                   return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
               }
           };
           utils.centerOn = function ($container, $element) {
               $container.animate({
                   scrollTop: $element.position().top - ($container.height() / 2)
               }, 'slow');
           };

           
</script>

<div class="main">
    <div class="container_24">
        <div class="show_deputat">
            <!-- -->
            <div id="ser_dep">
            <span id="dep_ajax" style="color: red;"></span>
                <p style="font-size: 20px;">Пошук депутата по виборчій дільниці:<input id="dep_okr" type="text" name="dep_okr" style="margin-top:-5px;" value="" /></p>
            </div>    
            <div id="map_demo" style="">
            	<div style="width:720px; border:0; overflow: hidden; float:left;">
            		<img style="width:720px;border:0;" id="usa_image" src="<?php echo Kohana::$base_url;?>images/usa_map_720.jpg" usemap="#usa" />
            	</div>
                <form action="/deputat/search_dep" method="POST">
                <div id="statelist" style="float:left; padding-left: 10px; width:222px; height: 445px; overflow-y: auto; white-space: nowrap; display: none;"></div>
                <p style="text-align: center;"><input type="submit" value="Детальніше" /></p>
                <div style="width: 220px; float: right; height: 389px; overflow: auto;">
                    <? $res = DB::select()->from('dep_megi')->execute()->as_array(); $res =  array();
                     foreach($res as $r) {?>
                     <li><p><a href="/deputat/dep?dep_id=<?=$r['dep_id'];?>"><?=$r['dep_name'];?></a></p></li>
                     <?}?>
                     
                </div>
                
                <div style="clear:both; height:8px;"></div>
            </div>
                </form>
            
            <map id="usa_image_map" name="usa">
            <!-- -->
                <AREA SHAPE="POLY" state="A" full="Бабій Наталія Борисівна" COORDS="7,41,13,45,18,49,25,53,35,60,46,70,51,72,58,75,62,76,68,82,70,91,73,107,75,118,75,131,74,134,40,134,30,129,16,120,15,113,14,94,6,75,4,62,4,46,5,42,7,41,7,40,15,48,11,43,8,41" HREF="/" ALT="19">
                <AREA SHAPE="POLY" state="B" full="Путієнко Сергій Павлович" COORDS="458,209,465,225,472,245,472,274,467,294,465,301,455,325,452,335,452,356,455,366,462,369,465,372,465,382,462,386,441,387,438,380,435,380,434,376,418,351,409,329,398,333,392,337,391,333,389,302,378,268,364,248,359,239,358,228,362,222,395,219,404,215,427,214,442,209,457,209,458,210" HREF="/" ALT="7">
                <AREA SHAPE="POLY" state="C" full="Новосадова Тетяна Петрівна" COORDS="392,336,402,331,408,330,411,333,414,346,418,353,425,362,430,368,432,372,435,379,434,381,419,380,413,382,404,385,398,383,391,363,388,360,388,344,392,336,394,335" HREF="/" ALT="8">
                <AREA SHAPE="POLY" state="D" full="Балабушко Тетяна Миколаївна" COORDS="388,364,375,365,373,366,370,370,368,378,366,389,366,423,368,425,369,427,371,430,372,431,379,423,389,407,396,404,401,402,408,396,433,396,437,396,441,386,438,382,435,380,420,380,404,385,398,383,391,366,389,364,385,364" HREF="/" ALT="9">
                <AREA SHAPE="POLY" state="E" full="Алексєєва  Лідія Миколаївна" COORDS="465,389,477,388,485,384,499,382,502,382,514,376,525,376,535,375,540,373,560,360,593,360,604,369,608,380,607,384,591,404,586,414,578,417,569,419,566,422,563,424,558,444,556,447,525,447,519,449,515,453,511,466,505,479,506,485,504,486,490,492,488,495,486,498,484,506,475,495,464,475,461,470,461,408,460,403,460,398,464,395,464,391,465,388" HREF="/" ALT="10">
                <AREA SHAPE="POLY" state="S" full="Піпія Мурман Несторович" COORDS="462,386,465,388,464,392,463,394,461,397,459,399,459,403,460,406,461,408,460,433,460,470,463,474,468,485,475,497,481,503,483,507,473,521,470,522,460,509,454,493,448,479,436,461,434,457,429,444,426,441,421,443,416,446,406,449,385,461,366,461,360,448,359,439,368,434,371,431,382,417,389,408,402,402,409,396,414,396,438,396,442,387,454,385,462,386" HREF="/" ALT="6">
                <AREA SHAPE="POLY" state="F" full="Гержов Василь Григорович" COORDS="427,442,432,448,433,455,438,465,444,473,449,480,452,489,455,498,458,506,462,511,462,513,466,516,468,519,469,523,457,530,453,535,452,550,453,555,455,559,456,563,454,566,449,566,431,563,422,562,391,512,382,506,377,506,369,505,376,499,377,489,374,479,372,470,367,465,366,461,369,460,385,461,395,456,409,448,415,447,424,442,427,441" HREF="/" ALT="13">
                <AREA SHAPE="POLY" state="J" full="Настоящий  Ілля Архипович" COORDS="506,485,513,490,516,494,518,503,518,511,518,523,520,527,524,540,528,545,532,559,531,569,530,573,520,592,519,601,519,609,518,616,501,622,494,624,485,628,481,630,478,631,472,640,455,625,450,614,451,609,455,599,455,579,455,558,453,550,452,537,454,532,457,528,469,523,472,522,476,520,484,506,486,501,489,494,492,490,498,488,507,486" HREF="/" ALT="5">
                <AREA SHAPE="POLY" state="G" full="Нечипорук Інна Миколаївна" COORDS="520,514,534,513,538,516,546,525,552,527,557,531,559,535,558,542,560,547,570,560,575,572,576,582,577,596,576,605,572,614,567,619,562,620,561,631,563,635,569,642,572,647,571,656,561,663,557,665,543,675,529,680,519,687,500,688,478,660,472,651,472,639,479,631,490,626,503,621,516,617,519,614,519,611,519,594,521,587,529,575,532,567,529,549,526,541,523,535,519,524,518,520,520,514" HREF="/" ALT="4">
                <AREA SHAPE="POLY" state="Y" full="Семеновський  Сергій Миколайович" COORDS="560,535,567,527,573,527,585,524,596,529,603,533,608,534,624,551,628,560,634,574,637,584,639,592,646,599,665,607,683,634,687,650,688,653,643,669,611,688,576,708,555,722,533,735,520,735,516,731,516,716,518,713,527,712,534,712,538,708,542,699,543,690,543,681,544,674,560,662,568,662,573,650,572,645,566,635,562,633,561,625,561,623,569,615,576,604,577,595,576,572,567,557,558,545,558,540,560,534" HREF="/" ALT="3">
                <AREA SHAPE="POLY" state="Q" full="Козюра Михайло Іванович" COORDS="687,654,693,655,692,676,671,690,669,693,668,697,679,714,690,735,692,744,695,754,695,762,671,776,658,778,656,779,658,791,663,805,661,808,657,812,623,800,611,780,609,775,597,758,592,758,587,766,580,770,568,777,560,788,550,784,549,776,534,771,530,766,520,747,515,744,526,736,530,735,554,722,577,708,586,704,622,683,643,669,688,653,689,653" HREF="/" ALT="2">
                <AREA SHAPE="POLY" state="W" full="Горбова Віра Іванівна" COORDS="778,872,776,871,762,869,745,865,731,853,729,849,680,819,667,815,658,814,654,811,623,800,610,776,599,761,597,758,593,759,589,762,586,767,578,770,576,773,571,775,568,777,561,787,559,789,550,814,547,824,548,830,552,833,584,842,608,855,613,865,619,869,621,870,640,864,647,863,660,862,672,858,678,857,680,857,701,872,701,876,717,885,726,885,743,891,757,889,759,891,766,892,772,893,779,893,785,893,786,884,786,879,786,875,776,871" HREF="/" ALT="1">
                <AREA SHAPE="POLY" state="R" full="Гончаренко Ольга Іванівна" COORDS="471,648,475,659,476,661,485,668,495,682,500,690,511,689,519,688,525,684,532,680,539,677,542,676,543,686,543,690,543,700,539,706,536,710,529,711,521,713,515,715,512,717,510,722,509,735,504,742,496,749,488,751,473,752,457,752,446,752,439,745,428,711,427,706,447,698,457,694,460,685,460,679,452,666,452,661,454,657,472,649,472,650" HREF="/" ALT="11">
                <AREA SHAPE="POLY" state="T" full="Цвіро Ольга Іванівна" COORDS="422,561,441,564,446,566,454,564,456,566,455,591,455,599,454,604,451,611,451,616,451,621,455,624,459,628,462,632,466,636,468,638,471,640,472,643,472,648,471,649,455,657,454,660,451,661,446,653,444,648,444,646,414,645,413,643,408,641,406,635,405,631,405,592,405,587,406,584,407,581,411,576,414,571,416,566,418,564,423,561" HREF="/" ALT="12">
                <AREA SHAPE="POLY" state="U" full="Ольхов Олександр Віталійович" COORDS="405,584,405,588,405,592,405,599,405,605,405,612,405,619,405,623,404,632,406,636,408,641,408,643,385,646,376,646,366,646,359,646,356,648,350,650,346,652,342,652,334,652,331,649,326,647,313,599,311,593,311,562,314,558,318,555,342,555,348,555,349,558,349,562,348,567,351,575,352,578,353,583,358,586,366,589,372,590,376,589,381,586,386,586,390,585,392,585,400,585,406,585,406,585" HREF="/" ALT="14">
                <AREA SHAPE="POLY" state="I" full="Туркоман Тетяна Миколаївна" COORDS="370,505,385,506,389,508,395,513,399,524,403,532,407,538,411,544,416,550,417,555,420,561,422,562,417,565,415,568,411,573,407,579,406,584,389,586,381,586,373,587,369,588,364,588,355,585,353,583,352,579,351,576,349,572,347,566,347,562,347,555,347,553,341,553,317,554,313,557,312,558,309,555,308,553,272,544,273,539,276,536,280,534,289,535,292,532,301,528,304,526,345,513,350,513,353,513,370,505,371,505" HREF="/" ALT="18">
                <AREA SHAPE="POLY" state="O" full="Албур Микола Степанович" COORDS="359,438,360,443,362,453,363,458,369,467,372,471,374,478,378,489,378,493,376,499,373,505,367,507,316,522,298,529,289,534,278,535,274,538,270,542,266,541,260,541,259,541,243,549,237,556,226,569,215,569,205,563,197,559,148,523,145,519,146,513,148,510,181,510,198,510,212,505,226,505,265,490,273,464,283,458,297,455,324,456,333,439,337,438,360,438" HREF="/" ALT="17">
                <AREA SHAPE="POLY" state="P" full="Чаєвська Галина Петрівна" COORDS="312,557,311,594,312,600,315,607,322,625,324,631,327,639,330,647,330,652,326,656,321,658,319,662,317,666,317,672,316,686,316,693,313,700,306,704,295,708,286,706,271,701,268,698,241,676,223,662,201,656,198,650,226,618,239,597,241,593,241,588,229,578,227,569,227,564,245,549,256,542,265,540,274,543,285,547,303,551,309,554,312,560" HREF="/" ALT="15">
                <AREA SHAPE="POLY" state="L" full="Варзар Наталія Миколаївна" COORDS="57,532,64,531,68,529,79,513,83,510,96,504,119,506,134,515,139,521,142,524,149,523,161,534,194,557,203,561,212,563,213,567,218,569,224,569,228,568,228,574,231,577,237,582,243,588,241,594,237,598,234,605,231,613,229,617,225,620,219,622,220,625,213,635,209,639,206,644,204,647,201,651,197,651,179,645,169,636,167,632,159,627,156,624,140,611,138,608,110,590,99,585,69,571,62,562,56,550,55,545,57,532" HREF="/" ALT="16">
            <!-- -->
            </map>
            <!-- -->
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>