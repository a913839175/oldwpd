<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com> modified by 米国村长
// +----------------------------------------------------------------------
// $Id$

class Page extends Think {
    // 起始行数
    public $firstRow    ;
    // 列表每页显示行数
    public $listRows    ;
    // 页数跳转时要带的参数
    public $parameter  ;
    // 分页总页面数
    protected $totalPages  ;
    // 总行数
    protected $totalRows  ;
    // 当前页数
    protected $nowPage    ;
    // 分页的栏的总页数
    protected $coolPages   ;
    // 分页栏每页显示的页数
    protected $rollPage   ;
    //这里将$page写成类的成员属性，其实不用，懒的改了
    public $page;
    // 分页显示定制
    //protected $config  =    array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'=>'最后一页','theme'=>' %totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%');
    protected $config  =    array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'=>'最后一页','theme'=>'<span >共 %totalRow% %header%</span>   %upPage%  %linkPage% %downPage%');

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     +----------------------------------------------------------
     */
    public function __construct($totalRows,$listRows,$parameter='') {
        $this->totalRows = $totalRows;
        $this->parameter = $parameter;
        $this->rollPage = C('PAGE_ROLLPAGE');
        $this->listRows = !empty($listRows)?$listRows:C('PAGE_LISTROWS');
        $this->totalPages = ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages  = ceil($this->totalPages/$this->rollPage);
        $this->nowPage  = !empty($_GET[C('VAR_PAGE')]) ? $_GET[C('VAR_PAGE')]:1;
        if(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
        $this->firstRow = $this->listRows*($this->nowPage-1);
    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
     +----------------------------------------------------------
     * 分页显示输出
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function show() {
        if(0 == $this->totalRows) return '';
        $p = C('VAR_PAGE');
        $nowCoolPage      = ceil($this->nowPage/$this->rollPage);
        $url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
        $parse = parse_url($url);
        if(isset($parse['query'])) {
            parse_str($parse['query'],$params);
            unset($params[$p]);
            $url   =  $parse['path'].'?'.http_build_query($params);
        }
        //上下翻页字符串
        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $upPage="<a href='".$url."&".$p."=$upRow'>".$this->config['prev']."</a>";
        }else{
            $upPage="<span class='nextprev'>上一页</span>";
        }

        if ($downRow <= $this->totalPages){
            $downPage="<a href='".$url."&".$p."=$downRow'>".$this->config['next']."</a>";
        }else{
            $downPage="<span class='nextprev'>下一页 </span>";
        }
        // << < > >>    //
        /*if($nowCoolPage == 1){
            $theFirst = "";
            $prePage = "";
        }else{
            $preRow =  $this->nowPage-$this->rollPage;
            $prePage = "<a href='".$url."&".$p."=$preRow' >上".$this->rollPage."页</a>";
            $theFirst = "<a href='".$url."&".$p."=1' >".$this->config['first']."</a>";
        }
        if($nowCoolPage == $this->coolPages){
            $nextPage = "";
            $theEnd="";
        }else{
            $nextRow = $this->nowPage+$this->rollPage;
            $theEndRow = $this->totalPages;
            $nextPage = "<a href='".$url."&".$p."=$nextRow' >下".$this->rollPage."页</a>";
            $theEnd = "<a href='".$url."&".$p."=$theEndRow' >".$this->config['last']."</a>";
        }
     */
    // 1 2 3 4 5
    
    $linkPage = "";
    if($totalpage < $this->rollPage){
        for($i = 1;$i<=$this->totalPages;$i++){        //若页码数不够设置的显示页数 ，比如设置显示5页，但只有3页数据
            if($i == $this->nowPage){
                $linkPage .= "<span class='current'>".$i."</span>";
            }else{
                $linkPage .= "<a href='".$url."&".$p."=$i'>".$i."</a>";
            }
        }
    }else{
        $mid = ceil($this->rollPage/2);
        if($this->nowPage >= $mid && $this->nowPage <= ($this->totalPages - $mid)){    //当前页在页码中间靠右时，保持左边有2个页码
            $this->page = $this->nowPage - ($this->rollpage/2 - 1);//这个2使当前页保持在中间（每次显示5个页码时），如果一次显示7个页码，改成3即可保持当前页在中间
            for($i = 1; $i <= $this->rollPage; $i++){
                if($this->page == $this->nowPage){
                    $linkPage .= "<span class='current'>".$this->page."</span>";
                }else{
                    $linkPage .= "<a href='".$url."&".$p."=$this->page'>".$this->page."</a>";
                }
                $this->page++;
            }
        }elseif($this->nowPage < $mid){                            //当前页在coolPages为1时，并且当前页在页码中间靠左
            for($i = 1; $i <= $this->rollPage; $i++){                //如1234567 当前页为3
                $this->page = $i;
                if($this->page == $this->nowPage){
                    $linkPage .= "<span class='current'>".$this->page."</span>";
                }else{
                    $linkPage .= "<a href='".$url."&".$p."=$this->page'>".$this->page."</a>";
                }
            }
        }elseif($this->nowPage > $this->totalPages - $mid){                //当前页在coolPages是最后一页时，直接循环出剩下的页面就行
            for($i = $this->totalPages - $this->rollPage + 1; $i <= $this->totalPages; $i++){
                $this->page = $i;
                if($this->page == $this->nowPage){
                    $linkPage .= "<span class='current'>".$this->page."</span>";
                }else{
                    $linkPage .= "<a href='".$url."&".$p."=$this->page'>".$this->page."</a>";
                }
            }

        }
    }
    
        $pageStr     =     str_replace(
            array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%'),
            array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd),$this->config['theme']);
        return $pageStr;
    }

}
?>