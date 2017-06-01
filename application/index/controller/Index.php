<?php
namespace app\index\controller;
use \think\Controller;

class Index extends Controller{
	protected $tb_slides;//表中添加了order字段，表示图片滚动的顺序
	protected $tb_site_terms;
	protected $tb_goods;
	protected $tb_cart;//此处修改了原有的购物车表，新增商品总额字段

	function _initialize(){
		$this->tb_slides=db("slides");
		$this->tb_site_terms=db("site_terms");
		$this->tb_goods=db("goods");
		$this->tb_cart=db("cart");
	}

	//thinkshop首页
	public function index(){
		//获取轮播图，获取商品类别
		$slide = $this->tb_slides->select();
		$goodType = $this->tb_site_terms->select();
		$goods = $this->tb_goods->limit(9)->select();//limit限制首次加载显示商品数量
		$this->assign("goods",$goods);
		$this->assign("goodType",$goodType);
		$this->assign("slide",$slide);
		return $this->fetch();
	}

	//我的主页
	public function main(){
		return $this->fetch();
	}
	
	//商品详情
	public function detail($id){
		$good = $this->tb_goods->where("id",$id)->find();
		$this->assign("good",$good);
		return $this->fetch();
	}

	//商品列表类
	/*
	*@param $type: 请求类型，如类别请求->0，搜索结果->1
	*@param $query: 即为不同类型下的查询根据
	*/
	public function goodList($type,$query){
		if($type){//查询
			
		}else{//类别

		}
		return $this->fetch();
	}

	//商品购买
	public function buy($id){
		echo "正在购买，开发中";
	}
}
