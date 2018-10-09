<div id="sc_dhk">
  <div id="dhk_tt">
   <span>礼品兑换</span>
  </div>
   <form  method="post" action="<{:U('Product/search')}>">
  <div id="dhk_tx">
   微币范围：
   <span><a <if condition="$Think.get.min eq ''">class="dhfws"</if>  href="<{:U('Product/search')}>">不限 </a></span>
   <span ><a <if condition="$Think.get.min eq '0'">class="dhfws"</if>  href="<{:U('Product/search',array('min'=>0,'max'=>1000))}>">0-1000</a></span>
   <span ><a <if condition="$Think.get.min eq '1000'">class="dhfws"</if> href="<{:U('Product/search',array('min'=>1000,'max'=>2000))}>">1000-2000</a></span>
   <span ><a <if condition="$Think.get.min eq '2000'">class="dhfws"</if> href="<{:U('Product/search',array('min'=>2000,'max'=>3000))}>">2000-3000</a></span>
   <span ><a <if condition="$Think.get.min eq '3000'">class="dhfws"</if> href="<{:U('Product/search',array('min'=>3000,'max'=>5000))}>">3000-5000</a></span>
   <span ><a <if condition="$Think.get.min eq '5000'">class="dhfws"</if> href="<{:U('Product/search',array('min'=>5000,'max'=>10000))}>">5000-10000</a></span>
   <span ><a <if condition="$Think.get.min eq '10000'">class="dhfws"</if> href="<{:U('Product/search',array('min'=>10000,'max'=>20000))}>">10000-20000</a></span>
   <span ><a <if condition="$Think.get.min eq '20000'">class="dhfws"</if> href="<{:U('Product/search',array('min'=>20000))}>">20000及以上</a></span>
  
       <input type="text" name="min"/> - <input type="text" name="max"/>
       <input type="submit" class="submit" value="确定">
   
  <!-- <button>确定</button>-->
  
  </div>
   </form>
  
 </div>