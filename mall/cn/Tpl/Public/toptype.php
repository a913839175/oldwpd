<div class="zy_box">
                	<div class="zy_left fl">
                    	课程系列:
                    </div>
                    <div class="zy_right fl">
                    	<ul class="zy_ul">
                            <foreach name="one_type_data" item="vo" key="k">
                                <if condition="$k eq 0 and $Think.get.tid eq ''">
                                    <li class="zy_on"><a href="<{:U('Service/ziyuan',array('tid'=>$vo[id]))}>"><{$vo.proclassname}></a></li>
                                <else />
                                    <li <if condition="$Think.get.tid eq $vo[id]"> class="zy_on"</if>  ><a href="<{:U('Service/ziyuan',array('tid'=>$vo[id]))}>"><{$vo.proclassname}></a></li>
                                </if>
                                
                            </foreach>
                        	
                            
                        </ul>
                        <dl class="zy_dl">
                            <foreach name="two_type_data" item="vo" key="k">
                                <if condition="$k eq 0 and $Think.get.gid eq '' ">
                                    <dd class="dd_on"><a href="<{:U('Service/ziyuan',array('tid'=>$vo[pid],'gid'=>$vo[id]))}>"><{$vo.proclassname}></a></dd>
                                <else />
                                    <dd <if condition="$Think.get.gid eq $vo[id]"> class="dd_on"</if> ><a href="<{:U('Service/ziyuan',array('tid'=>$vo[pid],'gid'=>$vo[id]))}>"><{$vo.proclassname}></a></dd>
                                </if>
                                
                            </foreach>
                        	
                           
                        </dl>
                    </div>
                </div>