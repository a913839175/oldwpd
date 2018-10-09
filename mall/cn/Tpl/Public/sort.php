<div id="sc_px">
  <ul>
   <li class="scpx_first">排序方式：</li>
  	<li <if condition="$Think.get.sort eq 'hits'">class="scpx_esp"</if>><a href="<{:U('Product/index',array('sort'=>'hits'))}>">兑换排行</a></li>
   <li <if condition="$Think.get.sort eq 'addtime'">class="scpx_esp"</if> ><a href="<{:U('Product/index',array('sort'=>'addtime'))}>">最新</a></li>
   <li <if condition="$Think.get.sort eq 'pro_jifen'">class="scpx_esp"</if>><a href="<{:U('Product/index',array('sort'=>'pro_jifen'))}>">微币值</a></li>
  <!-- <li>微币值</li>
   <li>用户评分</li>
   <li class="scpx_last"><input type="checkbox" />奖品优惠</li>-->
  </ul>
 </div>