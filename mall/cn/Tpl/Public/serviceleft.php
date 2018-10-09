<div class="main_left fl">
                <div class="left_title">
                    服务项目
                </div>
                <ul class="left_ul">
                  <foreach name="header_fuwu_data" item="vo">
                    <li><a href="<{:U('Service/info',array('id'=>$vo[id]))}>"><{$vo.proname}></a></li>
                  </foreach>
                  
                </ul>
                <div class="left_contact">
                    <div class="contact_title">联系我们</div>
                    <div class="contact_box">
                        <h3>+86-575-85338446</h3>
                        <{$left_contact_data.pacon}>
                    </div>
                </div>
            </div>