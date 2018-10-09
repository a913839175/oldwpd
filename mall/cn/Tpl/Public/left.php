<div class="subBottom">
          <h4><span>新品推荐</span><a class="leftPrev" href="javascript:;">&lt;</a><a class="rightPrev" href="javascript:;">&gt;</a></h4>
            <div class="slideCon">
                <div id="slideC">
                    <ul>
                        <foreach name="left_pro_tj_data" item="vo">
                            <li>
                                <a href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>">
                                    <div class="proImg"><img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" /></div>
                                    <p class="proName"><{$vo.proname}></p>
                                </a>
                            </li>
                        </foreach>
                        
                    </ul>
                </div>
            </div>
        </div>