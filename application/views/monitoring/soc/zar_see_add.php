<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Контроль за виплотою заробю плати</h1>        
    </div>
    <div>
        <form method="POST">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: right; width: 50%;">Дата</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="date" value="<?=date('Y-m-d');?>" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Установа, організація бютж. сфери</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="ustanova" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Нараховано зар. плати</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="narahovano" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Виплачено зар. плати</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="viplacheno" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Заборгованість зар. плати</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="zaborgov" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;"></td>
                    <td style="text-align: left; width: 50%;"><button>Сохранить</button></td>
                </tr>
            </table>
            
        </form>
    </div>
</article>