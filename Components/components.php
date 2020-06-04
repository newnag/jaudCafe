<?php

class Component
{
  
  public function __constructor()
  {
  }

  // เอาไว้ทดสอบ
  public static function test($props=null)
  {
    return '<p>Test Component</p>';
  }
  
  //เวลา/รอบ 
  public static function TimeRound_item($props)
  {
    return '
      <option value="'.$props['res']['id'].'">'.$props['res']['round'].'</option>
    ';  
  }

  //จังหวัด
  public static function province_item($props)
  {
    return '
      <option value="'.$props['res']['id'].'">'.$props['res']['province_name'].'</option>
    ';
  }

  // ตำแหน่งซุ้มและโต๊ะ
  public static function position_item($props)
  {
    return '<option value="'.$props['res']['position_num'].'" disabled>'.$props['res']['position_num'].'</option>';
  }

  // แสดงรูปซุ้มให้ผู้ใช้กด
  public static function arch_handle_click_position_item($props)
  {
    return '
      <div  class="item arch" id="noA'.$props['count'].'" 
            data-archID="'.$props['res']['position_num'].'"
            onclick="handleClickDoBook(event)"
      >
        <div class="num-table"><label>'.$props['res']['position_num'].'</label></div>
        <div class="box-hover">
          <div class="slide-hover owl-carousel owl-theme owl-loaded">
          <img src="'.SITE_URL.$props['res']['image1'].'" alt="'.SITE_URL.$props['res']['title'].'">
          <img src="'.SITE_URL.$props['res']['image2'].'" alt="'.SITE_URL.$props['res']['title'].'">
          <img src="'.SITE_URL.$props['res']['image3'].'" alt="'.SITE_URL.$props['res']['title'].'">
          </div>
          <span>'.$props['res']['title'].'</span>
        </div>
      </div>
    ';
  }

  // แสดงรูปโต๊ะให้ผู้ใช้กด
  public static function table_handle_click_position_item($props)
  {
    return '
      <div 
        class="item table disableT" 
        id="noT'.$props['count'].'" 
        data-tableID="'.$props['res']['position_num'].'"
        onclick="handleClickDoBook(event)"
      >
        <div class="num-table"><label>'.$props['res']['position_num'].'</label></div>
        <div class="box-hover">
          <div class="slide-hover owl-carousel owl-theme owl-loaded">
            <img src="'.SITE_URL.$props['res']['image1'].'" alt="'.SITE_URL.$props['res']['title'].'">
            <img src="'.SITE_URL.$props['res']['image2'].'" alt="'.SITE_URL.$props['res']['title'].'">
            <img src="'.SITE_URL.$props['res']['image3'].'" alt="'.SITE_URL.$props['res']['title'].'">
          </div>
          <span>'.$props['res']['title'].'</span>
        </div>
      </div>
    ';
  }


  // juad property
  public static function juad_property($props)
  {
    global $App;
    return '
      <div class="box">
        <div class="icon"><img src="'.SITE_URL.$props['res']['image'].'" alt="'.$props['res']['title'].'"></div>
        <div class="head">
          <h2>'.$props['res']['title'].'</h2>
        </div>
        <div class="text">
          <p>'.$props['res']['description'].'</p>
        </div>
      </div>
    ';
  }


  // list my booking
  public static function list_my_booking($props){
    global $App;
    $html = '
      <div  class="grid" 
            data-price="'.$props['price'].'"
            data-id="'.$props['res']['book_id'].'"
            data-idname="'.$props['res']['book_id_name'].'"
            data-phone="'.$props['res']['phone'].'"
            data-name="'.$props['res']['name'].'"
            data-line="'.$props['res']['line_id'].'"
            data-people="'.$props['res']['people_qty'].'"
            data-position="'.$props['position'].'"
            data-time="'.$props['res']['round'].'"
            data-province="'.$props['res']['province_name'].'"
            data-date="'.date('d/m/',strtotime($props['res']['book_date'])).(date('Y',strtotime($props['res']['book_date']))+543).'"
            data-type="'.(($props['res']['type']=="arch")?"จองซุ้มริมน้ำ":"จองโต๊ะเทอเรส").'"
            data-typename="'.(($props['res']['type']=="arch")?"หมายเลขซุ้ม :":"หมายเลขโต๊ะ :").'"
      >
        <span id="name-conBook">'.$props['res']['name'].'</span>
        <span>'.date('d/m/',strtotime($props['res']['book_date'])).(date('Y',strtotime($props['res']['book_date']))+543).'</span>
        <span>'.$props['res']['round'].'</span>
        <span>'.(($props['res']['type']=="arch")?"ซุ้ม":"โต๊ะ").' '.$props['position'].'</span>
        <div class="button">
    ';
    if($props['res']['status'] == "pending" && $props['res']['bp_status'] == 'pending'){
      $html .= '<button style="cursor:default;background-color:orange;">! รอตรวจสอบ</button>';
    }
    if($props['res']['status'] == "booking" && $props['res']['bp_status'] == 'success'){
      $html .= '<button style="cursor:default;background-color:mediumseagreen;">ตรวจสอบแล้ว</button>';
    }
    if($props['res']['status'] == "pending" && $props['res']['bp_status'] == ''){
      $html .= '<button class="confirm" style="background-color:mediumseagreen" onclick="handleClickConfirm(event)">ยืนยัน</button>';
    }

    if($props['res']['status'] != "booking" && $props['res']['bp_status'] != 'success'){
      $html .= '<button class="delete" style="background-color:red;" onclick="handleClickDelete(event)">ลบ</button>';
    }
      

    $html .= '
        </div>
      </div>
    ';
    return $html;
  }

  // list ข้อมูลการจอง ที่อยู่หน้า ค้นหา
  public static function list_my_booking_search($props){
    global $App;
    $html = '
      <div  class="grid" 
            data-price="'.$props['price'].'"
            data-id="'.$props['res']['book_id'].'"
            data-idname="'.$props['res']['book_id_name'].'"
            data-phone="'.$props['res']['phone'].'"
            data-name="'.$props['res']['name'].'"
            data-line="'.$props['res']['line_id'].'"
            data-people="'.$props['res']['people_qty'].'"
            data-position="'.$props['position'].'"
            data-time="'.$props['res']['round'].'"
            data-province="'.$props['res']['province_name'].'"
            data-date="'.date('d/m/',strtotime($props['res']['book_date'])).(date('Y',strtotime($props['res']['book_date']))+543).'"
            data-type="'.(($props['res']['type']=="arch")?"จองซุ้มริมน้ำ":"จองโต๊ะเทอเรส").'"
            data-typename="'.(($props['res']['type']=="arch")?"หมายเลขซุ้ม :":"หมายเลขโต๊ะ :").'"
            data-bookingstatus="'.$props['res']['status'].'"
            data-paymentstatus="'.$props['res']['bp_status'].'"
      >
        <span id="name-conBook">'.$props['res']['name'].'</span>
        <span>'.date('d/m/',strtotime($props['res']['book_date'])).(date('Y',strtotime($props['res']['book_date']))+543).'</span>
        <span>'.$props['res']['round'].'</span>
        <span>'.(($props['res']['type']=="arch")?"ซุ้ม":"โต๊ะ").' '.$props['position'].'</span>
        <div class="button">
    ';

    $html .= '<button class="view" onclick="showBooking(event)"><i class="fas fa-search"></i></button>';

    $html .= '
        </div>
      </div>
    ';
    return $html;
  }
}
