$(document).ready(function(){
    var KartaS = $('#karta_jpg').hide();
    var KartaB = $('#karta_big');
    var KartaG = $('#google_karta').hide();
    var Karta1815 = $('#karta_1815').hide();
    
    $('#s_k').click(function(){
        KartaB.hide();
        Karta1815.hide();
        KartaG.hide();
        KartaS.show();
    })
    $('#b_k').click(function(){
        KartaG.hide();
        Karta1815.hide();
        KartaS.hide();
        KartaB.show();
    })
    $('#g_k').click(function(){
        KartaG.show();
        Karta1815.hide();
        KartaS.hide();
        KartaB.hide();
    })
    $('#1815_k').click(function(){
        KartaG.hide();
        Karta1815.show();
        KartaS.hide();
        KartaB.hide();
    })
    
////////////
$('.mon_arch').hide();
$('.mon_arch').hover(function(){
    $(this).show();
},function(){
    $(this).hide();
});
$('.arch').hover(function(){
    $(this).next('.mon_arch').show();
},function(){
    $(this).next('.mon_arch').hide();
})

////////////
$('#search-form').submit(function(){
    return false;
})

/////////////
$('#main_search_input').focus(function(){
   location='/search/search';         
   });

function loc(){
    location='/search/search';       
}
////////////
$('.event_dep').hide();

$('.event_dep').find('span').click(function(){
    $(this).parents('.event_dep').hide();
})

$('.send_dep').hide();

$('.send_dep').find('span').click(function(){
    $(this).parents('.send_dep').hide();
})

function GoUser() {
    location='/search/search';       
}
$('#write_mess').next('div').hide();
$('#write_mess').click(function(){
    $(this).next('div').show();
})

$('#vote_button').click(function(){
    var LabelID = $('.vote_label input:checked').val();
    if(LabelID == undefined) {
       alert('НЕ обраний варіант');
   }else {
        $.ajax({
            url: '/resurse/vote',
            type: 'POST',
            data: {label_id:LabelID},
            error: function(){
                alert('errror');
            },
            success: function(data) {
                alert(data);
                $('.show_vote_results').click();
            } 
        }); //end ajax 
    }
    
})

$('.show_vote_results').click(function(){
    var Img = '<img src="/images/big_loader.gif" width="100" height="100" style="margin-left:35px;" />';
    var Vote_id = $('.vote_id').text();
    //alert(Vote_id);
    //exit;
    $('.ul_vote').html(Img);
    $.ajax({
            url: '/resurse/vote_results',
            type: 'POST',
            data: {vote_id:Vote_id},
            error: function(){
                alert('errror');
            },
            success: function(data) {
                $('.ul_vote').html(data);
            } 
        }); //end ajax 
})
////////////
});//end ready