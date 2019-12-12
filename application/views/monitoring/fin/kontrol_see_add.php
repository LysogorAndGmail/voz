<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Залишок на рахунку</h1>        
    </div>
    <div>
        <form method="POST">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: right; width: 50%;">Дата реєстрації в казначействі</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="date_reest" value="<?=date('Y-m-d');?>" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">№ платіжного доручення</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="nomber" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Управління, відділміської ради</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="uprav" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Призначення платежу</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="priz" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Дата оплати козначейством</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="date_oplata" value="<?=date('Y-m-d');?>" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;"></td>
                    <td style="text-align: left; width: 50%;"><button>Сохранить</button></td>
                </tr>
            </table>
            
        </form>
    </div>
</article>