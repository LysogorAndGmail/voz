<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Работа з переселенцями</h1>        
    </div>
    <div>
        <form method="POST">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: right; width: 50%;">Дата</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="date" value="<?=date('Y-m-d');?>" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Звідки</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="zvidki" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Перелік осіб однієї сім'ї</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="perelik" value="" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Де поселені</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="poseleni" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Які проблеми потребують вирішення</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="problem" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;">Що зроблено</td>
                    <td style="text-align: left; width: 50%;"><input type="text" name="zromleno" value="" style="width: 100%;"/></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 50%;"></td>
                    <td style="text-align: left; width: 50%;"><button>Сохранить</button></td>
                </tr>
            </table>
            
        </form>
    </div>
</article>