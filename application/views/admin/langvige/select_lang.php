
<style>
#select_mat tr:nth-child(2n) {
    background-color: #303031;
}

</style>
<div>
     <h4 style="font-size: 25px;">Языки</h4>
     <p><a href="/admin/add_lang">Добавить язык</a></p>
     <table id="select_mat" style="width: 100%;  font-size:16px;" cellpadding="5" cellspacing="5" border="5">
    <thead>
        <tr style="color:red;">
            <td style="width: 25px; ">ID</td>
            <td style="text-align: center; vertical-align: middle;">Название</td>            
        </tr>
    </thead>
    <tbody>
        <?php $res = DB::select()->from('lang')->execute()->as_array(); foreach($res as $lang) {?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?php echo $lang['lang_id'];?></td>
            <td style="text-align: left; vertical-align: middle;"><?php echo $lang['lang_title'];?></td>
        </tr>
       <?php };?>          
    </tbody>
</table>
</div>
                  