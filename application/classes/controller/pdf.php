<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pdf extends Controller_Main {

    public function action_index() {
            
        $data = array();
        $lang = Arr::get($_GET,'lang');
        $id = Arr::get($_GET,'id');
        $res = DB::select()->from('user_tiket')->where('join_tiket_id','=',$id)->execute()->current();
        $user = DB::select()->from('users')->join('users_full')->on('users.user_id','=','users_full.user_id')->where('users.user_id','=',$res['user_id'])->execute()->current();
        $tiket = Model::factory('Tiket')->get_tiket($id);
        $ferry_man = DB::select()->from('Ferryman')->where('ferryman_id','=',$tiket['ferryman_id'])->execute()->current();
        $route_name = Model::factory('Rout')->get_route_name_i18n($tiket['route_name_id'],$lang);
        $from = Model::factory('rout')->get_city_i18n($tiket['route_city_from_id'],$lang);
        $to = Model::factory('rout')->get_city_i18n($tiket['route_city_to_id'],$lang);
        $data['people'] = DB::select()->from('ticket_people')->where('tiket_id','=',$id)->execute()->current();
        $data['valute'] = DB::select()->from('tiket_valute')->where('tiket_id','=',$id)->execute()->current();
        $data['lang'] = $lang;
        $data['id'] = $id;
        $data['tiket'] = $tiket;
        $data['route_name'] = $route_name;
        $data['country_id'] = $tiket['country_id'];
        $data['country_to_id'] = $tiket['country_to_id'];
        //print_r($route_name);
        //die;
        $data['ferry_man'] = $ferry_man;
        $data['route_title'] = 'Билет';
        $data['from'] = $from;  
        $data['to'] = $to;          
        $route_d_from = strtotime($tiket['route_date'].' '.$tiket['route_time']);
        $route_d_to = strtotime($tiket['route_date'].' '.$tiket['route_timeto']);
        $date_to = $tiket['route_date'];
        if($route_d_from > $route_d_to){
            $date_to = date('Y-m-d',$route_d_from+3600*24);
        }
        $data['date_to'] = $date_to;
        
        $mpdf=new mpdf('');         
        $html = '';
        $html .= View::factory('pay/tiket_pdf',$data); 
        $mpdf->h2toc = array('H3'=>0, 'H4'=>1);
        $mpdf->h2bookmarks = array('H3'=>0, 'H4'=>1);
        $mpdf->open_layer_pane = false;
        $mpdf->layerDetails[1]['state']='hidden';	// Set initial state of layer - "hidden" or nothing
        $mpdf->layerDetails[1]['name']='Correct Answers';
        $mpdf->layerDetails[2]['state']='hidden';	// Set initial state of layer - "hidden" or nothing
        $mpdf->layerDetails[2]['name']='Wrong Answers';
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        //$mpdf->Output('filename.pdf','F');
         exit;
    }
    
    public function action_save_pdf() {
            
        $data = array();
        $lang = Arr::get($_GET,'lang');
        $id = Arr::get($_GET,'id');
        $res = DB::select()->from('user_tiket')->where('join_tiket_id','=',$id)->execute()->current();
        $user = DB::select()->from('users')->join('users_full')->on('users.user_id','=','users_full.user_id')->where('users.user_id','=',$res['user_id'])->execute()->current();
        $tiket = Model::factory('Tiket')->get_tiket($id);
        $ferry_man = DB::select()->from('Ferryman')->where('ferryman_id','=',$tiket['ferryman_id'])->execute()->current();
        $route_name = Model::factory('Rout')->get_route_name_i18n($tiket['route_name_id'],$lang);
        $from = Model::factory('rout')->get_city_i18n($tiket['route_city_from_id'],$lang);
        $to = Model::factory('rout')->get_city_i18n($tiket['route_city_to_id'],$lang);
        $data['people'] = DB::select()->from('ticket_people')->where('tiket_id','=',$id)->execute()->current();
        $data['valute'] = DB::select()->from('tiket_valute')->where('tiket_id','=',$id)->execute()->current();
        $data['lang'] = $lang;
        $data['id'] = $id;
        $data['tiket'] = $tiket;
        $data['route_name'] = $route_name;
        $data['country_id'] = $tiket['country_id'];
        $data['country_to_id'] = $tiket['country_to_id'];
        //print_r($route_name);
        //die;
        $data['ferry_man'] = $ferry_man;
        $data['route_title'] = 'Билет';
        $data['from'] = $from;  
        $data['to'] = $to;  
        
        
        $route_d_from = strtotime($tiket['route_date'].' '.$tiket['route_time']);
        $route_d_to = strtotime($tiket['route_date'].' '.$tiket['route_timeto']);
        $date_to = $tiket['route_date'];
        if($route_d_from > $route_d_to){
            $date_to = date('Y-m-d',$route_d_from+3600*24);
        }
        $data['date_to'] = $date_to;
        
        $mpdf=new mpdf('');         
        $html = '';
        $html .= View::factory('pay/tiket_pdf',$data); 
        $mpdf->h2toc = array('H3'=>0, 'H4'=>1);
        $mpdf->h2bookmarks = array('H3'=>0, 'H4'=>1);
        $mpdf->open_layer_pane = false;
        $mpdf->layerDetails[1]['state']='hidden';	// Set initial state of layer - "hidden" or nothing
        $mpdf->layerDetails[1]['name']='Correct Answers';
        $mpdf->layerDetails[2]['state']='hidden';	// Set initial state of layer - "hidden" or nothing
        $mpdf->layerDetails[2]['name']='Wrong Answers';
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        //$mpdf->Output('filename.pdf','F');
         exit;
    }
    
    public function action_see_tiket(){
        if($_POST){
        $data = array();
        
        //die;
        $lang = Arr::get($_POST,'lang');
        
        $id = Arr::get($_POST,'id');
        $res = DB::select()->from('user_tiket')->where('tiket_id','=',$id)->execute()->current();
        $user = DB::select()->from('users')->join('users_full')->on('users.user_id','=','users_full.user_id')->where('users.user_id','=',$res['user_id'])->execute()->current();
        $data['route_title'] = 'Билет'; 
        $tiket = Model::factory('Tiket')->get_tiket($id);
        $ferry_man = DB::select()->from('Ferryman')->where('ferryman_id','=',$tiket['ferryman_id'])->execute()->current();
        $route_name = Model::factory('Rout')->get_route_name_i18n($tiket['route_name_id']);
        $from = Model::factory('rout')->get_city_i18n($tiket['route_city_from_id'],$lang);
        $to = Model::factory('rout')->get_city_i18n($tiket['route_city_to_id'],$lang);
        
        echo '<style>.main_tik_bot {
    width: 500px;
    margin: auto;
    font-size: 12px;
}
</style><div class="main_tik_bot">
    <table style="width: 500px;">
        <tr>
            <td>Перевізник / Carrier:</td>
            <td>'.$ferry_man['name'].'</td>
            <td>Квиток / Ticket:</td>
            <td>'.$tiket['ticket_id'].'</td>
        </tr>
        <tr>
            <td>Пасажир/ Pasenger:</td>
            <td>'.$user['name'].' '.$user['soname'].'</td>
            <td>Маршрут / Route :</td>
            <td>'.$route_name['name_i18n'].'</td>
        </tr>
        <tr>
            <td>Відправлення / Departure:</td>
            <td>'.$tiket['route_time'].'</td>
            <td>Місце / Place :</td>
            <td>'.$tiket['value'].'</td>
        </tr>
        <tr>
            <td>Прибуття / Arival:</td>
            <td>'.$tiket['route_timeto'].'</td>
            <td>Дата / Date :</td>
            <td>'.date('d-m-Y',strtotime($tiket['route_date'])).'</td>
        </tr>
        <tr>
            <td>Ціна / Praice:</td>
            <td>'.$tiket['route_price'].' CZK</td>
            <td>Всього / Total:</td>
            <td>'.$tiket['price'].' CZK</td>
        </tr>
        <tr>
            <td>Дисконт / Praice:</td>
            <td>'.$tiket['route_discount'].' CZK</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <hr />
</div>';
        die;
        }
    }
    
    public function action_sendmail(){
        //$to = 'LysogorAnd@i.ua';
        //$massege = "<p><a href='http://svitgo.com/filename.pdf'>Скачать</a></p>";
        //Model::factory('Tiket')->sen($to,$massege);
        $config = Kohana::$config->load('mailer');
        $conf = $config->options;
        //print_r($conf);
        //die;
        //$swift = Email::connect($config);
        $to      = 'LysogorAnd@i.ua';
        $from    = 'inforation@samremauto.org.ua';
        $from_name  = 'Vasia';
        $sub = 'Проверка видимости';
        $mes = 'Message';
        $file = 'favicon.ico';
 
        $mailer = new Mailer(); 
        $sen = $mailer->send($from,$from_name,$to,$conf,$file,$sub,$mes);
        if($sen === true){
            echo 'ok';
        }else {
            echo 'her';
        }
    }

} // End News