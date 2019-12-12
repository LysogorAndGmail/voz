<script type="text/javascript">
$(document).ready(function(){
    $('#search_ajax').keyup(function(){
    $.ajax({
    url: "/search/sa",
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
        
        <h3>Пошук: &nbsp;<input type="text" class="searching" value="" name="search_ajax" style="width: 90%;" id="search_ajax" /></h3> 
        <div id="sr"></div>       
    </div>              
</div>