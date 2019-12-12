<div class="main">
    <div class="container_24">
        <div id="show_page">
            <h2><?php echo $page['page_title'];?></h2>
            <div class="show_page_text">
                <?php echo $page['page_text'];?>
                <div class="zver_form">
                    <form action="/user/add_zvernenna" method="POST">
                    <label>П.І.Б:<br />
                        <input type="text" name="zver_pib" />
                    </label><br />
                    <label>Адреса:<br />
                        <input type="text" name="zver_adress" />
                    </label><br />
                    <label>Email:<br />
                        <input type="text" name="zver_email" />
                    </label><br />
                    <label>Телефон:<br />
                        <input type="text" name="zver_tel" />
                    </label><br />
                    <label>Текст звернення:<br />
                        <textarea style="height: 50px;" name="zver_text"></textarea>
                    </label><br />
                    <input type="submit" value="Відправити" />
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
               
</div>