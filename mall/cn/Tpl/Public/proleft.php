
      <div class="subTop">
          <!-- <ul>
             <foreach name="left_pro_data" key="k" item="vo">
                <if condition="$k eq 0 and $Think.get.tid eq ''">
                    <li>
                      <a class="on" href="<{:U('Product/index',array('tid'=>$vo[id]))}>"><{$vo.proclassname}></a>
                        <if condition="$vo[child]">
                        <div class="erji">
                            <foreach name="vo[child]" key="k1" item="v">
                                <if condition="$k1 eq 0">
                                    <a class="on" href="<{:U('Product/index',array('tid'=>$v[pid],'id'=>$v[id]))}>"><{$v.proclassname}></a>
                                <else />
                                    <a  href="<{:U('Product/index',array('tid'=>$v[pid],'id'=>$v[id]))}>"><{$v.proclassname}></a>
                                </if>
                                
                            </foreach>
                         
                        </div>
                        </if>
                    </li>
                <else />
                    <li>
                      <a <if condition="$Think.get.tid eq $vo[id]">class="on"</if> href="<{:U('Product/index',array('tid'=>$vo[id]))}>"><{$vo.proclassname}></a>
                        <if condition="$vo[child] and $Think.get.tid eq $vo[id]">
                        <div class="erji">
                            <foreach name="vo[child]" key="k2" item="v">
                                <if condition="$k2 eq 0 and $Think.get.id eq ''">
                                    <a class="on" href="<{:U('Product/index',array('tid'=>$v[pid],'id'=>$v[id]))}>"><{$v.proclassname}></a>
                                <else />
                                    <a <if condition="$Think.get.id eq $v[id]">class="on"</if> href="<{:U('Product/index',array('tid'=>$v[pid],'id'=>$v[id]))}>"><{$v.proclassname}></a>
                                </if>
                                
                            </foreach>
                         
                        </div>
                        </if>
                    </li>
                </if>
             </foreach>
              
            </ul> -->

            <ul>
             <foreach name="left_pro_data" key="k" item="vo">
                <if condition="$k eq 0 and $Think.get.tid eq ''">
                    <li>
                      <a class="on" href="<{:U('Product/index',array('tid'=>$vo[id]))}>"><{$vo.proclassname}></a>
                        <if condition="$vo[child]">
                        <div class="erji">
                            <foreach name="vo[child]" key="k1" item="v">
                                    <a  href="<{:U('Product/index',array('tid'=>$v[pid],'id'=>$v[id]))}>"><{$v.proclassname}></a>
                            </foreach>
                         
                        </div>
                        </if>
                    </li>
                <else />
                    <li>
                      <a <if condition="$Think.get.tid eq $vo[id]">class="on"</if> href="<{:U('Product/index',array('tid'=>$vo[id]))}>"><{$vo.proclassname}></a>
                        <if condition="$vo[child] and $Think.get.tid eq $vo[id]">
                        <div class="erji">
                            <foreach name="vo[child]" key="k2" item="v">
                                    <a <if condition="$Think.get.id eq $v[id]">class="on"</if> href="<{:U('Product/index',array('tid'=>$v[pid],'id'=>$v[id]))}>"><{$v.proclassname}></a>
                            </foreach>
                         
                        </div>
                        </if>
                    </li>
                </if>
             </foreach>
              
            </ul> 
        </div>
      