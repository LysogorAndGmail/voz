<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Витрати</h1>        
    </div>
    <div>
        <form method="POST">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: right; width: 50%;">Дата</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="date" value="<?=date('Y-m-d');?>" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Витрачено (загальній фонд)</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="zag_fond_vit" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Витрачено (спеціальний фонд)</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="spe_fond_vit" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">За що (загальній фонд)</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="zag_fond_za_sho" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">За що (спеціальний фонд)</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="spe_fond_za_sho" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;"></td>
                    <td style="text-align: left; width: 50%;"><button>Сохранить</button></td>
                </tr>
            </table>
            
        </form>
    </div>
</article>