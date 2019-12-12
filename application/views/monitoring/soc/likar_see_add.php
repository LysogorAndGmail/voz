<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Моніторінг роботи сімейних лікарів</h1>        
    </div>
    <div>
        <form method="POST">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: right; width: 50%;">Дата</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="date" value="<?=date('Y-m-d');?>" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Амбулаторія №</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="ambulatoria" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Лікар</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="likar" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Скільки хварих прийнято</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="count" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Примітка</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="promitka" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;"></td>
                    <td style="text-align: left; width: 50%;"><button>Сохранить</button></td>
                </tr>
            </table>
            
        </form>
    </div>
</article>