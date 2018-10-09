<div id="sc_slidel">
  <ul>
   <foreach name="banner_data" item="vo">
   <li><img src="__PUBLIC__/Uploads/Atl/<{$vo}>" /></li>
   </foreach>
  
  </ul>
  <div id="slide-circle">
 
   <ul> <foreach name="banner_data" item="vo" key="k"><li <eq name="k" value="0">class="slide-circle-esp" </eq>></li></foreach></ul>
  </div>
 </div>

