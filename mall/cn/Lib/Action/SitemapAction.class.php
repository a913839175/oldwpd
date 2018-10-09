<?php
//站点地图
class SitemapAction extends CommonAction {
    public function Sitemap(){
    	$data = M("Seo_cate")->field("id,pid,url,catename,path,concat(path,'-',id) as bpath")->order('bpath')->select();
    	foreach($data as $key=>$value){
					$data[$key]['count']=count(explode('-',$value['bpath']));
		}
		
    	$this->assign("data",$data);
		$this->display();
    }
	
}