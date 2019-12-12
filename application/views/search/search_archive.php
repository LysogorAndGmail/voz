<script type="text/javascript">
$(document).ready(function(){
    $('#search_ajax').keyup(function(){
    $.ajax({
    url: "/search/sa_ar",
    type:'post',
  data: {search_ajax:$(this).val()},
  success: function( data ) {
    $("#sr").html(data);
  },
  error: function() {
    alert('error');
  }
});
})

}) //////


</script>
<div class="main">
    <div class="show_page_text">
        <form method="POST">
        <table cellpadding="5" cellspacing="0" border="0" align="center" width="95%">
            <tbody>
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
                <form action="" method="post"></form>
                <input type="hidden" name="action" value="search">
                <tr>
                    <td align="right">Документ з:</td>
                    <td align="left">
                        <select name="typeid" class="inputs">
                            <option value="2">Рішення виконавчого комітету</option>
                            <option value="1">Рішення міської ради</option>
                            <option value="3">Розпорядження міського голови</option>
                        </select>
                    </td>
                </tr>
                
                <tr><td height="5"></td></tr>
                <tr>
                    <td align="right">По слову з назви:</td>
                    <td align="left"><input type="text" name="header" class="inputs" size="20" value="<? if(!empty($_POST['header'])){echo $_POST['header'];}?>"></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td align="right">По номеру документа:</td><td align="left"><input type="text" name="docnum" class="inputs" size="20" value="<? if(!empty($_POST['docnum'])){echo $_POST['docnum'];}?>"></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td align="right">По слову з тексту:</td>
                    <td align="left"><input type="text" name="doctext" class="inputs" size="40"/></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td align="right">По даті, від</td>
                    <td align="left">
                    <select name="days_in" id="days_in">
    					<option value="0">-</option>
    					<option value="1">1</option>
    					<option value="2">2</option>
    					<option value="3">3</option>
    					<option value="4">4</option>
    					<option value="5">5</option>
    					<option value="6">6</option>
    					<option value="7">7</option>
    					<option value="8">8</option>
    					<option value="9">9</option>
    					<option value="10">10</option>
    					<option value="11">11</option>
    					<option value="12">12</option>
    					<option value="13">13</option>
    					<option value="14">14</option>
    					<option value="15">15</option>
    					<option value="16">16</option>
    					<option value="17">17</option>
    					<option value="18">18</option>
    					<option value="19">19</option>
    					<option value="20">20</option>
    					<option value="21">21</option>
    					<option value="22">22</option>
    					<option value="23">23</option>
    					<option value="24">24</option>
    					<option value="25">25</option>
    					<option value="26">26</option>
    					<option value="27">27</option>
    					<option value="28">28</option>
    					<option value="29">29</option>
    					<option value="30">30</option>
    					<option value="31">31</option>
 				    </select>
                    <select name="months_in" id="months_in">
					<option value="0">-</option>
						<option value="1">Січень</option>
						<option value="2">Лютий</option>
						<option value="3">Березень</option>
						<option value="4">Квітень</option>
						<option value="5">Травень</option>
						<option value="6">Червень</option>
						<option value="7">Липень</option>
						<option value="8">Серпень</option>
						<option value="9">Вересень</option>
						<option value="10">Жовтень</option>
						<option value="11">Листопад</option>
						<option value="12">Грудень</option>
					</select>
                    <select name="years_in" id="years_in">
    					<option value="0">-</option>
    					<option value="2004">2004</option>
    					<option value="2005">2005</option>
    					<option value="2006">2006</option>
    					<option value="2007">2007</option>
    					<option value="2008">2008</option>
    					<option value="2009">2009</option>
    					<option value="2010">2010</option>
    					<option value="2011">2011</option>
    					<option value="2012">2012</option>
    					<option value="2013">2013</option>
    					<option value="2014">2014</option>
    					<option value="2015">2015</option>
    					<option value="2016">2016</option>
    					<option value="2017">2017</option>
    					<option value="2018">2018</option>
					</select>
                    </td>
                </tr>
                <tr>
                    <td align="right">По даті, до</td>
                    <td align="left">
                    <select name="days_to" id="days_in">
    					<option value="0">-</option>
    					<option value="1">1</option>
    					<option value="2">2</option>
    					<option value="3">3</option>
    					<option value="4">4</option>
    					<option value="5">5</option>
    					<option value="6">6</option>
    					<option value="7">7</option>
    					<option value="8">8</option>
    					<option value="9">9</option>
    					<option value="10">10</option>
    					<option value="11">11</option>
    					<option value="12">12</option>
    					<option value="13">13</option>
    					<option value="14">14</option>
    					<option value="15">15</option>
    					<option value="16">16</option>
    					<option value="17">17</option>
    					<option value="18">18</option>
    					<option value="19">19</option>
    					<option value="20">20</option>
    					<option value="21">21</option>
    					<option value="22">22</option>
    					<option value="23">23</option>
    					<option value="24">24</option>
    					<option value="25">25</option>
    					<option value="26">26</option>
    					<option value="27">27</option>
    					<option value="28">28</option>
    					<option value="29">29</option>
    					<option value="30">30</option>
    					<option value="31">31</option>
 				    </select>
                    <select name="months_to" id="months_in">
					<option value="0">-</option>
						<option value="1">Січень</option>
						<option value="2">Лютий</option>
						<option value="3">Березень</option>
						<option value="4">Квітень</option>
						<option value="5">Травень</option>
						<option value="6">Червень</option>
						<option value="7">Липень</option>
						<option value="8">Серпень</option>
						<option value="9">Вересень</option>
						<option value="10">Жовтень</option>
						<option value="11">Листопад</option>
						<option value="12">Грудень</option>
					</select>
                    <select name="years_to" id="years_in">
    					<option value="0">-</option>
    					<option value="2004">2004</option>
    					<option value="2005">2005</option>
    					<option value="2006">2006</option>
    					<option value="2007">2007</option>
    					<option value="2008">2008</option>
    					<option value="2009">2009</option>
    					<option value="2010">2010</option>
    					<option value="2011">2011</option>
    					<option value="2012">2012</option>
    					<option value="2013">2013</option>
    					<option value="2014">2014</option>
    					<option value="2015">2015</option>
    					<option value="2016">2016</option>
    					<option value="2017">2017</option>
    					<option value="2018">2018</option>
					</select>
                    </td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Пошук" class="butt"></td>
                </tr>
            </tbody>
        </table>
        </form>
        <!--<h3>Пошук по архіву: &nbsp;<input type="text" class="searching" value="" name="search_ajax" style="width: 80%;" id="search_ajax" /></h3> 
        <div id="sr"></div> -->
        <div>
            <?if(!empty($search_info)){ echo $search_info;}
            foreach($res as $r){?>
            <p><a href="/doc/<?=$r['doc_id'];?>"><?=$r['doc_name'];?></a></p>
            <?}
            ?>
        </div>      
    </div>              
</div>